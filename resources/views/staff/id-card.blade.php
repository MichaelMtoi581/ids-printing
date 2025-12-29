<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10px;
        }
        .card {
            border: 1px solid #000;
            padding: 8px;
            width: 100%;
            height: 100%;
        }
        .header {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
        }
        .photo {
            text-align: center;
            margin: 6px 0;
        }
        .photo img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border: 1px solid #000;
        }
        .field {
            margin-bottom: 4px;
        }
        .label {
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 6px;
            font-size: 9px;
        }
    </style>
</head>
<body>
<div class="card">

    <div class="header">
        KMC – STAFF ID CARD
    </div>

    <div class="photo">
        @if($staff->photo_path)
            <img src="{{ public_path('storage/'.$staff->photo_path) }}">
        @endif
    </div>

    <div class="field">
        <span class="label">Name:</span> {{ $staff->full_name }}
    </div>

    <div class="field">
        <span class="label">File No:</span> {{ $staff->file_no }}
    </div>

    <div class="field">
        <span class="label">Department:</span> {{ $staff->department->name }}
    </div>

    <div class="field">
        <span class="label">Designation:</span> {{ $staff->designation->name }}
    </div>

    <div class="field">
        <span class="label">Status:</span> {{ ucfirst($staff->status) }}
    </div>

    <div class="footer">
        Property of KMC – If found return to ICT
    </div>

</div>
</body>
</html>
