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
                            @can('transfert-create')<a href="{{route('createTransfert',['id'=>0])}}" class="btn btn-sm btn-primary">Add Transfert</a>@endcan
                        </div>
                    </div>
                </div>
                
 
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                
                                <th scope="col">Asset</th>
                                <th scope="col">P-block</th>
                                <th scope="col">P-etage</th>
                                <th scope="col">P-bureau</th>
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
                            <td @if (\App\block::onlyTrashed()->find($transfert->block_c)) data-toggle="tooltip" data-placement="top" title="Block deleted" style="color:red"@endif>{{\App\block::withTrashed()->find($transfert->block_c)->name}}</td>
                            <td>{{$transfert->etage_c}}</td>
                            <td @if (\App\bureau::onlyTrashed()->find($transfert->bureau_c)) data-toggle="tooltip" data-placement="top" title="Bureau deleted" style="color:red"@endif >{{\App\bureau::withTrashed()->find($transfert->bureau_c)->name}}</td>
                            <td>{{$transfert->transfered_at}}</td>
                            <td @if (\App\block::onlyTrashed()->find($transfert->block_d)) data-toggle="tooltip" data-placement="top" title="Block deleted" style="color:red"@endif>{{\App\block::withTrashed()->find($transfert->block_d)->name}}</td>
                            <td>{{$transfert->etage_d}}</td>
                            <td @if (\App\bureau::onlyTrashed()->find($transfert->bureau_d)) data-toggle="tooltip" data-placement="top" title="Bureau deleted" style="color:red"@endif>{{\App\bureau::withTrashed()->find($transfert->bureau_d)->name}}</td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('createTransfert',$transfert->asset_id) }}">transfer</a>
                                        @can('transfert-delete')<a class="dropdown-item" href="{{ route('deleteTransfert',$transfert->id) }}">delete</a>@endcan
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