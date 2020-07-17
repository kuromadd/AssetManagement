@extends('app.layout')
@section('content')
@if (\App\Mission::all()->isEmpty())
<div class="card card-default">
    <div class="card-header" style="background-color: #ecf4fd">  
        <div class="text-center">
            <div class="h1 mt-4">
                <div class="text-center">
                    Missions :
                </div>
            </div>
        </div>
    </div>
        
    <div class="card-body">     
        <div class="text-center">
            <h2>
                <br><br><br>
                No mission have been recorded !<br><br>
                @can('mission-create')<a href="{{route('createMission',['id'=>0])}}" class="btn btn-sm btn-primary">Add Mission</a>@endcan
                <br><br><br>
            </h2>
        </div>
    </div>
</div>
    @else

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Missions</h3>
                        </div>
                        <div class="col-4 text-right">
                            @can('mission-create')<a href="{{route('createMission',['id'=>0])}}" class="btn btn-sm btn-primary">Add Mission</a>@endcan
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Asset</th>
                                <th scope="col">But de la mission</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Date de la mission</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($missions as $mission)
                        <tr>
                            <td>{{\App\Asset::find($mission->asset_id)->name}}</td>
                            <td>{{$mission->but_mission}}</td>
                            <td>{{$mission->destination}}</td>
                            <td>{{$mission->mission_at}}</td>
                            @if ($mission->etat == 0)
                        <td><a href="{{route('completeMission',$mission->id)}}" class="text-info">incomplite</a></td>
                            @else
                            <td><label class="text-success">complited</label></td>    
                            @endif
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('showMission',$mission->id) }}"><i class="fa fa-info fa-fw"></i> show</a>
                                            @can('mission-edit')<a class="dropdown-item" href="{{ route('editMission',$mission->id) }}"><i class="fa fa-edit fa-fw"></i> edit</a>@endcan
                                            @can('mission-delete')<a class="dropdown-item" href="{{ route('deleteMission',$mission->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>@endcan

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
                        {!! $missions->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection    