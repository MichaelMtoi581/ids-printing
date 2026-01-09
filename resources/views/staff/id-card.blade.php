<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Staff Card</title>

<style>
@page {
    size: 85.6mm 54mm;
    margin: 0;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #fff;
}

/* ================= CARD ================= */
.card {
    width: 85.6mm;
    height: 54mm;
    position: relative;
    overflow: hidden;
    background-image: url("{{ public_path('images/security-bg.png') }}");
    background-size: cover;
}



/* ================= HEADER ================= */

.header-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1px;
}

.header-table td {
    vertical-align: middle;
    text-align: center;
}

.logo {
    width: 11mm;
    height: 11mm;
}

.logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.header-text {
    color: #fff;
}

.council-name {
    font-size: 7.5px;
    font-weight: bold;
    text-transform: uppercase;
    color: #000;
}

.card-type {
    font-size: 8px;
    font-weight: bold;
    text-transform: uppercase;
    color: #000;
    text-align: left;
}

/* ================= FRONT ================= */
.front-content {
    padding: 3mm;
}

.content-table {
    width: 100%;
    border-collapse: collapse;
}

.details-cell {
    width: 78%;
    vertical-align: top;
}

.detail {
    font-size: 9px;
    margin-bottom: 1.4mm;
    height: 8px;
}

.label {
    font-weight:bolder;
    display: inline-block;
    width: 16mm;
    font-size: 9px;
}

/* PHOTO */
.photo-cell {
    width: 22%;
    text-align: right;
    vertical-align: top;
}

.photo-box {
    width: 24mm;
    height: 22mm;
    border: 0.5mm solid #555;
}

.photo-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* CARD NUMBER */
.card-number {
    position: absolute;
    bottom: 2mm;
    left: 3mm;
    right: 3mm;
    font-size: 9px;
    font-weight: bolder;
    color: #111;
    text-align: center;
}

/* ================= BACK ================= */
.back {
    page-break-before: always;
    border: 0.5mm solid #999;
}

.back-header {
    background: #1a5bb8;
    color: #fff;
    text-align: center;
    padding: 2mm;
    font-size: 7.5px;
    font-weight: bold;
    border-bottom: 2mm solid #f8c102;
}

.back-content {
    padding: 3mm;
    font-size: 9px;
    line-height: 1.4;
    
}

/* FOOTER */
.back-footer {
    position: absolute;
    bottom: 3mm;
    left: 1mm;
    right: 4mm;
}

.back-footer table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.signature-line {
    width: 25mm;
    border-top: 0.6mm solid #000;
    margin-top: 10mm;
    margin-left: 105px;
    
}

.signature-text {
    font-size: 9px;
    text-align: center;
    margin-left: 70px;
    font-weight: bold;
}

.qr img {
    width: 22mm;
    height: 22mm;
}
</style>
</head>

<body>

<!-- ================= FRONT ================= -->
<div class="card front">

    <div class="security-bg"></div>
    <div class="watermark"></div>

    <div class="header">
        <table class="header-table">
            <tr>
                <td style="width:15%;">
                    <div class="logo">
                        <img src="{{ public_path('images/COA1.png') }}">
                    </div>
                </td>

                <td style="width:70%;" class="header-text">
                    <div class="council-name">
                    <h3>THE UNITED REPUBLIC OF TANZANIA<br>
                    PRESIDENT'S OFFICE,REGIONAL ADMINISTRATION<br>
                    AND LOCAL GOVERNMENT<br>    
                    KINONDONI MUNICIPAL COUNCIL</h3></div>
                    <div class="card-type">STAFF IDENTITY CARD</div>
                </td>

                <td style="width:15%;">
                    <div class="logo">
                        <img src="{{ public_path('images/KMC.png') }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="front-content">
        <table class="content-table">
            <tr>
                <td class="details-cell">
                    <div class="detail"><span class="label">Name:</span>{{ $staff->full_name }}</div>
                    <div class="detail"><span class="label">Check No:</span>{{ $staff->file_no }}</div>
                    <div class="detail"><span class="label">Designation:</span>{{ $staff->designation?->name }}</div>
                    <div class="detail"><span class="label">Department:</span>{{ $staff->department?->name }}</div>
                    <div class="detail"><span class="label">Valid Until:</span>Dec, 2028</div>
                </td>

                <td class="photo-cell">
                    <div class="photo-box">
                        @if($staff->photo_path)
                            <img src="{{ public_path('storage/'.$staff->photo_path) }}">
                        @endif
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="card-number">
        Card No: KMC{{ str_pad($staff->id, 8, '0', STR_PAD_LEFT) }}
    </div>
</div>

<!-- ================= BACK ================= -->
<div class="card back">

    <div class="security-bg"></div>

    <div class="back-footer">
        <table>
            <tr>
                <td style="width: 60%;">
                    <div class="back-content">
                        If found kindly return to:<br>
                        Director - Kinondoni MC,<br>
                        P.O. Box 31902,<br>
                        2Morogoro Road,<br>
                        Dar es Salaam.<br>
                        Phone: 0222170173<br>
                        Email: md@kinondonimc.go.tz

                     </div>

                </td>
                <td style="text-align:right; width: 40%;" class="qr">
                    <img src="data:image/png;base64,{{ $qrBase64 }}">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="signature-text">Issuer's Signature</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="signature-line"></div>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>


