@extends('app.edit_layout')
@section('content')

<script src="{{ asset('js/app.js') }}"></script>
<script
src="https://code.jquery.com/jquery-3.5.0.min.js"
integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<div class="row">
  <div class="col">
      <div class="card shadow" style="width: 70%;margin-left:14% ">
          <div class="card-header border-0">
              <div class="row align-items-center">
                  <div class="col-8">
                      <h3 class="mb-0">Create a new asset :</h3>
                  </div>
              </div>
          </div>
          
<div class="card-body">
    <form action="{{ route('storeAsset') }}" method="post" enctype="multipart/form-data">

      {{ csrf_field() }}
    <input type="text" hidden name="qr" value="{{$qr}}">
      <div class="form-group">
          <label class="form-control-label" for="name">&#160&#160Name :</label>
          <input type="text" name="name" class="form-control form-control-alternative">
      </div>

      <div class="form-group">
          <label for="description" class="form-control-label"> &#160&#160Description :</label>
          <textarea class="form-control" name="description" id="description" cols="4" rows="4"></textarea>
      </div>
  
      <div class="form-group">
          <label class="form-control-label" for="prix">&#160&#160Price :</label>
          <input type="text" name="prix" class="form-control form-control-alternative">
      </div>
      <div class="form-group">
        <label for="category" class="form-control-label">&#160&#160Category :</label>
        <select name="category" id="category" class="form-control form-control-alternative">
          <option value=0 disabled selected>Choose a category :</option>
          <option value="Furniture and fixtures">Furniture and fixtures</option>
          <option value="Intangible assets">Intangible assets</option> {{-- trademarks, customer lists, literary works, broadcast rights, and patented technology. --}}
          <option value="Office equipement">office equipement</option>
          <option value="Vehicle">vehicle</option>
          <option value="Software">Software</option>
          <option value="Building">building</option>
        </select>
      </div>
    
      <div class="form-group">
        <label for="date" class="form-control-label">&#160&#160Acquisition date :</label>
        <input type="date" name="dateservice" id="dateservice" class="form-control datetimepicker">
      </div>

      <div class="form-group">
        <label for="duree" class="form-control-label">&#160&#160Lifetime :</label>
        <input  type="text" name="duree" id="duree" class="form-control form-control-alternative">
      </div>

      <div class="form-group">
        <label for="fournisseur_id">Provider :</label>
            <select class="form-control fournisseurID" name="fournisseur_id" id="fournisseur_id">
              <option value=0 disabled selected>choose a supplier :</option>
                @foreach(\App\Fournisseur::all() as $fournisseur)
            <option value="{{ $fournisseur->id }}">{{$fournisseur->libel}}</option>
                @endforeach
            </select>               
            
        </div>
      
      <div class="text-center">
      <button class="btn btn-success" type="submit">Store</button>    
      </div> 
    </form>    
  </div>
</div>

@endsection