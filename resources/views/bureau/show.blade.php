@extends('app.layout')
@section('content')
<style>
    .float-container {
    padding: 5px;
}

.float-child {
    width: 50%;
    float: left;
    padding: 15px;
}  
</style>
        <div class="card card-default">
              <div class="card-header text-center h1" style="background-color: #ecf4fd">
                    Bureau information :
            </div>
            
            <div class="card-body float-container">

                <div class="card-body text-center">
                    <div class="float-child">
                        <p>
                            <button class="btn btn-secondary btn-lg btn-block" role="button" data-toggle="collapse" data-target="#collapsedet" aria-expanded="false" aria-controls="collapsedet">
                                Bureau detail :
                            </button>
                        </p>
                        <div class="collapse" id="collapsedet">
                            <div class="card card-body">
                    <div class="h3 mt-4">
                        Name : {{$bureau->name}} .
                    </div>
                    <hr class="my-4" />
                    <div class="h3 mt-4">
                        Type : {{$bureau->type}} .
                    </div>
                    <hr class="my-4" />
                    <div class="h3 mt-4">
                        Block : @foreach(\App\block::all() as $block)
                                    @if ($block->id == $bureau->block_id)
                                        {{$block->name}}
                                    @endif
                                @endforeach .
                    </div>
                    <hr class="my-4"/>
                    <div class="h3 mt-4">
                        Floor number : {{$bureau->etage}} .
                    </div>
                            </div>
                        </div>
                </div>
                <div class="float-child">
                    
                        <div class="card card-body">    
                            @if (\App\Asset::all()->where('bureau_id', $bureau->id)->isEmpty())
                                There are no assets in this chamber/office.
                            @else
                                <div class="table-responsive">
                                    @php
                                        $assets = \App\Asset::where('bureau_id', $bureau->id)->paginate(5);
                                    @endphp
                                    <table class="table align-items-center table-flush table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Asset</th>
                                                {{-- <th scope="col">Description</th> --}}
                                                <th scope="col">Category</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($assets as $asset)
                                                <tr>
                                                    <td>{{$asset->name}}</td>
                                                    {{-- <td>{{$asset->description}}</td> --}}
                                                    <td>{{$asset->category}}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" href="{{route('showAsset',$asset->id)}}"><i class="fa fa-info fa-fw"></i></i> show</a>
                                                                @can('asset-edit')<a class="dropdown-item" href="{{route('editAsset',$asset->id)}}"><i class="fa fa-edit fa-fw"></i></i> edit</a>@endcan
                                                                @can('asset-delete')<a class="dropdown-item" href="{{ route('deleteAsset',$asset->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>@endcan
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach    
                                        </tbody>
                                    </table>
                
                                    <div class="d-flex justify-content-center">
                                        {!! $assets->render() !!} 
                                    </div>
                
                                </div>  
                            @endif
                                <br>
                            <a href="#" data-toggle="modal" data-target="#addass">Add assets</a>
                
                                
                            {{-- <div class="h3 mt-4">
                                <a href="{{route('createTransfert',$asset->id)}}"><i class="fa fa-paper-plane fa-fw text-blue"></i></i> transfer &#160&#160&#160</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                 {{-- <div class="text-center">
                    <a href="#popupAsset" class="btn btn-sm btn-primary"><i class="fa fa-boxes fa-fw text-w"></i></i> Assets &#160&#160&#160</a>
                    </div>


                    @include('bureau.Assets')   --}}    
                    
                    
                    <div class="modal fade" id="addass">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('storeAddedAssets',$bureau->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h2>Add assets :</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                    </div>
                                    <div class="model-body">
                                        @if (\App\asset::all()->WhereIn('occupied',[0,2])->isEmpty())
                                            all assets are occupied and out of stock..!
                                        @else
                                            @foreach (\app\asset::all()->whereIn('occupied',[0,2]) as $assetuno)
                                                {{-- <input type="checkbox" name="assetsun[]" value={{$assetuno->id}}>{{$assetuno->name}}  --}}
                                                <div class="input-group mb-3" >
                                                    <div class="input-group-prepend"style="margin-left: 10%">
                                                      <div class="input-group-text">
                                                        <input type="checkbox" aria-label="Checkbox for following label" name="assetsun[]" value={{$assetuno->id}}>
                                                      </div>
                                                    </div>
                                                    <label for="assetsun" class="form-control" aria-label="Label with checkbox">{{$assetuno->name}}</label>
                                                    <label for="assetsun" class="form-control" aria-label="Text input with checkbox">{{$assetuno->category}}</label>
                                                    <label for="assetsun" class="form-control" aria-label="Text input with checkbox" style="margin-right: 10%">@if ($assetuno->occupied==0)
                                                                                                                                                                    Unoccupied
                                                                                                                                                                @else
                                                                                                                                                                    In Stock
                                                                                                                                                                @endif</label>

                                                  </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <br>
                                    <div class="model-footer">
                                         @if (!(\App\asset::WhereIn('occupied',[0,2])->get()->isEmpty()))<button class="btn btn-info" type="submit" >Save</button>@endif
                                        <button class="btn btn-primary" data-dismiss="modal">cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
<img src="erreur.png" alt="..." style="width: 100%;height: 100%;">   
@endsection
