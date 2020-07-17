@extends('app.edit_layout')
@section('content')
    <div class="card card-default">
        <div class="card-header" style="background-color: #ecf4fd">  
            <div class="text-center">
                <div class="h1 mt-4">
                     User Information :
                </div>
                
            </div>
        </div>
            
        <div class="card-body">     
            <div class="text-center">
                <h2>
                    {{ $user->name }},  <span class="font-weight-light">{{\Carbon\Carbon::parse($user->profile->birthdate)->diff(\Carbon\Carbon::now())->format('%y')}}</span>
                </h2>
                <div class="my-4">
                    <img src="{{ asset($user->profile->image) }}" id="output" class="rounded-circle" width="100">
                </div>
                <hr class="my-4" width="75%"/>
                <div class="h3 font-weight-300">
                    <i class="ni location_pin mr-2"></i>{{ $user->profile->birthplace }}
                </div>
                <div class="h3 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>{{ $user->profile->job }}
                </div>
                <div>
                    <i class="ni education_hat mr-2"></i>{{ $user->profile->university }}
                </div>
                <hr class="my-4" width="75%"/>
                <p>{{ $user->profile->about }}</p>
            </div>
        </div>
    </div>
@endsection    


