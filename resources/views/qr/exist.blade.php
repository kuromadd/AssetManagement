@extends('app.edit_layout') 
@section('content')

<style>

@import url(https://fonts.googleapis.com/css?family=Open+Sans);

*, *::before, *::after {
  box-sizing: border-box;
}

body {
  background: #FDFDFD;
  margin: 25px 0;
}

span.title {
  margin: 0 auto;
  color: #BBB;
  font-family: 'Open Sans', sans-serif;
  font-size: 0.85rem;
  text-align: center;
  display: block;
}

.basicBox, .swiggleBox, .checkBox {
  width: 130px;
  height: 65px;
  margin: 15px auto;
  color: #4274D3;
  font-family: 'Open Sans', sans-serif;
  font-size: 1.15rem;
  line-height: 65px;
  text-transform: uppercase;
  text-align: center;
  position: relative;
  cursor: pointer;
}

svg {
  position: absolute;
  top: 0;
  left: 0;
}
svg rect, svg path, svg polyline {
  fill: none;
  stroke: #4274D3;
  stroke-width: 1;
}

.basicBox:hover svg rect, .swiggleBox:hover svg path, .checkBox:hover svg polyline {
  stroke: #4274D3;
}

/* Basic Box */
svg rect {
  stroke-dasharray: 400, 0;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}
.basicBox:hover svg rect {
  stroke-width: 3;
  stroke-dasharray: 35, 245;
  stroke-dashoffset: 38;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}

/* Swiggle Box */
svg path {
  stroke-dasharray: 265, 0;
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  -ms-transition: all 1s ease-in-out;
  -o-transition: all 1s ease-in-out;
}
.swiggleBox:hover svg path {
  stroke-width: 3;
  stroke-dasharray: 0, 350;
  stroke-dashoffset: 20;
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  -ms-transition: all 1s ease-in-out;
  -o-transition: all 1s ease-in-out;
}

/* Check Box */
.checkBox {
  /* Add Padding Left To Center Text */
}
.checkBox svg {
  /* Presentation Purposes */
  margin-left: -10px;
}
.checkBox svg rect, .checkBox svg polyline {
  fill: none;
  stroke: #4274D3;
  stroke-width: 1;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}
.checkBox:hover svg rect {
  stroke-width: 2;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}
.checkBox:hover svg polyline {
  stroke-width: 2;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  -ms-transition: all 0.8s ease-in-out;
  -o-transition: all 0.8s ease-in-out;
}
.checkBox svg .button {
  stroke-dasharray: 400px, 0;
}
.checkBox:hover svg .button {
  stroke-dasharray: 0, 400px;
  stroke-dashoffset: 33px;
}
/* Check Mark Effect */
.box, .checkMark {
  opacity: 0;
}
.checkBox:hover .box {
  -webkit-animation: boxDisplay 0.2s forwards;
  -moz-animation: boxDisplay 0.2s forwards;
  -ms-animation: boxDisplay 0.2s forwards;
  -o-animation: boxDisplay 0.2s forwards;
  animation: boxDisplay 0.2s forwards;
  -webkit-animation-delay: 0.65s;
  -moz-animation-delay: 0.65s;
  -ms-animation-delay: 0.65s;
  -o-animation-delay: 0.65s;
  animation-delay: 0.65s;
}
.checkBox:hover .checkMark {
  -webkit-animation: checkDisplay 0.2s forwards;
  -moz-animation: checkDisplay 0.2s forwards;
  -ms-animation: checkDisplay 0.2s forwards;
  -o-animation: checkDisplay 0.2s forwards;
  animation: checkDisplay 0.2s forwards;
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  -ms-animation-delay: 1s;
  -o-animation-delay: 1s;
  animation-delay: 1s;
}
/* Check Box Display */
@-webkit-keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-moz-keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-ms-keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-o-keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@keyframes boxDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
/* Check Mark Display */
@-webkit-keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-moz-keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-ms-keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@-o-keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@keyframes checkDisplay {
  0% { opacity: 0; }
  100% { opacity: 1; }
}


a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}

</style>
<div class="row">
  <div class="col">
      <div class="card shadow" style="height: auto; width: 50%;margin-left:22% ">
          <div class="card-header border-0">
              <div class="row align-items-center">
                  <div class="col-8">
                  <h3 class="mb-0">{{$asset->name}}</h3>
                  </div>
              </div>
          </div>
          
    <div class="card-body">
      <a style="display: inline-block;margin: 9%" href="#">
        <div class="basicBox">
        damaged
       <svg width="130" height="65" viewBox="0 0 130 65" xmlns="http://www.w3.org/2000/svg">
         <rect x='0' y='0' fill='none' width='130' height='65'/>
       </svg>
     </div>
       </a><a style="display: inline-block;margin: 9%" href="#">
       <div class="basicBox">
          fine
         <svg width="130" height="65" viewBox="0 0 130 65" xmlns="http://www.w3.org/2000/svg">
           <rect x='0' y='0' fill='none' width='130' height='65'/>
         </svg>
       </div>
     </a>
 <hr>
    <div class="text-center">
        @if($asset->bureau_id)
        <a href="{{route('createTransfert',$asset->id)}}"><i class="fa fa-paper-plane fa-fw text-blue"></i></i> transfer &#160&#160&#160</a>
        @endif
        @if ($asset->category == 'vehicle')
            <a href="{{route('createMission',$asset->id)}}"><i class="fa fa-play fa-fw text-blue"></i></i> &#160&start mission</a> 
        @endif                                                                
      
      </div>

    
</div>

@endsection


