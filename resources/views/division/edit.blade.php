@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header">  
                   Division edit :
                </div>
            
                <div class="card-body">
                    <form action="{{ route('updateDivision',$division->id) }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Code division :</label>
                    <input type="text" name="code_div" value="{{ $division->code_div }}" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="adress">Libel :</label>
                        <input type="text" name="libel" value="{{$division->libel}}" class="form-control" required placeholder=" ">
                    </div>
                    
                    <div class="text-center">
                    <button class="btn btn-info" type="submit">update</button>    
                    </div> 
                </form>
            
                
            </div>
        </div>
@endsection    