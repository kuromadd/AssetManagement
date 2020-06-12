<html>

<head>
    <script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.js"></script>
    <script type="text/javascript" src="https://requirejs.org/docs/release/2.3.6/minified/require.js"></script>

</head>

<body>
    <input type="text" id="valor" value="">
    <button onClick="createQrCode()">Gerar QR Code</button>
    <div id="qrcode"></div>
    <!--script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script-->

    <video id="preview"></video>

    <script>
        function createQrCode() {
            var userInput = document.getElementById('valor').value;

            var qrcode = new QRCode("qrcode", {
                text: userInput,
                width: 256,
                height: 256,
                colorDark: "black",
                colorLight: "white",
                correctLevel: QRCode.CorrectLevel.H
            });
        }
        const Instascan = require('instascan');
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            alert('Escaneou o conteudo: ' + content);
            window.open(content, "_blank");
        });
        Instascan.Camera.getCameras().then(cameras => {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error("Não existe câmera no dispositivo!");
            }
        });
    </script>

</html>