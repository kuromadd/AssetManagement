    
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
  width: 20%;
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
  top: 20px;
  right: 25px;
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


<div id="popupAsset" class="overlay" style="overflow: scroll;">
    <div class="popup" style="width: 60% ">
        <div class="table-responsive">
            <form action="{{ route('saveAssets',$bureau->id) }}" method="post" enctype="multipart/form-data">
        
                {{ csrf_field() }}
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr style="width: ">
                        <th scope="col">Assets</th>
                        <th  scope="col"></th>
                        <a class="close" href="#">&times;</a>
                    </tr>
                </thead>
                <tbody>
                @foreach(\App\asset::all() as $item)
                <tr style="width: 100%">
                    <td style="margin: 10% ; width: 15%;">{{$item->name}}</td>   
                <td style=" width: 15%;" class="">&#160&#160<input type="checkbox" name="assets[]" 
                    @foreach($bureau->assets as $value)
                    @if($item->name == $value->name) checked @endif 
                    @endforeach value="{{$item->id}}">   
                    </td>
                    
                </tr>
                @endforeach    
                </tbody>
            </table>
            <div class="text-right">
                <button class="btn btn-info" type="submit">save</button>    
                </div> 
            </form>
        </div>
        </div>
    </div>
</div>
