@extends('app.edit_layout')

@section('content')
  
            <div class="card card-default">
                <div class="card-header text-center h1" style="background-color: #ecf4fd">  
                    Block Information :
                </div>
            <div class="card-body text-center">
                <div class="h3 mt-4">
                    Name : {{$block->name}} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class="h3 mt-4">
                    Address : {{ $block->adress }} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class="h3 mt-4">
                    Number of underground floors : {{ $block->sous }} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class="h3 mt-4">
                    Number of floors : {{ $block->nbre_etage }} .
                </div>
            </div>
        </div>
@endsection    