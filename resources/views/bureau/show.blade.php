@extends('app.layout')
@section('content')
<div class="row">
<div class="col">     
    <div class="card shadow" style="width:80%;margin-left:10%;padding:3%">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active h3" id="burinf-tab" data-toggle="tab" href="#burinf" role="tab" aria-controls="burinf" aria-selected="true">Bureau informations</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link h3" id="burass-tab" data-toggle="tab" href="#burass" role="tab" aria-controls="burass" aria-selected="false">Assets</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="burinf" role="tabpanel" aria-labelledby="burinf-tab">
                <div class=" mt-4">
                    Name : {{$bureau->name}} .
                </div>
                <hr class="my-4" />
                <div class=" mt-4">
                    Type : {{$bureau->type}} .
                </div>
                <hr class="my-4" />
                <div class=" mt-4">
                    Block : @foreach(\App\block::all() as $block)
                                @if ($block->id == $bureau->block_id)
                                    <a href="{{ route('showBlock',$block->id) }}">{{$block->name}}</a>
                                @endif
                            @endforeach .
                </div>
                <hr class="my-4"/>
                <div class=" mt-4">
                    Floor number : {{$bureau->etage}} .
                </div>
            </div>
            <div class="tab-pane fade" id="burass" role="tabpanel" aria-labelledby="burass-tab">
                @if (\App\Asset::all()->where('bureau_id', $bureau->id)->isEmpty())
                    <br><p>There are no assets in this chamber/office...!</p>
                    <p><a href="#" data-toggle="modal" data-target="#addass">Add assets</a></p>

                @else
                    <div class="table-responsive">
                        <br>
                            <p><a href="#" data-toggle="modal" data-target="#addass">Add assets</a></p>
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
                                        </div></td>
                                    </tr>
                                @endforeach    
                            </tbody>
                        </table>
                        <br>
                        <div class="d-flex justify-content-center">
                            {!! $assets->render() !!} 
                        </div>
        
                    </div>  
                @endif
                <br>
        
            </div>
        </div>     

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
                        <div class="model-footer text-center">
                            @if (!(\App\asset::WhereIn('occupied',[0,2])->get()->isEmpty()))<button class="btn btn-info" type="submit" >Save</button>@endif
                                <button class="btn btn-primary" data-dismiss="modal">cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
