@extends('app.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow" style="width: 70%;margin-left:14% ">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Bureaus</h3>
                        </div>
                        @can('bureau-create')
                        <div class="col-4 text-right">
                        <a href="#popupbrc" class="btn btn-sm btn-primary">Add Bureau</a>
                        </div>
                        @endcan
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="width: 30%">Name</th>
                                <th scope="col" style="width: 30%">type</th>
                                <th scope="col" style="width: 30%">Etage</th>
                                <th scope="col" style="width: 30%">block</th>
                                
                                <th scope="col" style="width: 10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bureaus as $bureau)
                        <tr>
                            <td>{{$bureau->name}}</td>
                            <td>{{$bureau->type}}</td>
                            <td>{{$bureau->etage}}</td>
                            <td>{{\App\block::find($bureau->block_id)->name}}</td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    @can('bureau-edit')<a class="dropdown-item" href="{{ route('editBureau',$bureau->id) }}"><i class="fa fa-edit fa-fw"></i></i> edit</a>@endcan
                                    @can('bureau-delete')<a class="dropdown-item" href="{{ route('deleteBureau',$bureau->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>@endcan

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
                        {!! $bureaus->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@include('bureau.create')
@endsection    