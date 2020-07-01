@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header">  
                    {{$user->name}}
                   <img src="{{ asset($user->profile->image) }}" id="output" class="rounded-circle close" width="100">
                </div>
            
                <div class="card-body">
                    
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
                    </div>
            
                
            </div>
        </div>
@endsection    


