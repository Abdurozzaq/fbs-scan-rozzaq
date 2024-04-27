<!DOCTYPE html>
<html>
<head>
    <title>QR Code Scanner</title>
    @include('components.import')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .nav-pills {
            /* Tambahkan jarak antar tombol */
            margin-bottom: 8px;
        }

        .nav-link {
            /* Atur warna dan style */
            background-color: #eee;
            color: #000;
            border-radius: 5px;
            padding: 10px 16px;
        }

        .nav-link.active {
            /* Style untuk tombol aktif */
            background-color: #ccc;
            font-weight: bold;
        }
    </style>
</head>
<body style="text-align: center;">
    @include('components.back-button')


    <h3 style="padding-bottom: 6px;">Welcome To Scan QR Code App</h3>
    <h6 style="padding-bottom: 10px;">By abdurozzaq00@gmail.com</h6>

    <div class="container" style="width: 600px;">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav flex-column nav-pills mb-auto">
                    <li class="nav-item mb-4">
                        <a id="scan-standby" href="#" class="nav-link" aria-current="page">Scan Standby</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a id="scan-manual" href="#" class="nav-link">Scan By Action Click</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a id="get-list-data-form" href="#" class="nav-link">List Scanned Data</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a id="export-list-to-pdf" href="#" class="nav-link">Export Data To PDF</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById("scan-standby").onclick = function() {
        window.location.href = "/scan-standby";
    };

    document.getElementById("scan-manual").onclick = function() {
        window.location.href = "/scan-manual";
    };

    document.getElementById("get-list-data-form").onclick = function() {
        window.location.href = "/get-list-data-form";
    };

    document.getElementById("export-list-to-pdf").onclick = function() {
        window.location.href = "/export-pdf-form";
    };
</script>

</html>
