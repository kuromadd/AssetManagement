@extends('app.edit_layout')  

@section('content')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <form action="{{ route('storeInventaire') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div  style="margin-left: 10%;margin-right: 10%" class="row">
          <div class="col">
              <div class="card shadow">
                  <div class="card-header border-0">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h3 class="mb-0">Inventaire</h3>
                          </div>
                          
                          <div class="col-4 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('scan') }}">Scan !!</a>  
                          <a href="{{route('reset',['id',0])}}" class="btn btn-sm btn-primary">reset</a>
                          <button type="submit" class="btn btn-sm btn-primary">finish</button>
                          </div>
                      </div>
                  </div>
                    <ul style="display: inline-block">
                      <li>
                    <label for="block_d">next block</label>
                    <select class="form-control blockID" name="block_d">
                        <option value="0" disabled selected>--Select--</option>
                        @foreach(\App\block::all() as $block)
                    <option value="{{$block->id}}">{{ $block->name }}</option>
                        @endforeach
                    </select>
                  </li><li>
                    <label for="etage_d" >next etage</label>
                       <select class="form-control NbEtage" name="etage_d" id="etage_d">                           
                       </select>
                      </li><li>
                    <label for="bureau_d">next bureau</label>
                    <select class="form-control NBureau " name="bureau_d" id="bureau_d">                           
                    </select>
                  </li>
                  </ul>
      <div class="table-responsive">
        
        <table class="table align-items-center table-flush " style="width: 50%;" id="tableInv">
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
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
              <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">//for selecting one checkAT TIME</script>
             
           
            <script type="text/javascript"> 
                                 $(document).ready(function(){
                                 $(document).on('change','.blockID',function(){
                                   var block_id=$(this).val();
                                   var div=$(this).parent();
                                 
                                   $.ajax({
                                     type:'get',
                                     url:'{!!URL::to('EtageInv')!!}',
                                     data:{'id':block_id},
                                     dataType:'json',
                                     success:function(data){

                                     if (data) {
                                      console.log(data);
                                             $("#etage_d").empty();
                                             $("#etage_d").append('<option selected disabled >Select etage</option>');
                                             
                                             
                                                 for(var i=data['sous'] ; i<=data['nbre_Etage'] ; i++){  
                                                  $("#etage_d").append('<option value="'+i+'">'+i+'</option>')
                                                    }

                                          }      
                                                
                                     },
                                     error:function(){ 
                                      console.log('dsdsd');
                                     }
                                   })
                                 });
                                 });
                                 $(document).ready(function(){
                                 $(document).on('change','.NbEtage',function(){
                                   
                                   var etage=$(this).val();
                                   var div=$(this).parent();
                                   var op="";
                                   $.ajax({
                                     type:'get',
                                     url:'{!!URL::to('BureauInv')!!}',
                                     data:{'id':etage},
                                     dataType:'json',
                                     success:function(data){                                  

                                      var bureaus=[];
                                      bureaus=data;
                                      if (data) {
                                        console.log(bureaus);
                                        $("#bureau_d").empty();
                                             $("#bureau_d").append('<option selected disabled >choose bureau</option>');
                                             
                                            
                                             bureaus.forEach(mFunction);
                                             function mFunction(item) {
                                                $("#bureau_d").append('<option value="'+item.id+'">'+item.name+'</option>')
                                            }
                                                                   
                                          }      
                                                
                                      },                                     
                                      error:function(){ 
                                     }
                                   })
                                 });
                                 });
                                 $(document).ready(function(){
                                 $(document).on('change','.NBureau',function(){
                                   
                                   var bureau_id=$(this).val();
                                   var div=$(this).parent();
                                   var op="";
                                   $.ajax({
                                     type:'get',
                                     url:'{!!URL::to('AssetInv')!!}',
                                     data:{'id':bureau_id},
                                     dataType:'json',
                                     success:function(data){
                                      var list=[];
                                      
                                      list[0]=data[1];list[1]=data[2];list[2]=data[3];list[3]=data[4];list[4]=data[5];list[5]=data[6];
                                     
                                      if (data) {
                                      console.log(data);
                                         
                                      $("#tableInv").empty(); 
                                      for(var i=0 ; i<list[4].length ; i++){
                                                  console.log(list[5][i]);
                                                  if((list[5][i] && list[5][i]['status']==1)){
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" checked  onchange="uncheck('+list[4][i]+')" name="fine[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" onchange="checkdamaged('+list[4][i]+')" name="repair[]" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" onchange="checklost('+list[4][i]+')" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');//var asset_id=$(this).val();var div=$(this).parent();var op="";if($(\'#option1\'.concat('+list[4][i]+')).is(\':checked\')){ $.ajax({type:"get",url:'+fine+',data:{\'id\':asset_id},dataType:\'json\',success:function(data){if (data) {console.log(\'fine\');}},})}else if($(\'#option2\'.concat($(this).val())).is(\':checked\')){ $.ajax({type:"get",url:'+damage+',data:{\'id\':asset_id},dataType:\'json\',success:function(data){if (data) {console.log(\'dammm\'); }},})}else if($(\'#option3\'.concat($(this).val()).is(\':checked\')){$.ajax({type:"get",url:'+lost+',data:{\'id\':asset_id},dataType:\'json\',success:function(data){if (data) {console.log(\'lost\');}},})}else{$.ajax({type:"get",url:'+uncheck+',data:{\'id\':asset_id},dataType:\'json\',success:function(data){if (data) {console.log(\'uncheck\');}},})}})
                                                  }else if((list[5][i] && list[5][i]['status']==2)){
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" onchange="checkfine('+list[4][i]+')" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" checked name="repair[]" onchange="uncheck('+list[4][i]+')" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" onchange="checklost('+list[4][i]+')" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
                                                  }else if((list[5][i] && list[5][i]['status']==3)){
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" onchange="checkfine('+list[4][i]+')" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" onchange="checkdamaged('+list[4][i]+')" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" checked onchange="uncheck('+list[4][i]+')" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
                                                  }else{
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" onchange="checkfine('+list[4][i]+')" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" onchange="checkdamaged('+list[4][i]+')" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" onchange="checklost('+list[4][i]+')" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
                                                  } 
                                                }
                                            
                                          }      
                                                
                                      },                                     
                                      error:function(){ 
                                        console.log('ewewewe');
                                     }
                                   })
                                 });
                                 });  
                           
                            </script>  
                           
                            <script type="text/javascript">
                              function checkfine(id) {
                                $.ajax({
                                     type:'get',
                                     url:'{!!URL::to('checkfine')!!}',
                                     data:{'id':id},
                                     dataType:'json',
                                     success:function(data){
                                    console.log(data);
                                    },                                     
                                      error:function(){ 
                                        console.log('awda');
                                     }
                                   })
                             }
                             function checkdamaged(id) {
                              $.ajax({
                                     type:'get',
                                     url:'{!!URL::to('checkdamaged')!!}',
                                     data:{'id':id},
                                     dataType:'json',
                                     success:function(data){
                                    console.log(data);
                                    },                                     
                                      error:function(){ 
                                     }
                                   })
                             }
                             function checklost(id) {
                              $.ajax({
                                     type:'get',
                                     url:'{!!URL::to('checklost')!!}',
                                     data:{'id':id},
                                     dataType:'json',
                                     success:function(data){
                                    console.log(data);
                                    },                                     
                                      error:function(){ 
                                     }
                                   })
                             }
                             function uncheck(id) {
                              $.ajax({
                                     type:'get',
                                     url:'{!!URL::to('uncheckAsset')!!}',
                                     data:{'id':id},
                                     dataType:'json',
                                     success:function(data){
                                    console.log(data);
                                    },                                     
                                      error:function(){ 
                                     }
                                   })
                             }
                             </script>
                                     
            </tbody>
        
     
          </div>
          
        </table>
         
    </div>
 
  </div>
  
 </div>
   
</div>

</form>
<style>
canvas {
  display: none;
}
hr {
  margin-top: 32px;
}
input[type="file"] {
  display: block;
  margin-bottom: 16px;
}
div {
  margin-bottom: 16px;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style type="text/css">
#results { padding:20px; border:1px solid; background:#ccc; }
.Camera {
width: 320px;
height: 240px;
border: 1px solid black;
}

</style>
<div class="card shadow" style="height: auto; width: 67%;margin-left:14% ">
          
  <div>
      <video style="width: 100%;height: auto;" muted playsinline id="qr-video"></video>
  </div>
  
  

  
  <b>Detected QR code: </b>
  <span id="cam-qr-result">None</span>
  <br>
  <b>Last detected at: </b>
  <span id="cam-qr-result-timestamp"></span>


</div>



<script type="module">
import QrScanner from "/qr-scanner.min.js";
QrScanner.WORKER_PATH = '/qr-scanner-worker.min.js';

const video = document.getElementById('qr-video');
const camHasCamera = document.getElementById('cam-has-camera');
const camQrResult = document.getElementById('cam-qr-result');
const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');


function setResult(label, result) {
  label.textContent = result;
  camQrResultTimestamp.textContent = new Date().toString();
  label.style.color = 'teal';
  clearTimeout(label.highlightTimeout);
  label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
  let url = "{{ route('existInv', ':qrcode') }}";
  url = url.replace(':qrcode', result);
  document.location.href=url;
}

// ####### Web Cam Scanning #######

QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);

const scanner = new QrScanner(video, result => setResult(camQrResult, result));
scanner.start();

document.getElementById('inversion-mode-select').addEventListener('change', event => {
  scanner.setInversionMode(event.target.value);
});


</script>
        
@endsection
