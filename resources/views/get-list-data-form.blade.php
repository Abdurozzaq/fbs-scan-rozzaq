<!DOCTYPE html>
<html>
<head>
    <title>QR Code Scanner</title>
    @include('components.import')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="text-align: center;">
    @include('components.back-button')


    <h3 style="padding-bottom: 10px;">List Data Scanned QR Code</h3>

    <div class="container" style="width: 600px;">
        <form action="{{ route('get-list-data') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>End Date</label>
                <input type="date" name="end_date" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>
</body>

</html>
