@extends('app.layout')
@section('content')

<div class="row">
  <div class="col">
      <div class="card shadow" style="width: 70%;margin-left:14% ">
          <div class="card-header border-0">
              <div class="row align-items-center">
                  <div class="col-8">
                      <h3 class="mb-0">Create a new asset :</h3>
                  </div>
              </div>
          </div>
          
<div class="card-body">
    <form action="{{ route('storeAsset') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
      {{ csrf_field() }}

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  
  <script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.js"></script>

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
              <label class="text-danger" id="note"><b>Note : </b> scan asset qr or it will fill automaticly</label>
          </div>
  
  
  
  
  <script type="module">
      import QrScanner from "/qr-scanner.min.js";
      QrScanner.WORKER_PATH = '/qr-scanner-worker.min.js';
  
      const video = document.getElementById('qr-video');
      const camHasCamera = document.getElementById('cam-has-camera');
      const camQrResult = document.getElementById('cam-qr-result');

      
     
      function setResult(input, result) {
         
          input.value = result;
          var userInput = input.value;
          $("#qrcode").empty();
          $("#note").empty();
          var qrcode = new QRCode("qrcode", {
              text: userInput,
              width: 200,
              height: 200,
              colorDark: "black",//#5e72e4
              colorLight: "white",
              correctLevel: QRCode.CorrectLevel.H
          });

      }
  
      // ####### Web Cam Scanning #######
  
      const scanner = new QrScanner(video, result => setResult(camQrResult, result));
      scanner.start();
  
  
  
  </script>
  
  <div style="margin: 2%;margin-left:25%" id="qrcode"></div>
  <br>              
<input type="text" name="qrcode" id="cam-qr-result" hidden value="{{Str::random(15)}}">
      <div class="form-group">
          <label class="form-control-label" for="name">&#160&#160Name :</label>
          <input type="text" name="name" class="form-control" required>
          <div class="invalid-feedback">
            Please provide a valid name.
          </div>
      </div>

    <div class="form-group">
        <label for="brand" class="form-control-label"> &#160&#160Brand :</label>
        <input type="text" name="brand" class="form-control">
        <div class="invalid-feedback">
          Please provide a valid brand.
        </div>
    </div>

      <div class="form-group">
          <label for="description" class="form-control-label"> &#160&#160Description :</label>
          <textarea class="form-control" name="description" id="description" cols="4" rows="4" required></textarea>
          <div class="invalid-feedback">
            Please provide a valid description.
          </div>
      </div>
  
      <div class="form-group">
          <label class="form-control-label" for="prix">&#160&#160Price :</label>
          <input type="number" name="prix" class="form-control form-control-alternative" required min="0">
          <div class="invalid-feedback">
            Please provide a valid price.
          </div>
        </div>
      <div class="form-group">
        <label for="category" class="form-control-label">&#160&#160Category :</label>
        <select name="category" id="category" class="custom-select browser-default" required>
          <option value="" disabled selected>Choose a category :</option>
          <option value="Furniture and fixtures">Furniture and fixtures</option>
          <option value="Intangible assets">Intangible assets</option> {{-- trademarks, customer lists, literary works, broadcast rights, and patented technology. --}}
          <option value="Office equipement">office equipement</option>
          <option value="Vehicle">vehicle</option>
          <option value="Software">Software</option>
          <option value="Building">building</option>
        </select>
        <div class="invalid-feedback">
          Please select a category.
        </div>
      </div>
    
      <div class="form-group">
        <label for="date" class="form-control-label">&#160&#160 Acquisition date:</label>
      <input type="date" name="dateAchat" id="dateAchat" class="form-control datetimepicker" value="{{date("Y-m-d")}}" required>
      <div class="invalid-feedback">
        Please provide a valid date.
      </div>
      </div>

      <div class="form-group">
        <label for="date" class="form-control-label">&#160&#160Commissioning date :</label>
      <input type="date" name="dateservice" id="dateservice" class="form-control datetimepicker" value="{{date("Y-m-d")}}" required>
      <div class="invalid-feedback">
        Please provide a valid date.
      </div>
      </div>

      <div class="form-group">
        <label for="duree" class="form-control-label">&#160&#160Lifetime :</label>
        <input  type="number" name="duree" id="duree" class="form-control form-control-alternative" required min="0">
        <div class="invalid-feedback">
          Please provide a valid number.
        </div>
      </div>

      <div class="form-group">
        <label for="fournisseur_id">Provider :</label>
            <select class="custom-select browser-default fournisseurID" name="fournisseur_id" id="fournisseur_id" required>
              <option value="" disabled selected>choose a supplier :</option>
                @foreach(\App\Fournisseur::all() as $fournisseur)
            <option value="{{ $fournisseur->id }}">{{$fournisseur->libel}}</option>
                @endforeach
            </select>               
            <div class="invalid-feedback">
              Please select a provider.
            </div>
        </div>
      
      <div class="text-center">
      <button class="btn btn-success" type="submit">Store</button>    
      </div> 
    </form>    
  </div>
</div>

@endsection

<script>(function() {
  'use strict';
  window.addEventListener('load', function() {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit', function(event) {
  if (form.checkValidity() === false) {
  event.preventDefault();
  event.stopPropagation();
  }
  form.classList.add('was-validated');
  }, false);
  });
  }, false);
  })();
  </script>