@extends('app.layout')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card shadow" style="margin-left: 16% ;width: 60%" >
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Blocks</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a {{-- href="#popupbc" --}} data-toggle="modal" data-target="#addblock" class="btn btn-sm btn-primary">Add block</a>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-striped">
                        <thead class="thead-light">
                            <tr style="width: 100%">
                                <th scope="col" >Name</th>
                                <th scope="col" >Adress</th>
                                <th scope="col">Wilaya</th>
                                
                                <th scope="col" style="width: 20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($blocks as $block)
                        <tr>
                            <td>{{$block->name}}</td>
                            <td>{{$block->adress}}</td>
                            <td>{{$block->wilaya}}</td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{route('showBlock',$block->id)}}"><i class="fa fa-info fa-fw"></i></i> Show</a>
                                    <a class="dropdown-item" href="{{route('editBlock',$block->id)}}"><i class="fa fa-edit fa-fw"></i></i> Edit</a>
                                    <a class="dropdown-item" @if (\App\bureau::where('block_id',$block->id)->get()->isEmpty())
                                         href="{{ route('deleteBlock',$block->id) }}"
                                    @else
                                    data-toggle="modal" data-target="#mal"
                                    @endif><i class="fa fa-trash fa-fw"></i> Delete</a>

                                    </div>
                                    
                                  
                                </div>
                            </td>
                        </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>

                <div class="modal fade " id="mal" role="alert">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-body alert-warning text-center h5">
                                You cant delete this block, you have to delete its offices first..!
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addblock">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content " >
                            <form action="{{ route('storeBlock') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-header" style="margin-right: 5%;margin-left: 5%">
                                    <h2>Add Block :</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                                <div class="model-body" style="margin-right: 5%;margin-left: 5%">
                                    <div class="form-group">
                                        <label for="name">Name :</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="adress">Adress :</label>
                                        <input type="text" name="adress" class="form-control">
                                    </div>
                
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="wilaya">--Wilaya--</label>
                                        <input type="text" class="form-control" name="wilaya">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="daira">--Daira--</label>
                                        <input type="text" class="form-control" name="daira">
                                      </div>
                                      <div class="form-group col-md-2">
                                        <label for="zip">--Zip--</label>
                                        <input type="text" class="form-control" name="zip">
                                      </div>
                                    </div>
                
                                    <div class="form-group">
                                      <label for="sous">Number of underground floors</label>
                                      <input type="number" name="sous" class="form-control" min="0">
                                  </div>
                                    <div class="form-group">
                                        <label for="nbreEt">Number of floors</label>
                                        <input type="number" name="nbreEt" class="form-control"min="1">
                                    </div>
                                </div>
                                <br>
                                <div class="model-footer text-center">
                                    <button class="btn btn-info" type="submit" >Save</button>
                                    <button class="btn btn-primary" data-dismiss="modal">cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                       {!! $blocks->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('block.create')   --}} 
@endsection