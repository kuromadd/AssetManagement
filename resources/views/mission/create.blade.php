@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header" >  
                   add a new Mission
                </div>
            
                <div class="card-body">
                    <form action="{{ route('storeMission') }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="but_mission">But de la mission</label>
                        <input type="text" name="but_mission" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <input type="text" name="destination" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mission_at">date de la Mission</label>
                        <input type="date" name="mission_at" class="form-control" id="mission_at">
                    </div>

                    <div class="form-group">
                    <label for="Asset_id">Asset</label>
                        <select class="form-control" name="asset_id" id="asset_id">
                            <option value="0" disabled @if( $_GET["id"] == 0)selected @endif>select asset</option>
                            @foreach(\App\Asset::all() as $asset)
                                  @if($asset->etat) 
                                    <option value="{{ $asset->id }}"
                                    @if( $_GET["id"] && $asset->id == $_GET["id"])
                                    selected
                                    @endif>{{$asset->name}}</option>
                                  @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                    <button class="btn btn-info" type="submit">store</button>    
                    </div> 
                </form>
            
                
            </div>
        </div>
@endsection



