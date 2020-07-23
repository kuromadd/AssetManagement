<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
<!-- Toggler -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<!-- Brand -->
<a class="navbar-brand pt-0" style="width:60px ;height:60px" href="{{ route('home') }}">
    <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
</a>
<!-- User -->


<ul class="nav align-items-center d-md-none">
    <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ Auth()->user()->profile->image }}">
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
    </ul>
    <!-- Divider -->

            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
           
        </div>
    </div>
</nav>