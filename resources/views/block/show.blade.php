@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header">  
                   Block {{$block->name}}
                   <a class="close" href="#">&times;</a>
                </div>
            
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" name="name" disabled value="{{ $block->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="adress">Adress</label>
                        <input type="text" name="adress" disabled value="{{$block->adress}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nbreEt">nombre d'etage</label>
                        <input type="number" name="nbreEt" disabled value="{{$block->nbre_etage}}" class="form-control">
                    </div>
 
            </div>
        </div>
@endsection    