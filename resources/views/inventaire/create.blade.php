	
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"  type="text/css">
	
	<!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{asset('css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
	
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	
	<!-- Custom Fonts -->
    <link rel="stylesheet" href="{{asset('font-awesome-4.4.0/css/font-awesome.min.css')}}"  type="text/css">

<style>
/*custom font*/
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

@primary-color: #63a2cb;
@secondary-color: #67d5bf;
/*basic reset*/
* {margin: 0; padding: 0;}

/*form styles*/
#msform {
	width: 600px;
	margin: 50px auto;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	
	box-sizing: border-box;
    width: 80%;
	margin: 0 10%;
	
	/*stacking fieldsets above each other*/
	position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
#msform input, #msform textarea {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
/*buttons*/
#msform .action-button {
	width: 100px;
	background: #67d5bf;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #67d5bf;
}
/*headings*/
.fs-title {
	font-size: 16px;
	text-transform: uppercase;
	color: #63a2cb;
	margin-bottom: 10px;
}
.fs-subtitle {
	font-weight: normal;
	font-size: 14px;
	color: #666;
	margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: white;
	text-transform: uppercase;
	font-size: 9px;
	width: 33%;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #67d5bf;
	color: white;
}

.help-block {
  font-size: .8em;
  color: #7c7c7c;
  text-align: left;
  margin-bottom: .5em;
}
</style>
<br><br>
<!-- multistep form -->
<section id="msform">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active"></li>
		<li></li>
		<li></li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
        <input type="text" name="name" id="name" placeholder="name"required placeholder=" " />
        <input type="text" name="description" id="description" placeholder="description" required placeholder=" " />
		<input type="button" name="next" class="next action-button" onclick="saveInventaire($('#name').val(),$('#description').val())" value="Next" />
	</fieldset>
	<fieldset >



 		<ul class="nav navbar-nav">
		  
		  <li><a style="" href="#" class="dropleft"><i class="fa fa-list"></i> blocks</a>
			<ul class="dropdown-menu">
                @foreach(\App\block::all() as $block)      
			  <li><a href="#">{{$block->name}}<span class="caret"></span></a>
				<ul class="dropdown-menu">
                    @for($i = -$block->sous; $i <= $block->nbre_etage; $i++)   
				  <li><a href="#">{{$i}}<span class="caret"></span></a>
					<ul class="dropdown-menu">
                        @foreach(\App\bureau::all() as $bureau)
                        @if($bureau->etage == $i && $bureau->assets->count()>0) 
                      <li ><label> <input style="width: 15px;" class="select" type="checkbox" onclick="selectBureau({{$bureau->id}})">&#160 {{$bureau->name}}</label>
                      @endif
					  @endforeach
					</ul>
				  </li>
				  @endfor
				</ul>
              </li>
              @endforeach  
			</ul>
		  </li>
		 
		</ul>
		
	  </div><!--/.nav-collapse -->

	
    	
    <!-- Once the page is loaded, initialized the plugin. -->
    <script type="text/javascript" src="{{asset('js/jquery-2.1.1.js')}}" ></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	

	<!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="{{asset('js/jquery.smartmenus.js')}}"></script>

    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="{{asset('js/jquery.smartmenus.bootstrap.js')}}"></script>

      
  <br><br>

		<input type="button" name="next" class="next action-button" value="Next" onclick="setAssets()" />
	</fieldset>
	<fieldset style="width: 100%">
        <form action="{{ route('storeInventaire') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                         
        <table style="font-size: small;" class="table align-items-center table-flush minha-table" id="tableInv">
            <thead>
            <tr>
                <th scope="col">Block</th>
                <th scope="col">Etage</th>
                <th scope="col">Bureau</th>
                <th scope="col">Asset</th>
                <th scope="col">fine</th>
                <th scope="col">repair</th>
                <th scope="col">lost</th>
            </tr>    
            </thead>    
            <tbody>
              <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">//for selecting one checkAT TIME</script>
           
            </tbody>
        </table>
        
		<button type="submit" class="action-button">finish</button>
        </form>
    </fieldset>
	
</section>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>

<script>
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 500, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeOutQuint'
	});
});

</script>




<script type="text/javascript"> 
    function selectBureau(id) {
  if ($('.select').is(':checked')) {
    $.ajax({
  type:'get',
  url:'{!!URL::to('BureauInvCheck')!!}',
  data:{'id':id},
  dataType:'json',
  success:function(data){
  if (data) {
  console.log(data); 
  }
                                             
  },      
                                       
   error:function(){ 
  console.log('ssasa');
   },
  })
  }else{
    $.ajax({
  type:'get',
  url:'{!!URL::to('BureauInvUnCheck')!!}',
  data:{'id':id},
  dataType:'json',
  success:function(data){
  if (data) {
  console.log(data); 
  }
                                             
  },      
                                       
   error:function(){ 
  console.log('dawda');
   },
  })  
  }
  }

  function saveInventaire(name,description) {
  $.ajax({
  type:'get',
  url:'{!!URL::to('saveInv')!!}',
  data:{'name':name,'description':description},
  dataType:'json',
  success:function(data){
    if (data) {
  console.log(data);
  
  }
                                             
  },                                           
   error:function(){ 
  console.log('ewewewe');
   },
  })
  }

  function setAssets(id) {
  $.ajax({
  type:'get',
  url:'{!!URL::to('AssetInv')!!}',
  data:{'id':id},
  dataType:'json',
  success:function(data){
    var list=[];
  list[0]=data[1];list[1]=data[2];list[2]=data[3];list[3]=data[4];list[4]=data[5];
  if (list[4]) {
  console.log();
  for(var i=0 ; i<list[4].length; i++){
 
   $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
  } 
  }else{
    $("#tableInv").empty(); 
    $("#tableInv").append('<tr><label>pas d\'asset</label></tr>')
  }
                                             
  },                                   
   error:function(){ 
  console.log('ewewewe');
   },
  })
  }

  </script>
