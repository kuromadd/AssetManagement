@extends('app.edit_layout') 
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.js"></script>

<style>

@import url(https://fonts.googleapis.com/css?family=Open+Sans);

*, *::before, *::after {
  box-sizing: border-box;
}

body {
  background: #FDFDFD;
  margin: 25px 0;
}

span.title {
  margin: 0 auto;
  color: #BBB;
  font-family: 'Open Sans', sans-serif;
  font-size: 0.85rem;
  text-align: center;
  display: block;
}

.basicBox, .swiggleBox, .checkBox {
  width: 130px;
  height: 65px;
  margin: 15px auto;
  color: #4274D3;
  font-family: 'Open Sans', sans-serif;
  font-size: 1.15rem;
  line-height: 65px;
  text-transform: uppercase;
  text-align: center;
  position: relative;
  cursor: pointer;
}

svg {
  position: absolute;
  top: 0;
  left: 0;
}
svg rect, svg path, svg polyline {
  fill: none;
  stroke: #4274D3;
  stroke-width: 1;
}

.basicBox:hover svg rect, .swiggleBox:hover svg path, .checkBox:hover svg polyline {
  stroke: #4274D3;
}

/* Basic Box */
svg rect {
  stroke-dasharray: 400, 0;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}
.basicBox:hover svg rect {
  stroke-width: 3;
  stroke-dasharray: 35, 245;
  stroke-dashoffset: 38;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}

/* Swiggle Box */
svg path {
  stroke-dasharray: 265, 0;
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  -ms-transition: all 1s ease-in-out;
  -o-transition: all 1s ease-in-out;
}
.swiggleBox:hover svg path {
  stroke-width: 3;
  stroke-dasharray: 0, 350;
  stroke-dashoffset: 20;
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  -ms-transition: all 1s ease-in-out;
  -o-transition: all 1s ease-in-out;
}

/* Check Box */
.checkBox {
  /* Add Padding Left To Center Text */
}
.checkBox svg {
  /* Presentation Purposes */
  margin-left: -10px;
}
.checkBox svg rect, .checkBox svg polyline {
  fill: none;
  stroke: #4274D3;
  stroke-width: 1;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}
.checkBox:hover svg rect {
  stroke-width: 2;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}
.checkBox:hover svg polyline {
  stroke-width: 2;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}
.checkBox svg .button {
  stroke-dasharray: 400px, 0;
}
.checkBox:hover svg .button {
  stroke-dasharray: 0, 400px;
  stroke-dashoffset: 33px;
}
/* Check Mark Effect */
.box, .checkMark {
  opacity: 0;
}
.checkBox:hover .box {
  -webkit-animation: boxDisplay 0.2s forwards;
  -moz-animation: boxDisplay 0.2s forwards;
  -ms-animation: boxDisplay 0.2s forwards;
  -o-animation: boxDisplay 0.2s forwards;
  animation: boxDisplay 0.2s forwards;
  -webkit-animation-delay: 0.65s;
  -moz-animation-delay: 0.65s;
  -ms-animation-delay: 0.65s;
  -o-animation-delay: 0.65s;
  animation-delay: 0.65s;
}
.checkBox:hover .checkMark {
  -webkit-animation: checkDisplay 0.2s forwards;
  -moz-animation: checkDisplay 0.2s forwards;
  -ms-animation: checkDisplay 0.2s forwards;
  -o-animation: checkDisplay 0.2s forwards;
  animation: checkDisplay 0.2s forwards;
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  -ms-animation-delay: 1s;
  -o-animation-delay: 1s;
  animation-delay: 1s;
}
/* Check Box Display */
@-webkit-keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-moz-keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-ms-keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-o-keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
/* Check Mark Display */
@-webkit-keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-moz-keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-ms-keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-o-keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}


a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}


canvas {
                display: none;
            }
            hr {
                margin-top: 32px;
            }
            input[type="file"] {
                display: block;
                margin-bottom: 16px;
            }
            div {
                margin-bottom: 16px;
            }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style type="text/css">
    #results { padding:20px; border:1px solid; background:#ccc; }
.Camera {
    width: 320px;
    height: 240px;
    border: 1px solid black;
}

</style>

<div class="row">
  <div class="col">
      <div class="card shadow" style="height: auto; width: 67%;margin-left:14% ">
          
        <div>
            <video style="width: 100%;height: auto;" muted playsinline id="qr-video"></video>
        </div>
        
        

        
        <b>Detected QR code: </b>
        <span id="cam-qr-result">None</span>
        <br>
        <b>Last detected at: </b>
        <span id="cam-qr-result-timestamp"></span>

    
</div>



<script type="module">
    import QrScanner from "/qr-scanner.min.js";
    QrScanner.WORKER_PATH = '/qr-scanner-worker.min.js';

    const video = document.getElementById('qr-video');
    const camHasCamera = document.getElementById('cam-has-camera');
    const camQrResult = document.getElementById('cam-qr-result');
    const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
    
   
    function setResult(label, result) {
        label.textContent = result;
        camQrResultTimestamp.textContent = new Date().toString();
        label.style.color = 'teal';
        clearTimeout(label.highlightTimeout);
        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
        let url = "{{ route('exist', ':qrcode') }}";
        url = url.replace(':qrcode', result);
        document.location.href=url;
    }

    // ####### Web Cam Scanning #######

    QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);

    const scanner = new QrScanner(video, result => setResult(camQrResult, result));
    scanner.start();

    document.getElementById('inversion-mode-select').addEventListener('change', event => {
        scanner.setInversionMode(event.target.value);
    });


</script>


@endsection