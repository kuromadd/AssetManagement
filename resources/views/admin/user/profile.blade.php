@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card card-default">
          <div class="card-header">  
           my profile
        </div>
    
        <div class="card-body">
            <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">new pass</label>
                <input type="password" name="password" value="{{ $user->password}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="avatar">my avatar {{ asset(($user->profile)->avatar) }}</label>
            <input type="file" name="avatar" class="form-control" value="{{ $user->profile->avatar }}">
            </div>

            <div class="form-group">
                <label for="about">about me</label>
            <textarea name="about" id="about" cols="6" rows="6" class="form-control">{{ $user->profile->about }}</textarea>
            </div>

            <div class="form-group">
                <label for="facebook">my facebook</label>
                <input type="text" name="facebook" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="youtube">youtube</label>
                <input type="text" name="youtube" class="form-control">
            </div>
            
            <div class="text-center">
            <button class="btn btn-success" type="submit">update profile</button>    
            </div> 
        </form>
    
        </div>
    
    
    
    </div>
    </div>

@endsection