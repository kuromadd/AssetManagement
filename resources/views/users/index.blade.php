@extends('app.layout')
@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0" style="background-color: #ecf4fd">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-4 text-right">
                            @can('User-create')<a href="#popupuc" class="btn btn-sm btn-primary">Add user</a>@endcan
                        </div>
                    </div>
                </div>
                

<style>
    .our-team {
  padding: 30px 0 40px;
  margin-bottom: 30px;
  background-color: #f7f5ec;
  text-align: center;
  overflow: hidden;
  position: relative;
}

.our-team .picture {
  display: inline-block;
  height: 130px;
  width: 130px;
  margin-bottom: 50px;
  z-index: 1;
  /*position: relative;*/
}

.our-team .picture::before {
  content: "";
  width: 100%;
  height: 0;
  border-radius: 50%;
  background-color: #1369ce;
  position: absolute;
  bottom: 135%;
  right: 0;
  left: 0;
  opacity: 0.9;
  transform: scale(3);
  transition: all 0.3s linear 0s;
}

.our-team:hover .picture::before {
  height: 100%;
}

.our-team .picture::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #1369ce;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
}

.our-team .picture img {
  width: 100%;
  height: auto;
  border-radius: 50%;
  transform: scale(1);
  transition: all 0.9s ease 0s;
}

.our-team:hover .picture img {
  box-shadow: 0 0 0 14px #f7f5ec;
  transform: scale(0.7);
}

.our-team .title {
  display: block;
  font-size: 15px;
  color: #4e5052;
  text-transform: capitalize;
}

.our-team .social {
  width: 100%;
  padding: 0;
  margin: 0;
  background-color: #1369ce;
  position: absolute;
  bottom: -100px;
  left: 0;
  transition: all 0.5s ease 0s;
}

.our-team:hover .social {
  bottom: 0;
}

.our-team .social li {
  display: inline-block;
}

.our-team .social li a {
  display: block;
  padding: 10px;
  font-size: 17px;
  color: white;
  transition: all 0.3s ease 0s;
  text-decoration: none;
}

.our-team .social li a:hover {
  color: #1369ce;
  background-color: #f7f5ec;
}

</style>

                        <div class="row">
                        @foreach($users as $user)
                        
                        
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                              <div class="our-team">
                                <div class="picture">
                                <img class="img-fluid" src="{{ asset($user->profile->image) }}">
                                </div>
                                <div class="team-content">
                                  <h3 class="name">{{$user->name}}</h3>
                                  @foreach($user->getRoleNames() as $v)
                                  <label class=" badge badge-success">{{ $v }}</label>
                                  <h4 class="email"><a href="mailto:{{$user->email}}">{{$user->email}}</a></h4>
                            @endforeach
                                  
                                </div>
                                <ul class="social">
                                  <li></li>
                                                   <li><a class="dropdown-item" href="{{ route('showUser',$user->id) }}" aria-hidden="true"><i class="fa fa-info fa-fw"></i></a></li>
                                  @can('User-edit')<li><a class="dropdown-item" href="{{ route('editUser',$user->id) }}" aria-hidden="true"><i class="fa fa-edit fa-fw"></i></a></li>@endcan
                                  @can('User-delete')<li><a class="dropdown-item" href="{{ route('deleteUser',$user->id) }}" aria-hidden="true"><i class="fa fa-trash fa-fw"></i></a></li>@endcan
                                </ul>
                              </div>
                            </div>
                        


                                               
                        @endforeach 
                    </div> 
            </div>
        </div>
    </div>
    @include('admin.user.create')    
     
</div>
</div>

    
@endsection