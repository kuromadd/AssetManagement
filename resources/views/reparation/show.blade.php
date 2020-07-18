@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header" style="background-color: #ecf4fd">
                      <div class="text-center h1" > 
                        Reparation information :
                        </div>  
                    </div>
             
                <div class="card-body">
                    <div class="text-center">
                        <div class="h3 mt-4">
                            Repaired asset : 
                            @foreach (\App\asset::all() as $asset)
                                @if($asset->id == $reparation->asset_id)
                                    {{$asset->name}}
                                @endif
                            @endforeach
                        </div>
                        <hr class="my-4" width="75%"/>
                        <div class="h3 mt-4">
                           price : {{ $reparation->prix }}.00 DZD
                        </div>
                        <hr class="my-4" width="75%"/>
                        <div class="h3 mt-4">
                            reparation date : {{ $reparation->repaired_at }}
                        </div>
                        
                    </div>
            
                
            </div>
        </div>
@endsection    


