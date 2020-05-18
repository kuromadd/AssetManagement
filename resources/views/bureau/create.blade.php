
    
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
  margin: 30px auto;
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


<div id="popupbrc" class="overlay">
    <div class="popup" style="width: 60%">
            <div class="card card-default">
              <div class="card-header border-0">
                  <div class="row align-items-center">
                      <div class="col-8">
                          <h3 class="mb-0">create a new bureau</h3>
                      </div>
                      <a class="close" href="#">&times;</a>
                    </div>
              </div>
            </div>
                <div class="card-body">
                    <form action="{{ route('storeBureau') }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                            <select class="form-control" name="name" id="name">
                            <option value="bureau">bureau</option>
                            <option value="stock">stock</option>
                            <option value="restroom">restroom</option>
                            </select>
                        </div>
                    <div class="form-group">
                    <label for="block_id">block</label>
                        <select class="form-control" name="block_id" id="block_id">
                            @foreach(\App\block::all() as $block)
                        <option value="{{ $block->id }}">{{$block->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="block_id">Assets</label><br>
                          
                              @foreach(\App\asset::all() as $asset)
                              @if ($asset->occupied == 0)
                                <label >&#160<input type="checkbox" name="assets[]" value="{{ $asset->id }}"> {{$asset->name}} </label>
                              @endif
                              @endforeach
                          
                      </div>
                    <div class="form-group">
                     <label for="nbreEt">numero d'etage</label>
                        <select class="form-control" name="etage" id="etage">
                            @for($i = -2; $i < 6; $i++)
                               <option value="{{$i}}">{{$i}}</option>                             
                            @endfor
                        </select>
                    </div>
                    <div class="text-center">
                    <button class="btn btn-info" type="submit">store</button>    
                    </div> 
                </form>
            
                
            </div>
        </div>
    </div>
</div>
