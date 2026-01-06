<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>KMC Staff ID Card</title>

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
}

/* ================= HEADER ================= */
.header {
    background: #1a5bb8;
    border-bottom: 2mm solid #f8c102;
    padding: 2mm;
}

.header-table {
    width: 100%;
    border-collapse: collapse;
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
}

.card-type {
    font-size: 8px;
    font-weight: bold;
    text-transform: uppercase;
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

.staff-name {
    font-size: 9px;
    font-weight: bold;
    color: #1a5bb8;
    margin-bottom: 2mm;
    text-transform: uppercase;
}

.detail {
    font-size: 7px;
    margin-bottom: 1.4mm;
}

.label {
    font-weight: bold;
    display: inline-block;
    width: 22mm;
}

/* PHOTO */
.photo-cell {
    width: 22%;
    text-align: right;
    vertical-align: top;
}

.photo-box {
    width: 24mm;
    height: 28mm;
    border: 0.5mm solid #ccc;
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
    font-size: 7px;
    font-weight: bold;
    color: #333;
}

/* ================= BACK ================= */
.back {
    page-break-before: always;
    border: 0.5mm solid #ddd;
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
    font-size: 7px;
    line-height: 1.4;
}

/* FOOTER */
.back-footer {
    position: absolute;
    bottom: 3mm;
    left: 3mm;
    right: 3mm;
}

.back-footer table {
    width: 100%;
    border-collapse: collapse;
}

.signature-line {
    width: 25mm;
    border-top: 0.5mm solid #000;
    margin-bottom: 1mm;
}

.signature-text {
    font-size: 7px;
    font-weight: normal;
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

    <div class="header">
        <table class="header-table">
            <tr>
                <td style="width:15%;">
                    <div class="logo">
                        <img src="{{ public_path('images/COA1.png') }}">
                    </div>
                </td>

                <td style="width:70%;" class="header-text">
                    <div class="council-name">KINONDONI MUNICIPAL COUNCIL</div>
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
                    <div class="staff-name">{{ $staff->full_name }}</div>

                    <div class="detail"><span class="label">File No:</span>{{ $staff->file_no }}</div>
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

    <div class="back-header">
        KINONDONI MUNICIPAL COUNCIL
    </div>

    <div class="back-content">
        This card remains the property of Kinondoni Municipal Council.<br>
        If found, please return to the council offices.
    </div>

    <div class="back-footer">
        <table>
            <tr>
                <td>
                    <div class="signature-line"></div>
                    <div class="signature-text">Issuer's Signature</div>
                </td>

                <td style="text-align:right;" class="qr">
                    <img src="data:image/png;base64,{{ $qrBase64 }}">
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
