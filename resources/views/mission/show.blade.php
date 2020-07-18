@extends('app.edit_layout')
@section('content')

<div class="card card-default">
    <div class="card-header">
        <div class="text-center h1"> 
          Mission information :
        </div>  
    </div>

    <div class="card-body">
        <div class="text-center">
            <div class="h3 mt-4">
                Asset : 
              @foreach (\App\asset::all() as $asset)
                  @if($asset->id == $mission->asset_id)
                      {{$asset->name}} .
                  @endif
              @endforeach
          </div>
          <hr class="my-4" width="75%"/>
          <div class="h3 mt-4">
             But de la mission : {{$mission->but_mission}} .
          </div>
          <hr class="my-4" width="75%"/>
          <div class="h3 mt-4">
              Destination : {{ $mission->destination }}
          </div>
          <hr class="my-4" width="75%"/>
          <div class="h3 mt-4">
              Mission date : {{ $mission->mission_at }}
          </div>
          
      </div>

  
</div>
</div>

@endsection



