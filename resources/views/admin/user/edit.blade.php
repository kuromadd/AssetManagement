@extends('app.edit_layout')
@section('content')

<div class="card card-default">
  <div class="card-header">  
    <div class="col-8">
        <h3 class="mb-0">edit user</h3>
    </div>
</div>
                <div class="card-body align-items-center">
                    <form action="{{ route('updateUser',$user->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       
                    
                    <label class="form-control-label" for="name">{{ __('Name') }}</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" disabled>
                    
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="email">{{ __('Email') }}</label>
                    <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('example@gmail.com') }}" disabled>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                
                    <div class="form-group">
                        <label for="role_id" class="form-control-label">role</label>
                        <select class="form-control" name="role" id="role" class="form-control form-control-alternative{{ $errors->has('role') ? ' is-invalid' : '' }}">
                            @foreach (Spatie\Permission\Models\Role::all() as $item)
                        <option id="role" @if($user->hasRole($item)) selected @endif value="{{$item->id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.js"></script>


<div style="margin: 2%;margin-left:33%" id="qrcode"></div>

<script>

    var userInput = <?php echo json_encode($user->qrcode); ?>

    var qrcode = new QRCode("qrcode", {
        text: userInput,
        width: 200,
        height: 200,
        colorDark: "black",//#5e72e4
        colorLight: "white",
        correctLevel: QRCode.CorrectLevel.H
    });
    
   
</script>

                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">update</button>
                    </div>
                
                </form>
            
                </div> 
            
            
            
            </div> 
  @endsection