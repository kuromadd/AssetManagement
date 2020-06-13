@extends('app.edit_layout') 
@section('content')

    <div class="card card-default">
        <div class="card-header" style="background-color: #007bff">  
              <div class="col-8">
                  <h3 class="mb-0">edit asset</h3>
              </div>
          </div>
      
  <div class="card-body">
    <form action="{{ route('updateAsset',$asset->id) }}" method="post" enctype="multipart/form-data">

      {{ csrf_field() }}
      <div class="form-group">
          <label class="form-control-label" for="name">&#160&#160Name</label>
          <input type="text" name="name" value="{{$asset->name}}" class="form-control form-control">
      </div>

      <div class="form-group">
          <label for="description" class="form-control-label"> &#160&#160Description </label>
          <textarea class="form-control" name="description" id="description" cols="4" rows="4">{{$asset->description}}</textarea>
      </div>
  
      <div class="form-group">
          <label class="form-control-label" for="prix">&#160&#160price</label>
          <input type="text" name="prix" value="{{$asset->prix}}" class="form-control form-control">
      </div>
      <div class="form-group">
        <label for="category" class="form-control-label">&#160&#160category</label>
        <select name="category" id="category" class="form-control form-control">
          <option value="furniture" @if ($asset->category == 'furniture') selected @endif >furniture and fixtures</option>
          <option value="intangible" @if($asset->category == 'intangible') selected @endif>intangible assets</option>
          <option value="office" @if($asset->category == 'office') selected @endif>office equipement</option>
          <option value="vehicle" @if($asset->category == 'vehicle') selected @endif>vehicle</option>
          <option value="software" @if($asset->category == 'software') selected @endif>software</option>
          <option value="building" @if($asset->category == 'building') selected @endif>building</option>
        </select>
      </div>
     
      <div class="form-group">
        <label for="date" class="form-control-label">&#160&#160mis en service a :</label>
        <input type="date" name="dateservice" id="dateservice" value="{{ $asset->dateService }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="duree" class="form-control-label">&#160&#160duree de vie</label>
      <input  type="text" name="duree" value="{{ $asset->duree_vie }}" class="form-control form-control">
      </div>

      <div class="form-group">
        <label for="fournisseur_id">Fournisseur</label>
            <select class="form-control fournisseurID" name="fournisseur_id" id="fournisseur_id">
              <option value=0 disabled selected>chose fournisseur</option>
                @foreach(\App\Fournisseur::all() as $fournisseur)
            <option value="{{ $fournisseur->id }}">{{$fournisseur->libel}}</option>
                @endforeach
            </select>               
            
        </div>
      
      <div class="text-center">
      <button class="btn btn-info" type="submit">update</button>    
      </div> 
    </form>    
</div>
</div>
@endsection