<!DOCTYPE html>
<html>

<head>
    <title>QR Code Scanner</title>
    @include('components.import')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="text-align: center;">

    @include('components.back-button')


    <h3 style="padding-bottom: 10px;">Scan QR Code With Button Trigger</h3>
    <div id="startWrapper" style="text-align: center;">
        <button id="startScanButton" type="button" class="btn btn-primary">Start Scan</button>
    </div>
    <div id="reader" style="width: 500px; margin-left: auto; margin-right: auto;"></div>


    @include('components.alert')

    <script>
        var failedToastButtonTrigger = document.getElementById('failedToastBtn');
        var successToastButtonTrigger = document.getElementById('successToastBtn');

        let config = {fps: 10, qrbox: {width: 250, height: 250}};
        let scanner = new Html5QrcodeScanner("reader", config);

        function onScanSuccess(decodedText, decodedResult) {
            // Mengirimkan hasil scan ke server
            fetch('/insert-scanned-data', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({scan_result: decodedText})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        successToastButtonTrigger.click();
                        // Stop the scanner
                        scanner.clear();
                        // Show Start Button
                        document.getElementById("startWrapper").style.display = 'inline';
                    } else {
                        failedToastButtonTrigger.click();
                        // Stop the scanner
                        scanner.clear();
                        // Show Start Button
                        document.getElementById("startWrapper").style.display = 'inline';
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        document.getElementById("startScanButton").addEventListener("click", function () {
            scanner.render(onScanSuccess);
            document.getElementById("startWrapper").style.display = 'none';
        });
    </script>
</body>

</html>
