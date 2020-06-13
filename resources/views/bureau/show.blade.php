@extends('app.edit_layout')
@section('content')
  
            <div class="card card-default">
              <div class="card-header">  
                <div class="col-8">
                <h3 class="mb-0">{{$bureau->name}}</h3>
                </div>
            </div>
            
            <div class="card-body">
                <div class="form-group">
                    <label for="name">name</label>
                <input type="text" class="form-control" name="type" disabled value="{{$bureau->name}}">
                </div>

                <div class="form-group">
                    <label for="type">type</label>
                        <select class="form-control" disabled name="type" id="type">
                        <option value="bureau" @if ($bureau->block->name == 'bureau') selected @endif>bureau</option>
                        <option value="stock" @if ($bureau->block->name == 'stock') selected @endif>stock</option>
                        <option value="restroom" @if ($bureau->block->name == 'restroom') selected @endif>restroom</option>
                        </select>
                    </div>
                <div class="form-group">
                <label for="block_id">block</label>
                    <select class="form-control" disabled name="block_id" id="block_id">
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
                    <select class="form-control" disabled name="etage" id="etage">
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
                    <label for="asset_id">Assets</label><br>
                    @foreach($bureau->assets as $asset)
                              <label >&#160<input type="checkbox" name="assets[]" value="{{ $asset->id }}" checked disabled> {{$asset->name}} </label>
                            @endforeach
                </div>
                <div class="text-center">
                    <a href="#popupAsset" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane fa-fw text-blue"></i></i> Assets &#160&#160&#160</a>
                    </div>


                @include('bureau.Assets')


        </div>
    </div>
@endsection