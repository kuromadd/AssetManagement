@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

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

    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-3"><small>{{ __('Sign in with') }}</small></div>
                        <div class="btn-wrapper text-center">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
                        
                        <script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.js"></script>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                

                                <div>
                                    <video class="tv" style="width: 90%;height: auto;" muted playsinline id="qr-video"></video>
                                </div>

                            <input type="text" id="cam-qr-result" name="qrcode" class="QRcode" value="{{null}}" hidden>
    
                        </div>
                        
                        <script type="module">
                            import QrScanner from "/qr-scanner.min.js";
                            QrScanner.WORKER_PATH = '/qr-scanner-worker.min.js';
                        
                            const video = document.getElementById('qr-video');
                            const camHasCamera = document.getElementById('cam-has-camera');
                            const camQrResult = document.getElementById('cam-qr-result');
                            const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
                            
                           
                            function setResult(input, result) {
                                toastr.info('loading ... please wait');
                                let url = "{{ route('qrcheck', ':qrcode') }}";
                                url = url.replace(':qrcode', result);
                                document.location.href=url;
                            }
                        
                            // ####### Web Cam Scanning #######
         
                        
                            const scanner = new QrScanner(video, result => setResult(camQrResult, result));
                            scanner.start();
                        
                        </script>

                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>
                                <a href="{{ route('register') }}">{{ __('Create new account') }}</a> {{ __('OR Sign in with these credentials:') }}
                            </small>
                            <br>
                            <small>
                                {{ __('Username') }} <strong>admin@argon.com</strong>
                                {{ __('Password') }} <strong>secret</strong>
                            </small>
                        </div>
                        
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="admin@argon.com" autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="secret">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Sign in') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small>{{ __('Forgot password?') }}</small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('register') }}" class="text-light">
                            <small>{{ __('Create new account') }}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
