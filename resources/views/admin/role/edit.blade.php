@extends('app.layout')
@section('content')

            <div class="card card-default">
                  <div class="card-header ">  
                    <div class="col-8">
                        <h3 class="mb-0">edit a role</h3>
                    </div>
                </div>
            
                <div class="card-body">
                    <form action="{{ route('updateRole',['id',$role->id]) }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="role">role</label>
                        <input type="text" name="role" value="{{$role->name}}" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label >select permissions</label><br>
                        @foreach (Spatie\Permission\Models\Permission::all() as $item)      
                        <label for="permissions[]" class="checkbox-inline"><input type="checkbox" name="permissions[]" value="{{$item->id}}"
                            @foreach($role->permissions as $per)
                                @if($per->id == $item->id)
                                    checked
                                @endif
                            @endforeach
                            >{{ $item->name }}&#160&#160&#160</label>
                        @endforeach
                    </div>
        
                    <div class="text-center">
                    <button class="btn btn-success" type="submit">update</button>    
                    </div> 
                </form>               
            </div>
        </div>
 
@endsection        