@extends('app.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Fournisseurs</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="#popupfc" class="btn btn-sm btn-primary">Add Fournisseur</a>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Libel</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($fournisseurs as $fournisseur)
                        <tr>
                            <td>{{$fournisseur->libel}}</td>
                            <td>{{$fournisseur->address}}</td>
                            <td>{{$fournisseur->tel}}</td>
                            <td>{{$fournisseur->email}}</td>
                            <td>{{$fournisseur->website}}</td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{route('fournisseurs.edit',$fournisseur->id)}}"><i class="fa fa-edit fa-fw"></i></i> edit</a>
                                    <a class="dropdown-item" href="{{ route('fournisseurs.destroy',$fournisseur->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>

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
                       {!! $fournisseurs->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('fournisseur.create')   
@endsection