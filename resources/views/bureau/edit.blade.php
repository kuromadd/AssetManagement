@extends('app.edit_layout')
@section('content')
  
            <div class="card card-default">
              <div class="card-header">  
                <div class="col-8">
                    <h3 class="mb-0">edit bureau</h3>
                </div>
            </div>
            
            <div class="card-body">
                <form action="{{ route('updateBureau',$bureau->id) }}" method="post" enctype="multipart/form-data">
    
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                        <select class="form-control" name="name" id="name">
                        <option value="bureau" @if ($bureau->block->name == 'bureau') selected @endif>bureau</option>
                        <option value="stock" @if ($bureau->block->name == 'stock') selected @endif>stock</option>
                        <option value="restroom" @if ($bureau->block->name == 'restroom') selected @endif>restroom</option>
                        </select>
                    </div>
                <div class="form-group">
                <label for="block_id">block</label>
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
                 <label for="nbreEt">numero d'etage</label>
                    <select class="form-control" name="etage" id="etage">
                        @for($i = -2; $i < 6; $i++)
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