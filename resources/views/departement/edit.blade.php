@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header">  
                   Departement edit :
                </div>
            
                <div class="card-body">
                    <form action="{{ route('updateDepartement',$departement->id) }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Code departement :</label>
                    <input type="text" name="code_dep" value="{{ $departement->code_dep }}" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="adress">Libel :</label>
                        <input type="text" name="libel" value="{{$departement->libel}}" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="division_id">Division :</label>
                            <select class="form-control" name="division_id" id="division_id">
                                @foreach(\App\Division::all() as $division)
                            <option value="{{ $division->id }}"
                                @if ($division_id ?? ''== $departement->division_id)
                                selected
                            @endif
                                >{{$division->libel}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    <div class="text-center">
                    <button class="btn btn-info" type="submit">update</button>    
                    </div> 
                </form>
            
                
            </div>
        </div>
@endsection    