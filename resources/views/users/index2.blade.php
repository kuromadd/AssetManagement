<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>
<body class="clickup-chrome-ext_installed">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
        <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
<div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="{{ route('home') }}">
        <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ $user->profile->image }}">
                    </span>
                </div>                    
               
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>My profile</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Settings</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span>Activity</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
            <div class="row">
                <div class="col-6 collapse-brand">
                    <a  href="{{ route('home') }}">
                        <img src="{{ asset('argon') }}/img/brand/blue.png">
                    </a>
                </div>
                <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
            <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fa fa-search"></span>
                    </div>
                </div>
            </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="ni ni-tv-2 text-primary"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('scan') }}">
                    <i class="fa fa-qrcode text-primary"></i>
                    <span class="nav-link-text text-red">Scan !!</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                    <i class="fa fa-user-edit text-blue"></i>
                    <span class="nav-link-text text-red">Users</span>
                </a>
  
                <div class="collapse show" id="navbar-examples">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <i class="fa fa-user text-blue"></i>
                                <span class="text text-red"> My profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexUser') }}">
                                <i class="fa fa-users text-blue"></i> 
                                <span class="text text-red"> Users Management </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
  
            <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                    <i class="fab fa-linode text-blue"></i>
                    <span class="nav-link-text text-red">blocks</span>
                </a>
  
                <div class="collapse show" id="navbar-examples2">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexBlock') }}">
                                <i class="fa fa-building text-blue"></i> 
                                <span class="text text-red"> Blocks </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexBureau') }}">
                               <i class="fa fa-object-group text-blue"></i>
                               <span class="text text-red"> Bureaus </span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
  
            <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                    <i class="fab fa-gg-circle text-blue"></i>
                    <span class="nav-link-text text-red">Asset Management</span>
                </a>
  
                <div class="collapse show" id="navbar-examples3">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexAsset') }}">
                                <i class="fa fa-list-alt text-blue"></i> 
                                <span class="text text-red"> Assets list </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('replaceList') }}">
                                <i class="fab fa-lastfm text-blue"></i> 
                                <span class="text text-red"> Lost Assets </span>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('repairList') }}">
                            <i class="fa fa-unlink text-blue"></i>   
                            <span class="text text-red"> Damaged Assets </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('indexInventaire') }}">
                    <i class="fa fa-filter text-blue"></i> 
                    <span class="text text-red"> Inventaire </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                    <i class="fab fa-linode text-blue"></i>
                    <span class="nav-link-text text-red">Permissions</span>
                </a>
    
                <div class="collapse show" id="navbar-examples2">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexPM') }}">
                                <i class="ni ni-planet text-blue"></i> 
                                <span class="text text-red"> User permissions </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexRole') }}">
                                <i class="ni ni-planet text-blue"></i> 
                                <span class="text text-red"> Role permissions </span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('indexReparation')}}">
                    <i class="ni ni-settings-gear-65 text-blue"></i> 
                    <span class="text text-red"> Reparation </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('indexMission')}}">
                   <i class="fa fa-tasks text-blue"></i>
                    <span class="text text-red"> Missions </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('indexFournisseur')}}">
                    <i class="fab fa-ravelry text-blue"></i> 
                    <span class="text text-red"> Fournisseurs </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('indexTransfert')}}">
                    <i class="fa fa-search-minus text-blue"></i>
                    <span class="text text-red"> Asset trace </span>
                </a>
            </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">

        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Documentation</h6>
        <!-- Navigation -->
        
    </div>
</div>
</nav>                
    <div class="main-content">
        <!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
<div class="container-fluid">
    <!-- Brand -->
    
    <!-- Form 
    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
            </div>
        </div>
    </form>
     User -->
    <ul  class="navbar-nav align-items-center mr-3 d-none d-md-flex ml-lg-auto">
        <li  class="nav-item dropdown">
            <a  class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset($user->profile->image) }}">
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ $user->name }}</span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>My profile</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Settings</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span>Activity</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
</div>
</nav>    
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
<div class="container-fluid">
    <br><br><br>
    <div class="header-body">
        <!-- Card stats -->
        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                                <span class="h2 font-weight-bold mb-0">350,897</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                <span class="h2 font-weight-bold mb-0">2,356</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                            <span class="text-nowrap">Since last week</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                <span class="h2 font-weight-bold mb-0">924</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                            <span class="text-nowrap">Since yesterday</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                <span class="h2 font-weight-bold mb-0">49,65%</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-percent"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-4 text-right">
                            @can('User-create')<a href="#popupuc" class="btn btn-sm btn-primary">Add user</a>@endcan
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">&#160&#160Name</th>
                                <th scope="col">&#160&#160Email</th>
                                <th scope="col">&#160&#160Creation Date</th>
                                <th scope="col">&#160Role</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                               <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            </td>                      
                            @else
                            <td>none</td>
                            @endif
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                
                                        @can('User-edit')<a class="dropdown-item" href="{{ route('editUser',$user->id) }}"><i class="fa fa-edit fa-fw"></i></i> edit</a>@endcan
                                        @can('User-delete')<a class="dropdown-item" href="{{ route('deleteUser',$user->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>@endcan
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
                        {!! $users->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('admin.user.create')    
     
</div>
</div>

    
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
            
    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
</body></html>
