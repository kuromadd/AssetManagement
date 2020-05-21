@extends('app.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Roles</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="#popuprc" class="btn btn-sm btn-primary">Add role</a>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                @foreach ($role as $item)
                                <th scope="col">{{$role->name}}</th>
                                @endforeach
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(Spatie\Permission\Models\Permission::all() as $pemission)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->created_at}}</td>
                            <td>
                                <select class="ui dropdown">
                                <option value="">role</option>
                                @foreach ($role->permissions as $item)
                                @if(substr( $item->name, 0, 4 ) === "role")
                                <option value="{{$item->id}}" disabled>{{ $item->name }}</option>
                                @endif    
                                @endforeach
                                </select>
                                <select class="ui dropdown">
                                <option value="">asset</option>
                                @foreach ($role->permissions as $item)
                                @if(substr( $item->name, 0, 5 ) === "asset")
                                <option value="{{$item->id}}" disabled>{{ $item->name }}</option>
                                @endif    
                                @endforeach
                                </select> 
                                <select class="ui dropdown">
                                <option value="">block</option>
                                @foreach ($role->permissions as $item)
                                @if(substr( $item->name, 0, 5 ) === "block")
                                <option value="{{$item->id}}" disabled>{{ $item->name }}</option>
                                @endif    
                                @endforeach
                                </select>    
                            </td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{route('editRole',$role->id)}}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('deleteRole',$role->id) }}">delete</a>

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
    @include('admin.role.create')
 @endsection