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
          <option value="op1" @if ($asset->category == 'op1') selected @endif >op1</option>
          <option value="op2" @if($asset->category == 'op2') selected @endif>op2</option>
          <option value="op3" @if($asset->category == 'op3') selected @endif>op3</option>
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
      
      <div class="text-center">
      <button class="btn btn-info" type="submit">update</button>    
      </div> 
    </form>    
</div>
</div>
@endsection