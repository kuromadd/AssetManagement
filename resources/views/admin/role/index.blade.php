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
                            <tr style="width: ">
                                <th scope="col">permissions</th>
                                @foreach ($roles as $item)
                                <th  scope="col">{{$item->name}}</th>
                                @endforeach
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(Spatie\Permission\Models\Permission::all() as $permission)
                        <tr style="width: 100%">
                            <td style="margin: 10% ; width: 15%;">{{$permission->name}}</td>
                            @foreach ($roles as $role)   
                                <td style="margin: 10% ; width: 15%;" class=""><input type="checkbox" name="" @if($role->hasPermissionTo($permission->name)) checked disabled @endif value="{{$permission->id}}" id=""></td>
                            @endforeach     
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