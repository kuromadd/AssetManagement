@extends('layouts.app')

@section('content')

<table style="width: 100%;border: grey" class="table table-hover">
   <thead>
   <th style="width: 15%;border: grey">image</th>
   <th style="width: 25%;border: grey">name</th>
   <th style="width: 25%;border: grey">permissions</th>
   <th style="width: 15%;border: none"></th>
   </thead> 
   <tbody>
   @if($users->count()>0)
            
        @foreach($users as $user)
            <tr >
                <td>
                <img src="{{ asset($user->profile->avatar) }}" alt="no image" width="60px" height="60px" style="border-radius: 50%"> 
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    @if($user->admin)
                <a href="{{ route('notadmin',['id'=>$user->id]) }}" class="text text-info">admin</a>
                    @else
                <a href="{{ route('admin',['id'=>$user->id]) }}" class="text text-info">not admin</a>

                    @endif
                </td>
                <td>
                    <a class="text text-danger" href="">&#160 trash</a>
                </td>
            </tr>
        @endforeach
    @else
    <label style="margin: 20%;color: grey;font-family: cursive;font-size: 20px">No users</label>
    @endif
</tbody>
</table>    
</div>


@endsection