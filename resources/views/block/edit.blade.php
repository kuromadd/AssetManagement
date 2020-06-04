@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header">  
                   edit a Block
                   <a class="close" href="#">&times;</a>
                </div>
            
                <div class="card-body">
                    <form action="{{ route('updateBlock',$block->id) }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $block->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="adress">Adress</label>
                        <input type="text" name="adress" value="{{$block->adress}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nbreEt">nombre d'etage</label>
                        <input type="number" name="nbreEt" value="{{$block->nbre_etage}}" class="form-control">
                    </div>
                    <div class="text-center">
                    <button class="btn btn-info" type="submit">update</button>    
                    </div> 
                </form>
            
                
            </div>
        </div>
@endsection    