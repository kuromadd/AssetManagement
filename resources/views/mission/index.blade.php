@extends('app.layout')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Missions</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{route('missions.create',['id'=>0])}}" class="btn btn-sm btn-primary">Add Mission</a>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">But de la mission</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Date de la mission</th>
                                <th scope="col">Asset</th>
                                
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($missions as $mission)
                        <tr>
                            <td>{{$mission->but_mission}}</td>
                            <td>{{$mission->destination}}</td>
                            <td>{{$mission->mission_at}}</td>
                            <td>{{\App\Asset::find($mission->asset_id)->name}}</td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" style="width: 50px" href="{{ route('missions.show',$mission->id) }}"><i class="fa fa-info fa-fw"></i> show</a>
                                    <a class="dropdown-item" href="{{ route('missions.edit',$mission->id) }}"><i class="fa fa-edit fa-fw"></i> edit</a>
                                    <a class="dropdown-item" href="{{ route('missions.destroy',$mission->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>

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

@endsection    