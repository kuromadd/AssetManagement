@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header">  
                   Service edit :
                </div>
            
                <div class="card-body">
                    <form action="{{ route('updateService',$service->id) }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Code service :</label>
                    <input type="text" name="code_ser" value="{{ $service->code_ser }}" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="adress">Libel :</label>
                        <input type="text" name="libel" value="{{$service->libel}}" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="division_id">Departement :</label>
                            <select class="form-control" name="departement_id" id="departement_id">
                                @foreach(\App\Departement::all() as $departement)
                            <option value="{{ $departement->id }}"
                                @if ($departement ?? ''== $service->departement_id)
                                selected
                            @endif
                                >{{$departement->libel}}</option>
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