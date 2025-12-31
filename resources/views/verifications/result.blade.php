<!DOCTYPE html>
<html>
<head>
<title>ID Verification</title>
<style>
body { font-family: Arial; text-align:center; padding:30px; }
.valid { color: green; font-size: 22px; }
.invalid { color: red; font-size: 22px; }
</style>
</head>

<body>

@if($staff)
    <div class="valid">✔ VALID STAFF</div>
    <h2>{{ $staff->full_name }}</h2>
    <p>{{ $staff->designation->name }}</p>
    <p>{{ $staff->department->name }}</p>
@else
    <div class="invalid">✖ INVALID / NOT FOUND</div>
@endif

</body>
</html>
