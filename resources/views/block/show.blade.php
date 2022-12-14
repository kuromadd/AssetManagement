@extends('app.layout')

@section('content')
  
            <div class="card card-default">
                <div class="card-header text-center h1" style="background-color: #ecf4fd">  
                    Block Information :
                </div>
            <div class="card-body text-center">
                <div class=" mt-4">
                    Name : {{$block->name}} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class=" mt-4">
                    Address : {{ $block->adress }} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class=" mt-4">
                    Wilaya : {{ $block->wilaya }} . <br>
                    Daira : {{ $block->daira }} . <br>
                    Zip : {{ $block->zip }} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class=" mt-4">
                    Number of underground floors : {{ $block->sous }} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class=" mt-4">
                    Number of floors : {{ $block->nbre_etage }} .
                </div>
            </div>
        </div>
@endsection    