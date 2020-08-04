@extends('app.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow" style="width: 70%;margin-left:14% ">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Bureaus</h3>
                        </div>
                        @can('bureau-create')
                        <div class="col-4 text-right">
                        <a href="#popupbrc" class="btn btn-sm btn-primary">Add Bureau</a>
                        </div>
                        @endcan
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="width: 30%">Name</th>
                                <th scope="col" style="width: 30%">Type</th>
                                <th scope="col" style="width: 30%">Block</th>
                                <th scope="col" style="width: 30%">Etage</th>
                                
                                <th scope="col" style="width: 10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bureaus as $bureau)
                        <tr>
                            <td>{{$bureau->name}}</td>
                            <td>{{$bureau->type}}</td>
                            <td>{{\App\block::find($bureau->block_id)->name}}</td>
                            <td>{{$bureau->etage}}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('showBureau',$bureau->id) }}"><i class="fa fa-info fa-fw"></i></i> Show</a>
                                        @can('bureau-edit')<a class="dropdown-item" href="{{ route('editBureau',$bureau->id) }}"><i class="fa fa-edit fa-fw"></i></i> Edit</a>@endcan
                                        @can('bureau-delete')<a class="dropdown-item" @if (\App\asset::where('bureau_id',$bureau->id)->get()->isEmpty())
                                            href="{{ route('deleteBureau',$bureau->id) }}"
                                        @else
                                            href="#" data-toggle="modal" data-target="#mal"
                                        @endif ><i class="fa fa-trash fa-fw"></i> Delete</a>@endcan
                                    </div>
                                </div>
                               

                            </td> 
                        </tr>


                        
                        <div class="modal fade" id="mal">
                                    <div class="modal-dialog ">
                                        <div class="modal-content" >
                                            <form action="{{ route('changeDelete',$bureau->id) }}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-header"style="margin-left: 5%;margin-right: 5%">
                                                    <h2 >Change office/bureau :</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                </div>
                                                <div class="model-body" style="margin-left: 5%;margin-right: 5%">
                                                    @if (\App\asset::all()->WhereNotIn('bureau_id',[$bureau->id])->isEmpty())
                                                        <p style="margin-left: 5%;margin-right: 5%">You cant delete this Office/Bureau, no offices to transfert the Assets inside..! </p>
                                                    @else
                                                        <p style="margin-left: 5%;margin-right: 5%">This Office/Bureau contain some assets, in order to delete it you have to pick where to store those assets..! </p>
                                                        @foreach (\app\bureau::whereNotIn('id',[$bureau->id])->get() as $bur)
                                                            <div class="input-group mb-3" >
                                                                <div class="input-group-prepend"style="margin-left: 5%">
                                                                  <div class="input-group-text">
                                                                    <input type="radio" aria-label="Checkbox for following label" name="bur" value={{$bur->id}}>
                                                                  </div>
                                                                </div>
                                                                <label for="bur" class="form-control">{{$bur->name}}</label>
                                                                <label for="bur" class="form-control" >{{$bur->type}}</label>
                                                                <label for="bur" class="form-control" style="margin-right: 5%">{{$bur->block->name}}</label>
            
                                                              </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <div class="model-footer text-center">
                                                     @if (!(\App\asset::WhereNotIn('bureau_id',[$bureau->id])->get()->isEmpty()))<button class="btn btn-info" type="submit" >Save</button>@endif
                                                    <button class="btn btn-primary" data-dismiss="modal">cancel</button>
                                                    <br> <br>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                        @endforeach    
                        </tbody>
                    </table>
                </div>

                

                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {!! $bureaus->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@include('bureau.create')
@endsection    