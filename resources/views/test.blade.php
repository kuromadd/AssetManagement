
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="hummingbird-treeview.css" rel="stylesheet" type="text/css">
    <style>
        body {
            background-color: #fafafa;
        }
        
        .container {
            margin: 150px auto;
            min-height: 100vh;
        }
        
        .stylish-input-group .input-group-addon {
            background: white !important;
        }
        
        .stylish-input-group .form-control {
            border-right: 0;
            box-shadow: 0 0 0;
            border-color: #ccc;
        }
        
        .stylish-input-group button {
            border: 0;
            background: transparent;
        }
        
        .h-scroll {
            background-color: #fcfdfd;
            height: 260px;
            overflow-y: scroll;
        }
    </style>
</head>

<body>

    
<style>
<<<<<<< HEAD
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

body {
  background: url('https://www.freevector.com/uploads/vector/preview/30355/Fluid_Gradient_Background.jpg');
  background-size:100%;
  text-align: center;
 font-family: 'Montserrat', sans-serif;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
=======
<<<<<<< HEAD
<<<<<<< HEAD
#checkbox-container{
  margin: 10px 5px;
}
=======
@blue: #4cc9c8;
@pink: #fa001a;

.dots(@color) {
  background:
    radial-gradient(@color 20%, transparent 19%),
    radial-gradient(@color 20%, transparent 19%),
    transparent;
  background-size: 6px 6px;
  background-position: 0 0, 3px 3px;
>>>>>>> b5ae5e6c8f48e1ff71e0a6939232efba95a82fd6
}

#svg_form_time {
  height: 15px;
  max-width: 80%;
  margin: 40px auto 20px;
  display: block;
}

#svg_form_time circle,
#svg_form_time rect {
  fill: white;
}

.button {
  background: rgb(237, 40, 70);
  border-radius: 100px;
  padding: 15px 25px;
  display: inline-block;
  margin: 10px;
  font-weight: bold;
  color: white;
  cursor: pointer;
}

.disabled {
  display:none;
}

section {
  padding: 50px 100px 70px;
  max-width: 55%;
  margin: 30px auto;
  background:white;
  background:rgba(255,255,255,0.8);
  backdrop-filter:blur(10px);
  box-shadow:0px 2px 10px rgba(0,0,0,0.3);
  border-radius:10px;
  transition:transform 0.2s ease-in-out;
}

input {
  width: 100%;
  margin: 5px 0px;
  display: inline-block;
  padding: 15px 25px;
  box-sizing: border-box;
  border-radius: 50px;
  border: 1px solid lightgrey;
  font-size: 1em;
  font-family:inherit;
  background:white;
}

p {
  margin: 5px;
  text-align: left;
  font-weight: bold;
  font-size: 0.9em;
}

</style>

<div id="svg_wrap"></div>

<section>
    <p>Personal information</p>
    <input type="text" placeholder="name" />
    <input type="text" placeholder="description" />
</section>

<section>
    <div id="treeview_container" class="hummingbird-treeview">
       
        <ul id="treeview" class="hummingbird-base">
          @foreach(\App\block::all() as $block)
            
          
        <li><i class="fa fa-minus"></i> <label> <input id="node-0" data-id="custom-0" type="checkbox" > {{$block->name}}</label>
              <ul style="display: block;">
              @for($i = $block->sous; $i < $block->nbre_etage; $i++) 
                
                    <li><i class="fa fa-plus"></i> <label> <input id="node-0-1" data-id="custom-1" type="checkbox">  {{$i}}</label>
                      <ul>
                      @foreach(\App\bureau::all() as $bureau)
                      @if($bureau->etage == $i)
                            <li><label> <input id="node-0-1-1" data-id="custom-1-1" type="checkbox" onchange="setAssets({{$bureau->id}})"> {{$bureau->name}}</label>
                               
                            </li>
                            
                            @endif
                            @endforeach
                        </ul>
                    </li>
                @endfor    
                </ul>
            </li>
          @endforeach
        </ul>
    </div>

    <table class="table align-items-center table-flush minha-table" id="tableInv">
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
</section>

<script>
  try {
      fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
          method: 'HEAD',
          mode: 'no-cors'
      })).then(function(response) {
          return true;
      }).catch(function(e) {
          var carbonScript = document.createElement("script");
          carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CE7DC2JW&placement=wwwcssscriptcom";
          carbonScript.id = "_carbonads_js";
          document.getElementById("carbon-block").appendChild(carbonScript);
      });
  } catch (error) {
      console.log(error);
  }
</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="hummingbird-treeview.js"></script>
<script>
  $("#treeview").hummingbird();
  $("#checkAll").click(function() {
      $("#treeview").hummingbird("checkAll");
  });
  $("#uncheckAll").click(function() {
      $("#treeview").hummingbird("uncheckAll");
  });
  $("#collapseAll").click(function() {
      $("#treeview").hummingbird("collapseAll");
  });
  $("#checkNode").click(function() {
      $("#treeview").hummingbird("checkNode", {
          attr: "id",
          name: "node-0-2-2",
          expandParents: false
      });
  });
</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
      var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(ga, s);
  })();
</script>

<section>
    <table class="table align-items-center table-flush" id="tableInv">
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
        <tbody >
          <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">//for selecting one checkAT TIME</script>
       
        </tbody>
    </table>
</section>



<div class="button" id="prev">&larr; Previous</div>
<div class="button" id="next">Next &rarr;</div>
<div class="button" id="submit">Agree and send application</div>


<script>
    var base_color = "white";
var active_color = "rgb(237, 40, 70)";

var child = 1;
var length = $("section").length - 1;
$("#prev").addClass("disabled");
$("#submit").addClass("disabled");

$("section").not("section:nth-of-type(1)").hide();
$("section").not("section:nth-of-type(1)").css('transform','translateX(100px)');

var svgWidth = length * 200 + 24;
$("#svg_wrap").html(
  '<svg version="1.1" id="svg_form_time" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
    svgWidth +
    ' 24" xml:space="preserve"></svg>'
);

function makeSVG(tag, attrs) {
  var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
  for (var k in attrs) el.setAttribute(k, attrs[k]);
  return el;
}

for (i = 0; i < length; i++) {
  var positionX = 12 + i * 200;
  var rect = makeSVG("rect", { x: positionX, y: 9, width: 200, height: 6 });
  document.getElementById("svg_form_time").appendChild(rect);
  // <g><rect x="12" y="9" width="200" height="6"></rect></g>'
  var circle = makeSVG("circle", {
    cx: positionX,
    cy: 12,
    r: 12,
    width: positionX,
    height: 6
  });
  document.getElementById("svg_form_time").appendChild(circle);
}

var circle = makeSVG("circle", {
  cx: positionX + 200,
  cy: 12,
  r: 12,
  width: positionX,
  height: 6
});
document.getElementById("svg_form_time").appendChild(circle);

<<<<<<< HEAD
$("circle:nth-of-type(1)").css("fill", active_color);

$(".button").click(function () {
  $("#svg_form_time rect").css("fill", active_color);
  $("#svg_form_time circle").css("fill", active_color);
  var id = $(this).attr("id");
  if (id == "next") {
    $("#prev").removeClass("disabled");
    if (child >= length) {
      $(this).addClass("disabled");
      $('#submit').removeClass("disabled");
    }
    if (child <= length) {
      child++;
    }
  } else if (id == "prev") {
    $("#next").removeClass("disabled");
    $('#submit').addClass("disabled");
    if (child <= 2) {
      $(this).addClass("disabled");
    }
    if (child > 1) {
      child--;
    }
  }
  var circle_child = child + 1;
  $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
    "fill",
    base_color
  );
  $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
    "fill",
    base_color
  );
  var currentSection = $("section:nth-of-type(" + child + ")");
  currentSection.fadeIn();
  currentSection.css('transform','translateX(0)');
 currentSection.prevAll('section').css('transform','translateX(-100px)');
  currentSection.nextAll('section').css('transform','translateX(100px)');
  $('section').not(currentSection).hide();
});

</script>



<script type="text/javascript"> 
  function setAssets(id) {
$.ajax({
type:'get',
url:'{!!URL::to('AssetInv')!!}',
data:{'id':id},
dataType:'json',
success:function(data){
  var list=[];
list[0]=data[1];list[1]=data[2];list[2]=data[3];list[3]=data[4];list[4]=data[5];
if (data) {
console.log(data);
for(var i=0 ; i<list[4].length ; i++){
 console.log(list[4].length);
 $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" onchange="checkfine('+list[4][i]+')" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" onchange="checkdamaged('+list[4][i]+')" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" onchange="checklost('+list[4][i]+')" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
} 
}
                                           
},      
                                     
 error:function(){ 
console.log('ewewewe');
 },
})
}
</script>
=======
>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d

#checkbox-container div{
  margin-bottom: 5px;
}

#checkbox-container button{
  margin-top: 5px;
}

input[type=text] {
  padding: .5em .6em;
  display: inline-block;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 3px #ddd;
  border-radius: 4px;
}
=======

>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
</style>

<<<<<<< HEAD
<div id="checkbox-container">
  <div>
<<<<<<< HEAD
    <label for="option1">Option 1</label>
    <input type="checkbox" id="option1">
  </div>
  <div>
    <label for="option2">Option 2</label>
    <input type="checkbox" id="option2">
  </div>
  <div>
    <label for="option3">Option 3</label>
=======
    <label for="option">Option 1</label>
    <input type="checkbox" id="option1">
  </div>
  <div>
    <label for="option">Option 2</label>
    <input type="checkbox" id="option2">
  </div>
  <div>
    <label for="option">Option 3</label>
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
    <input type="checkbox" id="option3">
  </div>
</div>
</body>
<<<<<<< HEAD
<script>
$(function(){
    var test = localStorage.input === 'true'? true: false;
    $('input').prop('checked', test || false);
});

$('input').on('change', function() {
    localStorage.input = $(this).is(':checked');
    console.log($(this).is(':checked'));
});
</script>
=======
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script>
              var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {},
                  $checkboxes = $("#checkbox-container :checkbox");
              
              $checkboxes.on("change", function(){
                $checkboxes.each(function(){
                  checkboxValues[this.id] = this.checked;
                });
                
                localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
              });
              
              // On page load
              $.each(checkboxValues, function(key, value) {
                $("#" + key).prop('checked', value);
                console.log("#" + key);
              });
              </script>

>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
</html>
=======
<div class="card front">
  <div class="blue"></div>
  <div class="yellow"></div>
  <div class="pink"></div>
  <div class="dots"></div>
  <div class="personal-intro">
    <p>Krista Stone</p>
    <p>Photographer Maker Doer</p>
  </div>
</div>
<div class="card back">
  <div class="yellow"></div>
  <div class="top dots"></div>
  <div class="personal-info">
    <p>Krista Stone</p>
    <p>Photographer. Maker. Doer.</p>
    <p>123 Address St</p>
    <p>Sacramento, CA 14234</p>
    <p>567.890.1234</p>
    <p>www.kristastone.com</p>
    <p>@kristastone</p>
  </div>
  <div class="bottom dots"></div>
  <div class="pink"></div>
</div><script src="">
// Playing around with css grid, flexbox, clip-path, and radial-gradient

// Recreating the business card template as found here: https://novadonna.me/product/business-card-template-designs-pop-geometric/ 
</script>

@endsection
>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d
>>>>>>> b5ae5e6c8f48e1ff71e0a6939232efba95a82fd6
