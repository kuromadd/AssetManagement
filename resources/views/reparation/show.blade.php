@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header">
                      <div class="text-center h1"> 
                        Reparation information
                        </div>  
                    </div>
            
                <div class="card-body">
                    <div class="text-center">
                        <div class="h3 mt-4">
                            <span class="font-weight-light">Repaired asset : </span><select disabled name="asset_id" id="asset_id">
                                @foreach(\App\Asset::all() as $asset)
                            <option value="{{ $asset->id }}"
                                @if ($asset->id ?? ''== $reparation->asset_id)
                                selected
                            @endif
                                >{{$asset->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr class="my-4" />
                        <div class="h3 mt-4">
                            <span class="font-weight-light">price : </span>{{ $reparation->prix }}
                        </div>
                        <div class="h3 mt-4">
                            <span class="font-weight-light">reparation date : </span>{{ $reparation->repaired_at }}
                        </div>
                        
                    </div>
            
                
            </div>
        </div>
@endsection    


