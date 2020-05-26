@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header" >  
                    Mission 
                </div>
            
                <div class="card-body">
                    <form action="{{ route('missions.update',$mission->id) }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="but_mission">But de la mission</label>
                        <input type="text" name="but_mission" value="{{$mission->but_mission}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <input type="text" name="destination" value="{{$mission->destination}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mission_at">date de la Mission</label>
                    <input type="date" name="mission_at" class="form-control" value="{{ $mission->mission_at }}" id="mission_at">
                    </div>

                    <div class="form-group">
                    <label for="Asset_id">Asset</label>
                        <select class="form-control" name="asset_id" id="asset_id">
                            @foreach(\App\Asset::all() as $asset)
                        <option value="{{ $asset->id }}"
                           @if($asset->id == $mission->asset_id)
                            selected
                        @endif>{{$asset->name}}</option>
                            @endforeach
                        </select>
                    </div>
                   
                
            </div>
        </div>
@endsection



