@extends('app.edit_layout')
@section('content')
  
            <div class="card card-default">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                        <h3 class="mb-0">edit {{$bureau->name}}</h3>
                        </div>
                        
                        <div class="col-4 text-right">
                        <a href="#popupAsset" class="btn btn-sm btn-primary">Assets</a>
                        </div>
                        
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
                <div class="form-group">
                    <label for="block_id">Assets</label><br>
                        
                            @foreach($bureau->assets as $asset)
                              <label >&#160<input type="checkbox" name="assets[]" value="{{ $asset->id }}" checked> {{$asset->name}} </label>
                            @endforeach
                        
                    </div>
                <div class="text-center">
                <button class="btn btn-info" type="submit">update</button>    
                </div> 
            </form>
        
            @include('bureau.Assets')
        </div>
    </div>


@endsection
