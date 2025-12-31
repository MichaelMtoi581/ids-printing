@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Staff ID Card</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
        }

        .page {
            width: 350px;
            margin: auto;
        }

        .card {
            width: 350px;
            height: 220px;
            border-radius: 10px;
            border: 1px solid #0a3d62;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
        }

        /* ---------- FRONT SIDE ---------- */
        .front {
            background: linear-gradient(to bottom, #e8f6ff, #cce7ff);
            padding: 10px;
        }

        .header {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: bold;
            color: #003366;
            text-transform: uppercase;
        }

        .header img {
            height: 35px;
        }

        .title {
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            margin: 6px 0;
        }

        .content {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        .details {
            font-size: 10px;
            width: 65%;
        }

        .details p {
            margin: 3px 0;
        }

        .photo {
            width: 35%;
            text-align: center;
        }

        .photo img {
            width: 80px;
            height: 90px;
            object-fit: cover;
            border: 1px solid #333;
        }

        .card-number {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: #1e3799;
            color: #fff;
            text-align: center;
            font-size: 10px;
            padding: 4px;
            font-weight: bold;
        }

        /* ---------- BACK SIDE ---------- */
        .back {
            background: #f7fbff;
            padding: 10px;
            font-size: 9px;
        }

        .back p {
            margin: 4px 0;
        }

        .back .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .qr img {
            width: 70px;
            height: 70px;
        }

        .signature {
            text-align: center;
            font-size: 9px;
        }

        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>
<body>

<div class="page">

    <!-- FRONT SIDE -->
    <div class="card front">

        <div class="header">
            <img src="{{ public_path('images/kmc-logo.jpg') }}">
            <div>
                Kinondoni Municipal Council<br>
                Staff Identity Card
            </div>
        </div>

        <div class="title">
            {{ $staff->full_name }}
        </div>

        <div class="content">
            <div class="details">
                <p><strong>Check No:</strong> {{ $staff->file_no }}</p>
                <p><strong>Designation:</strong> {{ $staff->designation->name }}</p>
                <p><strong>Department:</strong> {{ $staff->department->name }}</p>
                <p><strong>Valid Until:</strong> Dec, 2028</p>
            </div>

            <div class="photo">
                @if($staff->photo_path)
                    <img src="{{ public_path('storage/'.$staff->photo_path) }}">
                @endif
            </div>
        </div>

        <div class="card-number">
            Card Number: KMC{{ str_pad($staff->id, 8, '0', STR_PAD_LEFT) }}
        </div>
    </div>

    <!-- BACK SIDE -->
    <div class="card back">

        <p><strong>This card is a property of Kinondoni Municipal Council</strong></p>
        <p>If found, please return to:</p>

        <p>
            P.O. Box 31902,<br>
            Morogoro Road,<br>
            Dar es Salaam<br>
            ☎ +255 222 217 073<br>
            ✉ info@kinondonimc.go.tz
        </p>

        <div class="footer">
            <div class="signature">
                <br>
                ----------------------<br>
                Issuer’s Signature
            </div>

            <div class="qr">
                {!! QrCode::size(70)->generate(route('staff.show', $staff->id)) !!}
                <div style="text-align:center;font-size:8px;">Scan to Verify</div>
            </div>
        </div>

    </div>

</div>

<script>
    window.print();
</script>

</body>
</html>
