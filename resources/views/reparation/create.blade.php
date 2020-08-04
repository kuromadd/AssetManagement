@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header" >  
                   add a new Reparation
                </div>
            
                <div class="card-body">
                    <form action="{{ route('storeReparation') }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="prix">prix</label>
                        <input type="text" name="prix" class="form-control" required placeholder=" ">
                    </div>

                    <div class="form-group">
                        <label for="repaired_at">date de la reparation</label>
                    <input type="date" name="repaired_at" value="{{date('Y-m-d')}}" class="form-control" id="repaired_at">
                    </div>

                    <div class="form-group">
                    <label for="Asset_id">Asset</label>
                        <select class="form-control" name="asset_id" id="asset_id">
                            @foreach(\App\Asset::all() as $asset)
                            @if($asset->status == 2)
                            
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



