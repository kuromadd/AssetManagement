
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
  margin: 20px auto;
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
@import url(https://fonts.googleapis.com/css?family=PT+Sans:400,700);

form > div > input[type="text"]:invalid:not(:focus):not(:placeholder-shown),
form > div > input[type="email"]:invalid:not(:focus):not(:placeholder-shown),
form > div > input[type="password"]:invalid:not(:focus):not(:placeholder-shown) {
  background: pink;
}

form > div > input[type="text"]:invalid:focus:not(:placeholder-shown) ~ .requirements,
form > div > input[type="email"]:invalid:focus:not(:placeholder-shown) ~ .requirements,
form > div > input[type="password"]:invalid:focus:not(:placeholder-shown) ~ .requirements {
  max-height: 200px;
  padding: 0 30px 20px 50px;
}
form > div .requirements {
  padding: 0 30px 0 50px;
  color: #999;
  max-height: 0;
  -webkit-transition: 0.28s;
  transition: 0.28s;
  overflow: hidden;
  color: red;
  font-style: italic;
}
</style>


<div id="popupfc" class="overlay" style="overflow: scroll">
    <div class="popup" style="width: 60%">
            <div class="card card-default">
                  <div class="card-header">  
                   create a new Fournisseur
                   <a class="close" href="#">&times;</a>
                </div>
            
                <div class="card-body">
                    <form action="{{ route('storeFournisseur') }}" method="post" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="libel">Libel</label>
                        <input type="text" name="libel" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="adress">Adress</label>
                        <input type="text" name="address" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="tel">Tel</label>
                        <input type="text" name="tel" class="form-control" required placeholder=" ">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control" required placeholder=" " />
                      <div class="requirements">
                      Must be a valid email address.
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" class="form-control">
                    </div>
                    <div class="text-center">
                    <button class="btn btn-info" type="submit">store</button>    
                    </div> 
                </form>
            
                
            </div>
        </div>
    </div>
</div>
