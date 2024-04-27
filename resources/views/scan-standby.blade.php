<!DOCTYPE html>
<html>
<head>
    <title>QR Code Scanner</title>
    @include('components.import')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="text-align: center;">
    @include('components.back-button')


    <h3 style="padding-bottom: 10px;">Scan QR Code Standby</h3>

    <div id="reader" style="width: 500px; margin-left: auto; margin-right: auto;"></div>


    @include('components.alert')


    <script>
        var failedToastButtonTrigger = document.getElementById('failedToastBtn');
        var successToastButtonTrigger = document.getElementById('successToastBtn');

        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded message.
            console.log(`Scan result ${decodedText}`, decodedResult);

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
                        scanner.html5Qrcode.start({facingMode: "environment"}, config, onScanSuccess);
                    } else {
                        failedToastButtonTrigger.click();
                        scanner.html5Qrcode.start({facingMode: "environment"}, config, onScanSuccess);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });

            // Stop the scanner
            scanner.html5Qrcode.stop()
                .catch((err) => {
                    // Stop failed, handle it.
                    console.log(err);
                });
        }

        let config = {fps: 10, qrbox: {width: 250, height: 250}};
        let scanner = new Html5QrcodeScanner("reader", config);
        scanner.render(onScanSuccess);
    </script>
</body>

</html>
