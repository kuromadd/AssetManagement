<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
 

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">

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
    <a href="{{ route('home') }}">
        <img src="{{ asset('argon') }}/img/brand/blue.png" style="width:190px ;height:190px;" alt="...">
    </a>
    <!-- User -->

    <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ auth()->user()->profile->image }}">
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
                    <i class="ni ni-tv-2 text-red"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('scan') }}">
                    <i class="fa fa-qrcode text-primary"></i>
                <span class="nav-link-text text-red">Scan !!</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="#navbar-hier" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-hier">
                    <i class="fab fa-linode text-blue"></i>
                    <span class="nav-link-text text-red">Hierarchy management</span>
                </a>
  
                <div class="collapse " id="navbar-hier">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexDivision') }}">
                                <i class="fa fa-building text-blue"></i> 
                                <span class="text text-red"> Divisions </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexDepartement') }}">
                               <i class="fa fa-object-group text-blue"></i>
                               <span class="text text-red"> Departments </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexService') }}">
                               <i class="fa fa-object-group text-blue"></i>
                               <span class="text text-red"> Services </span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li> 
  
            <li class="nav-item">
                <a class="nav-link active" href="#navbar-infra" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-infra">
                    <i class="fab fa-linode text-blue"></i>
                    <span class="nav-link-text text-red">Infrastructure management</span>
                </a>
  
                <div class="collapse" id="navbar-infra">
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
                <a class="nav-link active" href="#navbar-examples3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                    <i class="fab fa-gg-circle text-blue"></i>
                    <span class="nav-link-text text-red">Asset Management</span>
                </a>
  
                <div class="collapse " id="navbar-examples3">
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
                <a class="nav-link active" href="#navbar-moni" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-moni">
                    <i class="fab fa-linode text-blue"></i>
                    <span class="nav-link-text text-red">Asset Monitoring</span>
                </a>
  
                <div class="collapse" id="navbar-moni">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexReparation') }}">
                                <i class="ni ni-settings-gear-65 text-blue"></i> 
                                <span class="text text-red"> Reparation </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexMission') }}">
                               <i class="fa fa-tasks text-blue"></i>
                               <span class="text text-red"> Mission </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexTransfert') }}">
                               <i class="fa fa-search-minus text-blue"></i>
                               <span class="text text-red"> Transfert </span>
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
                <a class="nav-link" href="{{route('indexFournisseur')}}">
                    <i class="fab fa-ravelry text-blue"></i> 
                    <span class="text text-red"> Fournisseurs </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-user">
                    <i class="fab fa-linode text-blue"></i>
                    <span class="nav-link-text text-red">User management</span>
                </a>
    
                <div class="collapse " id="navbar-user">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexUser') }}">
                                <i class="fa fa-users text-blue"></i> 
                                <span class="text text-red">Users account</span>
                            </a>
                        </li>
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
        </ul>
        
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
                        <img alt="Image placeholder" src="{{ asset(auth()->user()->profile->image) }}">
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->name}}</span>
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
<div class="header bg-gradient-primary pb-6 pt-5 pt-md-8">
<div class="container-fluid">

  
</div>
</div>
<div class="container-fluid mt--7">     
    
    @yield('content')
    
</div>
</div>





    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

 



    <!--css-->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <!--js-->
    <script src="{{ asset('toastr.min.js') }}"></script>    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
@if (Session::has('success'))
<script>
    toastr.success('{{ Session::get('success') }}');
</script>
@elseif (Session::has('danger'))
<script>
    console.log('danger');
toastr.error('{{ Session::get('danger') }}');
</script>              
@endif

<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
</body>
</html>
