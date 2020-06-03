@extends('app.layout')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Transfert</h3>
                        </div>
                        <div class="col-4 text-right">
                            @can('transfert-create')<a href="{{route('transfert.create',['id'=>0])}}" class="btn btn-sm btn-primary">Add Transfert</a>@endcan
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                
                                <th scope="col">Asset</th>
                                <th scope="col">previous block</th>
                                <th scope="col">previous etage</th>
                                <th scope="col">previous bureau</th>
                                <th scope="col">transfered at</th>
                                <th scope="col">next block</th>
                                <th scope="col">next etage</th>
                                <th scope="col">next bureau</th>


                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($transferts as $transfert)
                        <tr>
                            <td>{{\App\Asset::find($transfert->asset_id)->name}}</td>
                            <td>{{$transfert->block_c}}</td>
                            <td>{{$transfert->etage_c}}</td>
                            <td>{{$transfert->bureau_c}}</td>
                            <td>{{$transfert->transfered_at}}</td>
                            <td>{{$transfert->block_d}}</td>
                            <td>{{$transfert->etage_d}}</td>
                            <td>{{$transfert->bureau_d}}</td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        @can('transfert-edit')<a class="dropdown-item" href="{{ route('transfert.edit',$transfert->id) }}">Edit</a>@endcan
                                        @can('transfert-delete')<a class="dropdown-item" href="{{ route('transfert.destroy',$transfert->id) }}">delete</a>@endcan
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
                        {!! $transferts->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection    