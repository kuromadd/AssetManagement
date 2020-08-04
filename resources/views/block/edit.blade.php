@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header">  
                   Block edit :
                </div>
            
                <div class="card-body">
                    <form action="{{ route('updateBlock',$block->id) }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name :</label>
                    <input type="text" name="name" value="{{ $block->name }}" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="adress">Adress :</label>
                        <input type="text" name="adress" value="{{$block->adress}}" class="form-control" required placeholder=" ">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="wilaya">--Wilaya--</label>
                          <input type="text" class="form-control" value="{{$block->wilaya}}" name="wilaya">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="daira">--Daira--</label>
                          <input type="text" class="form-control" value="{{$block->daira}}" name="daira">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="zip">--Zip--</label>
                          <input type="text" class="form-control" value="{{$block->zip}}" name="zip">
                        </div>
                      </div>

                    <div class="form-group">
                        <label for="sous">Number of underground floors :</label>
                        <input type="number" name="sous" value="{{$block->sous}}" class="form-control" required min="0">
                    </div>
                    <div class="form-group">
                        <label for="nbreEt">Number of floors :</label>
                        <input type="number" name="nbreEt" value="{{$block->nbre_etage}}" class="form-control" required min="1">
                    </div>
                    <div class="text-center">
                    <button class="btn btn-info" type="submit">update</button>    
                    </div> 
                </form>
            
                
            </div>
        </div>
@endsection    