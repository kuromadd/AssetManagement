@extends('app.edit_layout')

@section('content')
  
            <div class="card card-default">
                <div class="card-header text-center h1" style="background-color: #ecf4fd">  
                    Departement Information :
                </div>
            <div class="card-body text-center">
                <div class="h3 mt-4">
                    Code departement : {{$departement->code_dep}} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class="h3 mt-4">
                    Libel : {{ $departement->libel }} .
                </div>
                <hr class="my-4" />
                    <div class="h3 mt-4">
                        Division : @foreach(\App\Division::all() as $division)
                                    @if ($division->id == $departement->division_id)
                                        {{$division->libel}}
                                    @endif
                                @endforeach .
                    </div>
            </div>
        </div>
@endsection    