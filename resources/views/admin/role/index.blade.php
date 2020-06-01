@extends('app.layout')
@section('content')
<form action="{{ route('updateAll') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Roles</h3>
                        </div>
                        <div class="col-4 text-right">   
                        <button type="submit" class="btn btn-sm btn-primary">save</button>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr style="width: ">
                                <th scope="col">permissions</th>
                                @foreach ($roles as $item)
                                <th  scope="col">{{$item->name}}&#160<a href="{{ route('deleteRole',$item->id) }}"><i class="fa fa-trash fa-fw"></i></a></th>
                                @endforeach
                                <th><a href="#popuprc" class="fa fa-plus fa-lg"></a></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(Spatie\Permission\Models\Permission::all() as $permission)
                        <tr style="width: 100%">
                            <td style="margin: 10% ; width: 15%;">{{$permission->name}}</td>
                            @foreach ($roles as $role)   
                        <td style=" width: 15%;" class="">&#160&#160<input type="checkbox" name="{{$role->name}}[]" @if($role->hasPermissionTo($permission->name)) checked @endif value="{{$permission->id}}" id=""></td>
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
</form>    
    @include('admin.role.create')
 @endsection