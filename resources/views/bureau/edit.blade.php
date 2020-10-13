@extends('app.layout')
@section('content')
  
            <div class="card card-default">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                        <h3 class="mb-0">Bureau edit :</h3>
                        </div>
                        
                        
                    </div>
                </div>
            
            <div class="card-body">
                <form action="{{ route('updateBureau',$bureau->id) }}" method="post" enctype="multipart/form-data">
    
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Name :</label>
                    <input type="text" class="form-control" name="name" value="{{$bureau->name}}" required placeholder=" ">
                    </div>
                    <label for="type">Type :</label>
                        <select class="form-control" name="type" id="type">
                        <option value="Office" @if ($bureau->type == 'Office') selected @endif>Office</option>
                        <option value="Stock" @if ($bureau->type == 'Stock') selected @endif>Stock</option>
                        <option value="Garage" @if ($bureau->type == 'Garage') selected @endif>Garage</option>
                        <option value="Other" @if ($bureau->type == 'Other') selected @endif>Other</option>

                        </select>
                    </div>
                <div class="form-group">
                <label for="block_id">Block :</label>
                    <select class="form-control" name="block_id" id="block_id">
                        @foreach(\App\block::all() as $block)
                    <option value="{{ $block->id }}"
                        @if ($block_id ?? ''== $bureau->block_id)
                        selected
                    @endif
                        >{{$block->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                 <label for="nbreEt">Floor number :</label>
                    <select class="form-control" name="etage" id="etage">
                        
                        @for($i = -(\App\block::all()->where('id',$bureau->block_id)->first()->sous); $i <= \App\block::all()->where('id',$bureau->block_id)->first()->nbre_etage; $i++)
                           <option value="{{$i}}"
                           @if ($i == $bureau->etage)
                               selected
                           @endif
                           >{{$i}}</option>                             
                        @endfor
                    </select>
                </div>

                <div class="text-center">
                <button class="btn btn-info" type="submit">update</button>    
                </div> 
            </form>

        </div>
    </div>
 
@endsection
