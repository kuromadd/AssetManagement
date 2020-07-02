@extends('app.layout', ['title' => __('User Profile')])

@section('content')
<style>
span {
  cursor: pointer;
}
a {
  position: relative;
  overflow: hidden;
}
span:hover a {
  color: red;
}
a + input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.bgimg{
    background-image: url('/uploads/back.png');
    background-size: cover;
    background-position: center top;
}
</style>
<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @method('put')
    
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. $user->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])   
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image" style="">
                                <span><a href='#'>
                                <img src="{{ asset($user->profile->image) }}" id="output" class="rounded-circle">
                                </a><input type='file' name="image" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" /></span><span>
                            </div>
                        </div>
                    </div>
                   <br><br>
                   <br>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="text-center">
                            <h3>
                                {{ $user->name }},  <span class="font-weight-light">{{\Carbon\Carbon::parse($user->profile->birthdate)->diff(\Carbon\Carbon::now())->format('%y')}}</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $user->profile->birthplace }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $user->profile->job }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ $user->profile->university }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ $user->profile->about }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        
                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="about">about me</label>
                                <textarea name="about" id="about" cols="6" rows="6" class="form-control form-control-alternative">{{ $user->profile->about }}</textarea>
                                </div>
                    
                                <div class="form-group">
                                    <label class="form-control-label" for="birthdate">Birth date</label>
                                    <input type="date" name="birthdate" value="{{ $user->profile->birthdate }}" class="form-control form-control-alternative">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="birthplace">Birth place</label>
                                    <input type="text" name="birthplace" value="{{ $user->profile->birthplace }}" class="form-control form-control-alternative">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="job">Job / Position</label>
                                    <input type="text" name="job" value="{{ $user->profile->job }}" class="form-control form-control-alternative">
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="university">University</label>
                                    <input type="text" name="university" value="{{ $user->profile->university }}" class="form-control form-control-alternative">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div> 
@endsection

