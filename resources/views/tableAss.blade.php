    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
<div class="table-responsive">
    @php
        $assets = \App\Asset::where('bureau_id', 1)->paginate(5);
    @endphp
    <table class="table align-items-center table-flush table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">Asset</th>
                {{-- <th scope="col">Description</th> --}}
                <th scope="col">Category</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
                <tr>
                    <td>{{$asset->name}}</td>
                    {{-- <td>{{$asset->description}}</td> --}}
                    <td>{{$asset->category}}</td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{route('showAsset',$asset->id)}}"><i class="fa fa-info fa-fw"></i></i> show</a>
                                @can('asset-edit')<a class="dropdown-item" href="{{route('editAsset',$asset->id)}}"><i class="fa fa-edit fa-fw"></i></i> edit</a>@endcan
                                @can('asset-delete')<a class="dropdown-item" href="{{ route('deleteAsset',$asset->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>@endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

    

</div>
<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        
<!-- Argon JS -->
<script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>