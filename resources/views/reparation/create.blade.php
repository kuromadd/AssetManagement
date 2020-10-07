@extends('app.layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header" >  
                   add a new Reparation
                </div>
            
                <div class="card-body">
                    <form action="{{ route('storeReparation') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="prix">prix</label>
                        <input type="text" name="prix" class="form-control" required placeholder=" ">
                        <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                    </div>

                    <div class="form-group">
                        <label for="repaired_at">date de la reparation</label>
                    <input type="date" name="repaired_at" value="{{date('Y-m-d')}}" class="form-control" id="repaired_at">
                    <div class="invalid-feedback">
                        Please provide a valid state.
                      </div>
                    </div>

                    <div class="form-group">
                    <label for="Asset_id">Asset</label>
                        <select class="custom-select browser-default" name="asset_id" id="asset_id" required>
                            @if( $_GET["id"] && $asset->id == $_GET["id"])
                            <option value="{{ $asset->id }}" selected>{{$asset->name}}</option>
                            @else
                           <option selected disabled value="">select asset :</option> 
                            @foreach(\App\Asset::all() as $asset)
                            @if($asset->status == 2)
                            <option value="{{ $asset->id }}">{{$asset->name}}</option>
                            @endif    
                        @endforeach
                        @endif
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                    </div>
                    <div class="text-center">
                    <button class="btn btn-info" type="submit">store</button>    
                    </div> 
                </form>
            
                
            </div>
        </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>(function() {
    'use strict';
    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
    if (form.checkValidity() === false) {
    event.preventDefault();
    event.stopPropagation();
    }
    form.classList.add('was-validated');
    }, false);
    });
    }, false);
    })();
    </script>

