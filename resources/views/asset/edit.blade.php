@extends('app.edit_layout') 
@section('content')

    <div class="card card-default">
        <div class="card-header" style="background-color: #ecf4fd">  
              <div class="col-8">
                  <h3 class="mb-0">Edit asset :</h3>
              </div>
          </div>
      
  <div class="card-body">
    <form action="{{ route('updateAsset',$asset->id) }}" method="post" enctype="multipart/form-data">

      {{ csrf_field() }}
      <div class="form-group">
          <label class="form-control-label" for="name">&#160&#160Name :</label>
          <input type="text" name="name" value="{{$asset->name}}" class="form-control form-control">
      </div>

      <div class="form-group">
        <label class="form-control-label" for="brand">&#160&#160Brand :</label>
        <input type="text" name="brand" value="{{$asset->brand}}" class="form-control form-control">
    </div>

      <div class="form-group">
          <label for="description" class="form-control-label"> &#160&#160Description :</label>
          <textarea class="form-control" name="description" id="description" cols="4" rows="4">{{$asset->description}}</textarea>
      </div>
  
      <div class="form-group">
          <label class="form-control-label" for="prix">&#160&#160Price :</label>
          <input type="number" name="prix" value="{{$asset->prix}}" class="form-control form-control">
      </div>
      <div class="form-group">
        <label for="category" class="form-control-label">&#160&#160Category :</label>
        <select name="category" id="category" class="form-control form-control">
          <option value="Furniture and fixtures" @if ($asset->category == 'Furniture and fixtures') selected @endif >Furniture and fixtures</option>
          <option value="Intangible assets" @if($asset->category == 'Intangible assets') selected @endif>Intangible assets</option>
          <option value="Office equipement" @if($asset->category == 'Office equipement') selected @endif>Office equipement</option>
          <option value="Vehicle" @if($asset->category == 'Vehicle') selected @endif>Vehicle</option>
          <option value="Software" @if($asset->category == 'Software') selected @endif>Software</option>
          <option value="Building" @if($asset->category == 'Building') selected @endif>Building</option>
        </select>
      </div>
     
      <div class="form-group">
        <label for="date" class="form-control-label">&#160&#160Acquisition date :</label>
        <input type="date" name="dateservice" id="dateservice" value="{{ $asset->dateService }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="duree" class="form-control-label">&#160&#160Lifetime :</label>
      <input  type="number" name="duree" value="{{ $asset->duree_vie }}" class="form-control form-control">
      </div>

      <div class="form-group">
        <label for="fournisseur_id">Provider :</label>
            <select class="form-control fournisseurID" name="fournisseur_id" id="fournisseur_id">
              
                @foreach(\App\Fournisseur::all() as $fournisseur)
            <option value="{{ $fournisseur->id }}" @if($asset->fournisseur_id == $fournisseur->id) selected @endif>{{$fournisseur->libel}}</option>
                @endforeach
            </select>               
            
        </div>
      
      <div class="text-center">
      <button class="btn btn-info" type="submit">Update</button>    
      </div> 
    </form>    
</div>
</div>
@endsection