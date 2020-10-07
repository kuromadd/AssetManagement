@extends('app.edit_layout')

@section('content')
  
            <div class="card card-default">
                <div class="card-header text-center h1" style="background-color: #ecf4fd">  
                    Division Information :
                </div>
            <div class="card-body text-center">
                <div class="h3 mt-4">
                    Code division : {{$division->code_div}} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class="h3 mt-4">
                    Libel : {{ $division->libel }} .
                </div>
            </div>
        </div>
@endsection    