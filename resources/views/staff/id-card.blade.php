@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>KMC Staff ID Card - {{ $staff->full_name }}</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
        }
        
        .container {
            width: 210mm;
            min-height: 297mm;
            padding: 10mm;
            box-sizing: border-box;
        }
        
        .id-card {
            width: 85.6mm;
            height: 54mm;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin: 0 auto 10mm;
            position: relative;
        }
        
        /* FRONT SIDE STYLES */
        .front-side {
            background: linear-gradient(135deg, #0a3d62 0%, #1e3799 100%);
            color: white;
            height: 100%;
            position: relative;
        }
        
        .card-header {
            background: rgba(255,255,255,0.15);
            padding: 5px 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .logo-container {
            width: 35px;
            height: 35px;
            border-radius: 6px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .logo-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        
        .header-text {
            flex: 1;
        }
        
        .council-name {
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            line-height: 1.2;
        }
        
        .card-title {
            font-size: 8px;
            font-weight: 500;
            opacity: 0.9;
        }
        
        .content {
            padding: 8px 10px;
            display: flex;
            gap: 10px;
            height: calc(100% - 45px);
        }
        
        .photo-section {
            width: 25mm;
            height: 30mm;
            flex-shrink: 0;
        }
        
        .photo-frame {
            width: 100%;
            height: 100%;
            background: white;
            border-radius: 5px;
            overflow: hidden;
            border: 2px solid rgba(255,255,255,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .staff-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .no-photo {
            width: 100%;
            height: 100%;
            background: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 8px;
            text-align: center;
        }
        
        .details {
            flex: 1;
            padding: 2px 0;
        }
        
        .staff-name {
            font-size: 11px;
            font-weight: 700;
            margin: 0 0 8px 0;
            color: #fff;
        }
        
        .detail-line {
            margin-bottom: 4px;
            font-size: 8px;
            line-height: 1.3;
        }
        
        .detail-label {
            font-weight: 600;
            color: rgba(255,255,255,0.8);
            display: inline-block;
            width: 70px;
        }
        
        .detail-value {
            font-weight: 500;
        }
        
        .card-number {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.3);
            padding: 4px 10px;
            font-size: 8px;
            font-weight: 600;
            text-align: center;
            letter-spacing: 0.5px;
        }
        
        /* BACK SIDE STYLES */
        .back-side {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #333;
            height: 100%;
            padding: 10px;
        }
        
        .back-header {
            text-align: center;
            margin-bottom: 8px;
            padding-bottom: 4px;
            border-bottom: 1px solid #ccc;
        }
        
        .back-title {
            font-size: 9px;
            font-weight: 700;
            color: #0a3d62;
            margin-bottom: 2px;
            text-transform: uppercase;
        }
        
        .back-subtitle {
            font-size: 8px;
            color: #666;
        }
        
        .contact-info {
            font-size: 7.5px;
            line-height: 1.4;
            margin-bottom: 10px;
        }
        
        .contact-info strong {
            color: #0a3d62;
        }
        
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 10px;
        }
        
        .signature-area {
            text-align: center;
            flex: 1;
        }
        
        .signature-line {
            width: 50px;
            height: 1px;
            background: #333;
            margin: 12px auto 2px;
        }
        
        .signature-text {
            font-size: 7px;
            font-weight: 600;
            color: #333;
        }
        
        .qr-section {
            text-align: center;
        }
        
        .qr-code {
            width: 120px;
            height: 120px;
            margin-bottom: 2px;
        }

        .qr-code svg {
            width: 120px !important;
            height: 120px !important;
        }

        .qr-code svg path {
             fill: #000 !important;
        }

        
        .scan-text {
            font-size: 6.5px;
            color: #666;
            font-weight: 500;
        }
        
        /* PRINT SPECIFIC STYLES */
        @media print {
            body {
                background: white;
            }
            
            .container {
                padding: 0;
                width: 210mm;
                min-height: 297mm;
                page-break-after: always;
            }
            
            .id-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
            
            /* First page shows front side */
            .front-side {
                page-break-after: always;
            }
            
            /* Second page shows back side */
            .back-side {
                page-break-before: always;
            }
            
            .no-print {
                display: none;
            }
        }
        
        /* PAGE BREAKS FOR MULTIPLE CARDS */
        .page-break {
            page-break-after: always;
        }
        
        /* PRINT CONTROLS (only for preview) */
        .print-controls {
            text-align: center;
            padding: 20px;
            background: white;
            margin-bottom: 20px;
        }
        
        .print-btn {
            background: #0a3d62;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .print-btn:hover {
            background: #1e3799;
        }
        
        .instructions {
            font-size: 12px;
            color: #666;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Print Controls (Hidden when printing) -->
    <div class="print-controls no-print">
        <button class="print-btn" onclick="window.print()">
            🖨️ Print ID Card
        </button>
        <p class="instructions">For best results, print on card stock paper. The front and back will print on separate pages.</p>
    </div>

    <!-- FRONT SIDE -->
    <div class="container">
        <div class="id-card">
            <div class="front-side">
                <div class="card-header">
                    <div class="logo-container">
                        <!-- Try multiple possible logo locations -->
                        @if(file_exists(public_path('images/kmc-logo.jpg')))
                            <img src="{{ public_path('images/kmc-logo.jpg') }}" alt="KMC Logo">
                        @elseif(file_exists(public_path('storage/images/kmc-logo.jpg')))
                            <img src="{{ public_path('storage/images/kmc-logo.jpg') }}" alt="KMC Logo">
                        @elseif(file_exists(public_path('storage/kmc-logo.jpg')))
                            <img src="{{ public_path('storage/kmc-logo.jpg') }}" alt="KMC Logo">
                        @else
                            <div style="width:100%;height:100%;background:#ddd;color:#666;font-size:6px;display:flex;align-items:center;justify-content:center;">
                                KMC LOGO
                            </div>
                        @endif
                    </div>
                    <div class="header-text">
                        <div class="council-name">Kinondoni Municipal Council</div>
                        <div class="card-title">Staff Identity Card</div>
                    </div>
                </div>
                
                <div class="content">
                    <div class="photo-section">
                        <div class="photo-frame">
                            @if($staff->photo_path && file_exists(storage_path('app/public/' . $staff->photo_path)))
                                <img src="{{ storage_path('app/public/' . $staff->photo_path) }}" 
                                     alt="{{ $staff->full_name }}"
                                     class="staff-photo">
                            @elseif($staff->photo_path && file_exists(public_path('storage/' . $staff->photo_path)))
                                <img src="{{ public_path('storage/' . $staff->photo_path) }}" 
                                     alt="{{ $staff->full_name }}"
                                     class="staff-photo">
                            @else
                                <div class="no-photo">
                                    No Photo<br>Available
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="details">
                        <div class="staff-name">{{ $staff->full_name }}</div>
                        
                        <div class="detail-line">
                            <span class="detail-label">Check Number:</span>
                            <span class="detail-value">{{ $staff->file_no }}</span>
                        </div>
                        
                        <div class="detail-line">
                            <span class="detail-label">Designation:</span>
                            <span class="detail-value">{{ $staff->designation->name ?? 'N/A' }}</span>
                        </div>
                        
                        <div class="detail-line">
                            <span class="detail-label">Department:</span>
                            <span class="detail-value">{{ $staff->department->name ?? 'N/A' }}</span>
                        </div>
                        
                        <div class="detail-line">
                            <span class="detail-label">Valid Until:</span>
                            <span class="detail-value">Dec, 2028</span>
                        </div>
                    </div>
                </div>
                
                <div class="card-number">
                    Card Number: KMC{{ str_pad($staff->id, 8, '0', STR_PAD_LEFT) }}
                </div>
            </div>
        </div>
    </div>
    
    <!-- PAGE BREAK -->
    <div class="page-break"></div>
    
    <!-- BACK SIDE -->
    <div class="container">
        <div class="id-card">
            <div class="back-side">
                <div class="back-header">
                    <div class="back-title">Kinondoni Municipal Council</div>
                    <div class="back-subtitle">Official Staff Identification Card</div>
                </div>
                
                <div class="contact-info">
                    <p><strong>This card is a property of Kinondoni Municipal Council</strong></p>
                    <p>If found, please return to:</p>
                    <p>
                        P.O. Box 31902,<br>
                        2 Morogoro Road,<br>
                        14833, Dar es Salaam<br>
                        ☎ +255 222 17073<br>
                        ✉ md@kinondonimc.go.tz
                    </p>
                </div>
                
                <div class="footer">
                    <div class="signature-area">
                        <div class="signature-line"></div>
                        <div class="signature-text">Issuer's Signature</div>
                    </div>
                    
                   <div class="qr-section">
    <div style="width:120px;height:120px;">
        {!! $qrSvg !!}
    </div>
    <div class="scan-text">Scan to verify</div>
</div>



                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto print after short delay (optional)
        setTimeout(() => {
            window.print();
        }, 500);
        
        // Close window after printing if opened in new tab
        window.onafterprint = function() {
            if (window.opener) {
                window.close();
            }
        };
    </script>
</body>
</html>