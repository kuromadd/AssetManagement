@extends('app.layout')
@section('content')
<form action="{{ route('updateAllper') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">User permissions</h3>
                        </div>
                        <div class="col-4 text-right">
                        @can('user-permission-edit')       
                        <button type="submit" class="btn btn-sm btn-primary">save</button>
                        @endcan
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">permissions</th>
                                @foreach ($users as $item)
                                <th  scope="col">{{$item->name}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(Spatie\Permission\Models\Permission::all() as $permission)
                        <tr style="width: 100%">
                            <td style=" width: 15%;">{{$permission->name}}</td>
                            @foreach ($users as $user)   
                        <td style=" width: 15%" class="">&#160&#160<input type="checkbox" name="{{$user->name}}[]" @if($user->hasPermissionTo($permission->name)) checked @endif value="{{$permission->id}}" id=""></td>
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

 @endsection