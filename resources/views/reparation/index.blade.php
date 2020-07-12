@extends('app.layout')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card shadow" style="width: 80%;margin-left: 9%">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Reparations</h3>
                        </div>
                        <div class="col-4 text-right">
                            @can('reparation-create')<a href="{{route('createReparation',['id'=>0])}}" class="btn btn-sm btn-primary">Add reparation</a>@endcan
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"style="width: 28%">&#160Prix</th>
                                <th scope="col"style="width: 33%">date de la reparation</th>
                                <th scope="col"style="width: 25%">Asset</th>
                                
                                <th scope="col"style="width: 14%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($reparations as $reparation)
                        <tr>
                            <td>{{$reparation->prix}}</td>
                            <td>{{$reparation->repaired_at}}</td>
                            <td>{{\App\Asset::find($reparation->asset_id)->name}}</td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        @can('reparation-delete')<a class="dropdown-item" href="{{ route('showReparation',$reparation->id) }}"><i class="fa fa-info fa-fw"></i> show</a>@endcan
                                        @can('reparation-edit')<a class="dropdown-item" href="{{ route('editReparation',$reparation->id) }}"><i class="fa fa-edit fa-fw"></i></i> edit</a>@endcan
                                        @can('reparation-delete')<a class="dropdown-item" href="{{ route('deleteReparation',$reparation->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>@endcan

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
                        {!! $reparations->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection    