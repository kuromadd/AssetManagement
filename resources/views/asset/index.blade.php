@extends('app.layout')
@section('content')
@if (\App\asset::all()->isEmpty())
<div class="card card-default">
    <div class="card-header">  
        <div class="text-center">
            <div class="h1 mt-4">
                <div class="text-center">
                    Assets :
                </div>
            </div>
        </div>
    </div>
        
    <div class="card-body">     
        <div class="text-center">
            <h2>
                <br><br><br>
                No assets have been registered !<br><br>
                @can('asset-create')<a href="{{route('createAsset',['id'=>0])}}" class="btn btn-sm btn-primary">Add Asset</a>@endcan
                <br><br><br>
            </h2>
        </div>
    </div>
</div>
    @else

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0" style="background-image:{{ asset('argon') }}/img/brand/vector.png">
                    <div class="row align-items-center" >
                        <div class="col-8">
                            <h3 class="mb-0">Assets :</h3>
                        </div>
                        <div class="col-4 text-right">
                            @can('asset-create')
                            <a href="{{route('createAsset',Str::random(15))}}" class="btn btn-sm btn-primary">Add asset</a>
                            @endcan
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush minha-table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="width: 22%">Name</th>
                                <th scope="col" style="width: 22%">Category</th>
                                <th scope="col" style="width: 22%">Acquisition Date</th>
                                <th scope="col" style="width: 22%"></th>
                                <th scope="col" style="width: 12%"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($assets as $asset)
                        <tr>
                            <td>{{$asset->name}}</td>
                            <td>{{$asset->category}}</td>
                            <td>{{$asset->dateService}}</td>
                            <td>
                                @if ($asset->occupied==0)
                                    <label class="badge badge-info">unoccupied</label>
                                    @else
                                    @if ($asset->occupied==1)
                                        @if ($asset->status == 1)
                                            <label class="badge badge-success">Occupied / Fine</label>
                                        @elseif($asset->status == 2) 
                                            <label class="badge badge-warning">Damaged</label>
                                        @elseif($asset->status == 3)
                                            <label class="badge badge-danger">Lost</label>
                                        @endif
                                    @else
                                    @if ($asset->status == 1)
                                            <label class="badge badge-info">In Stock</label>
                                        @elseif($asset->status == 2) 
                                            <label class="badge badge-warning">Damaged</label>
                                        @elseif($asset->status == 3)
                                            <label class="badge badge-danger">Lost</label>
                                        @endif
                                    @endif   
                                @endif
                            </td>
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
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                       {!! $assets->render() !!} 
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @endif
    
   <script>
        var $table = document.querySelector('.minha-table');

        $table.addEventListener("click", function(ev){
        if (ev.target.tagName == "INPUT") {
            if (ev.target.checked) {
            ev.target.parentNode.parentNode.classList.add("selected");
            }else {
            ev.target.parentNode.parentNode.classList.remove("selected");
            }
        }
        });
</script>     
@endsection