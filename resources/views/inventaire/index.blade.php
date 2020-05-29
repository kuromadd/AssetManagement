@extends('app.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Inventaires</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{route('createInventaire')}}" class="btn btn-sm btn-primary">Add inventaire</a>
                        </div>
                    </div>
                </div>
                
                
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">etat</th>
                                <th scope="col">created_at</th>
            
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($inventaires as $inv)
                        <tr>
                            <td>{{$inv->name}}</td>
                            <td>{{$inv->etat}}</td>
                            <td>{{$inv->created_at}}</td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('editInventaire',$inv->id) }}"><i class="fa fa-edit fa-fw"></i></i> edit</a>
                                    <a class="dropdown-item" href="{{ route('deleteInventaire',$inv->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>

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
                       
                    </nav>
                </div>
            </div>
        </div>
    </div>
    

@endsection    