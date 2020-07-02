@extends('app.edit_layout')  
@section('content')

<<<<<<< HEAD
<<<<<<< HEAD

=======
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
=======
>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d
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
                          <a href="{{route('reset',['id',0])}}" class="btn btn-sm btn-primary">reset</a>
                          <button type="submit" class="btn btn-sm btn-primary">finish</button>
                          </div>
                      </div>
                  </div>
<<<<<<< HEAD

=======
                    <ul style="display: inline-block">
                      <li>
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
                    <label for="block_d">next block</label>
                    <select class="form-control blockID" name="block_d">
                        <option value="0" disabled selected>--Select--</option>
                        @foreach(\App\block::all() as $block)
                    <option value="{{$block->id}}">{{ $block->name }}</option>
                        @endforeach
                    </select>
<<<<<<< HEAD

                    <label for="etage_d" >next etage</label>
                       <select class="form-control NbEtage" name="etage_d" id="etage_d">                           
                        
                       </select>

                    <label for="bureau_d">next bureau</label>
                    <select class="form-control NBureau " name="bureau_d" id="bureau_d">                           
                        
                    </select>
=======
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
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
      <div class="table-responsive">
        
        <table class="table align-items-center table-flush " id="tableInv">
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
<<<<<<< HEAD
            @foreach($assets as $asset)
            @if ($asset->bureau_id && $asset->status = [0,1,2])
<<<<<<< HEAD
            <tr>
=======
            <tr id="checkbox-container">
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
            <td style="margin: "><h4 class="mb-0">{{ $asset->bureau->block->name }}</h4></td>
              <td style="width: "><h4 class="mb-0"> {{$asset->bureau->etage}} </h4></td>
            <td style="width: "><h4 class="mb-0">{{$asset->bureau->name}}</h4></td>
              <td style="width: "><h4 class="mb-0">{{$asset->name }}</h4></td> 
              
              <td >
                <input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" class="subject-list{{$asset->id}} " value="{{ $asset->id }} " id="option1{{$asset->id}}">
             
                </td>
              <td >
                <input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" class="subject-list{{$asset->id}} " value="{{ $asset->id }}" id="option2{{$asset->id}}">
               
                </td>
                <td >
                <input type="checkbox" style="width: 16px;height: 16px;" name="lost[]" class="subject-list{{$asset->id}} " value="{{ $asset->id }}" id="option3{{$asset->id}}">
                </td>
            </tr>

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
            @endif
            <script type="text/javascript">
      
              $('.subject-list'.concat(<?php echo json_encode($asset->id); ?>)).on('change', function() {
                $('.subject-list'.concat(<?php echo json_encode($asset->id); ?>)).not(this).prop('checked', false);  
            });
          
            </script>
            @endforeach
<<<<<<< HEAD
=======
            
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
=======
             
           
>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d
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
<<<<<<< HEAD
                                                    
                                                    $("#tableInv").empty(); 
                                                 for(var i=0 ; i<list[1].length ; i++){
<<<<<<< HEAD
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"></td></tr>');
=======
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
                                                  }
                                            
=======

>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d
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
                                     success:function(data){                                       //if(('+list[5][i]+' && '+list[6][i]+' == 1)) checked endif  

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
<<<<<<< HEAD
                                      
                                         
                                      $("#tableInv").empty(); 
                                            for(var i=0 ; i<list[1].length ; i++){
<<<<<<< HEAD
                                            $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"></td></tr>');
=======
                                            $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
                                          }
                                            
=======
                                                                   
>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d
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
                                      var fine='{!!URL::to('checkfine')!!}';
                                      var damage='{!!URL::to('checkdamaged')!!}';
                                      var lost='{!!URL::to('checklost')!!}';
                                      var uncheck='{!!URL::to('uncheckAsset')!!}';
                                      list[0]=data[1];list[1]=data[2];list[2]=data[3];list[3]=data[4];list[4]=data[5];list[5]=data[6];list[6]=data[7]
                                     
                                      if (data) {
                                      console.log(fine);
                                         
                                      $("#tableInv").empty(); 
<<<<<<< HEAD
                                            for(var i=0 ; i<list[1].length ; i++){
<<<<<<< HEAD
                                            $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"></td></tr>');
=======
                                            $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
                                          }
=======
                                      for(var i=0 ; i<list[1].length ; i++){
                                                  console.log(list[6][i]);
                                                  if((list[6][i]['status']==1 && list[5][i] == 1)){
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" checked  onchange="uncheck('+list[4][i]+')" name="fine[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" onchange="checkdamaged('+list[4][i]+')" name="repair[]" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" onchange="checklost('+list[4][i]+')" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');//var asset_id=$(this).val();var div=$(this).parent();var op="";if($(\'#option1\'.concat('+list[4][i]+')).is(\':checked\')){ $.ajax({type:"get",url:'+fine+',data:{\'id\':asset_id},dataType:\'json\',success:function(data){if (data) {console.log(\'fine\');}},})}else if($(\'#option2\'.concat($(this).val())).is(\':checked\')){ $.ajax({type:"get",url:'+damage+',data:{\'id\':asset_id},dataType:\'json\',success:function(data){if (data) {console.log(\'dammm\'); }},})}else if($(\'#option3\'.concat($(this).val()).is(\':checked\')){$.ajax({type:"get",url:'+lost+',data:{\'id\':asset_id},dataType:\'json\',success:function(data){if (data) {console.log(\'lost\');}},})}else{$.ajax({type:"get",url:'+uncheck+',data:{\'id\':asset_id},dataType:\'json\',success:function(data){if (data) {console.log(\'uncheck\');}},})}})
                                                  }else if((list[6][i]['status']==2 && list[5][i] == 1)){
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" onchange="checkfine('+list[4][i]+')" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" checked name="repair[]" onchange="uncheck('+list[4][i]+')" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" onchange="checklost('+list[4][i]+')" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
                                                  }else if((list[6][i]['status']==3 && list[5][i] == 1)){
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" onchange="checkfine('+list[4][i]+')" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" onchange="checkdamaged('+list[4][i]+')" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" checked onchange="uncheck('+list[4][i]+')" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
                                                  }else{
                                                  $("#tableInv").append('<tr><td style="margin: "><h4 class="mb-0"> '+ list[0][i]+'</h4></td><td style="width: "><h4 class="mb-0">  '+ list[1][i]+'</h4></td><td style="width: "><h4 class="mb-0"> '+ list[2][i]+'</h4></td><td style="width: "><h4 class="mb-0">'+list[3][i]+'</h4></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" onchange="checkfine('+list[4][i]+')" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'"id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" onchange="checkdamaged('+list[4][i]+')" class="subject-list'+list[4][i]+' " value="'+list[4][i]+'" id="option'+list[4][i]+'"></td><td ><input type="checkbox" style="width: 16px;height: 16px;" onchange="checklost('+list[4][i]+')" name="lost[]" class="subject-list'+list[4][i]+'" value="'+list[4][i]+'" id="option'+list[4][i]+'"></td></tr><script type="text/javascript">$(\'.subject-list\'.concat('+list[4][i]+')).on(\'change\', function() {$(\'.subject-list\'.concat('+list[4][i]+')).not(this).prop(\'checked\', false);});<'+'/script>');
                                                  } 
                                                }
>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d
                                            
                                          }      
                                                
                                      },                                     
                                      error:function(){ 
                                        console.log('ewewewe');
                                     }
                                   })
                                 });
                                 });  
                           
                            </script>  
<<<<<<< HEAD
<<<<<<< HEAD
                                                              
=======
=======
                            <script src="/bower_components/persistencejs/lib/persistence.js"></script>
                            <script src="/bower_components/persistencejs/lib/persistence.store.sql.js"></script>
                            <script src="/bower_components/persistencejs/lib/persistence.store.websql.js"></script>
                            <script type="text/javascript">
                              function checkfine(id) {
                                
                              connection.query('UPDATE assets SET name = ? WHERE id = ?', ['khh', id]);

                             }
                             function checkdamaged(id) {
                                 let url = "{{ route('checkdamaged',':id') }}";
                                 url = url.replace(':id', id);
                                 document.location.href=url;
                             }
                             function checklost(id) {
                                 let url = "{{ route('checklost',':id') }}";
                                 url = url.replace(':id', id);
                                 document.location.href=url;
                             }
                             function uncheck(id) {
                                 let url = "{{ route('uncheckAsset',':id') }}";
                                 url = url.replace(':id', id);
                                 document.location.href=url;
                             }
                             </script>
>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d
                                     
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
            </tbody>
        
     
          </div>
          
        </table>
         
    </div>

  </div>
 </div>  
</div>
</form>

        
@endsection
