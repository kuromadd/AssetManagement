@extends('app.layout')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Reparations</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{route('createReparation',['id'=>0])}}" class="btn btn-sm btn-primary">Add reparation</a>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Prix</th>
                                <th scope="col">date de la reparation</th>
                                <th scope="col">Asset</th>
                                
                                <th scope="col"></th>
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
                                    <a class="dropdown-item" href="{{ route('editReparation',$reparation->id) }}">Edit</a>
                                    <a class="dropdown-item" href="{{ route('deleteReparation',$reparation->id) }}">delete</a>

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