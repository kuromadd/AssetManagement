@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header" >  
                   add a new Mission
                </div>
            
                <div class="card-body">
                    <form action="{{ route('storeMission') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        
                    {{ csrf_field() }}

                    <div class="form-group">
                    <label for="Asset_id">Asset</label>
                        <select class="custom-select browser-default" name="asset_id" id="asset_id">
                            <option value="0" disabled @if( $id == 0)selected @endif>select asset</option>
                            @foreach(\App\Asset::all()->where('category','Vehicle') as $asset)
                                  @if($asset->etat==1 && $asset->status = [0,1]) 
                                    <option value="{{ $asset->id }}"
                                    @if( $id && $asset->id == $id)
                                    selected
                                    @endif>{{$asset->name}}</option>
                                  @endif
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="but_mission">But de la mission</label>
                        <input type="text" name="but_mission" class="form-control" required placeholder=" ">
                        <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                    </div>

                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <input type="text" name="destination" class="form-control" required placeholder=" ">
                        <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                    </div>

                    <div class="form-group">
                        <label for="mission_at">date de la Mission</label>
                    <input type="date" name="mission_at" class="form-control" value="{{date('Y-m-d')}}" id="mission_at">
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


