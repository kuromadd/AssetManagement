
<style>

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 40px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 10px;
  right: 20px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
</style>


<div id="popupuc" class="overlay">
    <div class="popup" style="width: 60%"> 
           
              <div class="card card-default">
                <div class="card-header border-0" >
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Create a new user :</h3>
                        </div>
                        <a class="close" href="#">&times;</a>
                      </div>
                </div>
              </div>
            
                <div class="card-body align-items-center">
                    <form action="{{ route('storeUser') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    {{ csrf_field() }}
                    <input type="text" hidden name="qr" value="{{Str::random(20)}}">
                    <label class="form-control-label" for="name">{{ __('Name :') }}</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                    <div class="invalid-feedback">
                      Please provide a valid name.
                    </div>

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="email">{{ __('Email :') }}</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <div class="invalid-feedback">
                      Please provide a valid email.
                    </div>
                </div>
                
                    <div class="form-group">
                        <label for="role_id" class="form-control-label">Role :</label>
                        <select class="custom-select browser-default" name="role" required>
                        <option value="" disabled selected>select role :</option>  
                            @foreach (Spatie\Permission\Models\Role::all() as $item)
                        <option value="{{$item->id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                          Please select a role.
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Store</button>
                    </div>
                
                </form>
            
                </div>
            
         </div>
    </div> 


    <!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script-->

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