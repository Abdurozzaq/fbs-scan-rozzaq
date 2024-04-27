<!DOCTYPE html>
<html>
<head>
    <title>Scanned QR Code Data Report</title>
    <style>
        table {
            width: 100vw;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body style="text-align: center;">
    <h3 style="padding-bottom: 5px;">Scanned QR Code Data Report</h3>
    <h5 style="padding-bottom: 10px;">{{ $startDate }} Until {{ $endDate }}</h5>
    <div style="width: 100vw;">
        <table>
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
