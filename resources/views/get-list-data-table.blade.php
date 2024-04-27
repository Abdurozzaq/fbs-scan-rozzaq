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
        <table class="table">
            <thead>
            <tr>
                <th>Code QR</th>
                <th>Used At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
