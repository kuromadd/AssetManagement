@extends('app.layout')
@section('content')

<div class="row">
    <div class="col">     
        <div class="card shadow" style="width:80%;margin-left:10%;padding:3%">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="serinf-tab" data-toggle="tab" href="#serinf" role="tab" aria-controls="serinf" aria-selected="true">Service informations</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="serbur-tab" data-toggle="tab" href="#serbur" role="tab" aria-controls="serbur" aria-selected="false">Bureaus</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="serass-tab" data-toggle="tab" href="#serass" role="tab" aria-controls="serass" aria-selected="false">Assets</a>
                </li>
            </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="serinf" role="tabpanel" aria-labelledby="serinf-tab">
                    <div class="h3 mt-4">
                        Code service : {{$service->code_ser}} .
                    </div>
                    <hr class="my-4" width="75%"/>
                    <div class="h3 mt-4">
                        Libel : {{ $service->libel }} .
                    </div>
                    <hr class="my-4" />
                    <div class="h3 mt-4">
                            Departement : @foreach(\App\Departement::all() as $departement)
                                          @if ($departement->id == $service->departement_id)
                                                {{$departement->libel}}
                                            @endif
                                        @endforeach .
                    </div>
                </div>
                <div class="tab-pane fade" id="serbur" role="tabpanel" aria-labelledby="serbur-tab">
                    @if (\App\Bureau::all()->where('service_id', $service->id)->isEmpty())
                            <br><p>This Service has no offices/chambers ..!</p>
                            <p><a href="#" data-toggle="modal" data-target="#addbur">Add bureau</a></p>

                        @else
                            <div class="table-responsive">
                                <br>
                                    <p><a href="#" data-toggle="modal" data-target="#addbur">Add bureau</a></p>
                                @php
                                    $bureaus = \App\bureau::where('service_id', $service->id)->paginate(5);
                                @endphp
                                <table class="table align-items-center table-flush table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">name</th>
                                            {{-- <th scope="col">Description</th> --}}
                                            <th scope="col">type</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bureaus as $bureau)
                                            <tr>
                                                <td>{{$bureau->name}}</td>
                                                <td>{{$bureau->type}}</td>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="{{route('showBureau',$bureau->id)}}"><i class="fa fa-info fa-fw"></i></i> show</a>
                                                            <a class="dropdown-item" href="{{ route('changeSerBur',$bureau->id) }}"><i class="fa fa-trash fa-fw"></i> delete from this service</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                                <br>
                                <div class="d-flex justify-content-center">
                                    {!! $bureaus->links() !!}
                                </div>

                            </div>  
                        @endif
                </div>
                <div class="tab-pane fade" id="serass" role="tabpanel" aria-labelledby="serass-tab">
                    @if (\App\Bureau::all()->where('service_id', $service->id)->isEmpty())
                            <br><p>This Service has no assets..!</p>
                        @else
                            <div class="table-responsive">
                                <br>
                                @php
                                    $assets = \App\asset::whereIn('bureau_id',\App\bureau::select('id')->where('service_id', $service->id))->paginate(5);
                                @endphp
                                <table class="table align-items-center table-flush table-striped">
                                    <thead class="thuead-light">
                                        <tr>
                                            <th scope="col">name</th>
                                            {{-- <th scope="col">Description</th> --}}
                                            <th scope="col">category</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($assets as $asset)
                                            <tr>
                                                <td>{{$asset->name}}</td>
                                                <td>{{$asset->category}}</td>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="{{route('showAsset',$asset->id)}}"><i class="fa fa-info fa-fw"></i></i> show</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                                <br>
                                <div class="d-flex justify-content-center">
                                    {!! $assets->links() !!}
                                </div>

                            </div>  
                        @endif
                </div>

            <div class="modal fade" id="addbur">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('storeAddedBureaus',$service->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h2>Add bureaus :</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                            <div class="model-body">
                                    @foreach (\app\bureau::all()->whereIn('service_id',[null,""]) as $buruno)
                                        <div class="input-group mb-3" >
                                            <div class="input-group-prepend"style="margin-left: 10%">
                                              <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following label" name="buruno[]" value={{$buruno->id}}>
                                              </div>
                                            </div>
                                            <label for="buruno" class="form-control" aria-label="Label with checkbox">{{$buruno->name}}</label>
                                            <label for="buruno" class="form-control" aria-label="Text input with checkbox" style="margin-right: 10%">{{$buruno->type}}</label>
                                            {{-- <label for="assetsun" class="form-control" aria-label="Text input with checkbox" style="margin-right: 10%"></label> --}}

                                          </div>
                                    @endforeach
                            </div>
                            <br>
                            <div class="model-footer">
                                 <button class="btn btn-info" type="submit" >Save</button>
                                <button class="btn btn-primary" data-dismiss="modal">cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection    