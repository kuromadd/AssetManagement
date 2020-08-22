@extends('app.edit_layout') 
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style type="text/css">
    #results { padding:20px; border:1px solid; background:#ccc; }


.tv {
      position: relative;
      margin: 20px 0;
      background: rgb(97, 6, 243);
      border-radius: 50% / 10%;
      color: white;
      text-align: center;
      text-indent: .1em;
    }
    .tv:before {
      content: '';
      position: absolute;
      top: 10%;
      bottom: 10%;
      right: -5%;
      left: -5%;
      background: inherit;
      border-radius: 5% / 50%;
    }
    
</style>


        <div>
            <video class="tv" style="width: 50%;height: auto;margin:10%;margin-left:22%" muted playsinline id="qr-video"></video>
            
        </div>




<script type="module">
    import QrScanner from "/qr-scanner.min.js";
    QrScanner.WORKER_PATH = '/qr-scanner-worker.min.js';

    const video = document.getElementById('qr-video');
    const camHasCamera = document.getElementById('cam-has-camera');
    const camQrResult = document.getElementById('cam-qr-result');
   
   
    
   
    function setResult(label, result) {
        
        toastr.info('loading ... please wait');
        let url = "{{ route('exist', ':qrcode') }}";
        url = url.replace(':qrcode', result);
        document.location.href=url;
        
    }

    // ####### Web Cam Scanning #######

    const scanner = new QrScanner(video, result => setResult(camQrResult, result));
    scanner.start();



</script>


@endsection