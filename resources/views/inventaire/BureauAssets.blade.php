@extends('app.edit_layout')  
@section('content')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

        <div  style="margin-left: 10%;margin-right: 10%" class="row">
          <div class="col">
              <div class="card shadow">
                  
            
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
            @foreach($data as $asset)
            @if ($asset->bureau_id)
            <tr class="checks">
            <td style="margin: "><h4 class="mb-0">{{ $asset->bureau->block->name }}</h4></td>
              <td style="width: "><h4 class="mb-0"> {{$asset->bureau->etage}} </h4></td>
            <td style="width: "><h4 class="mb-0">{{$asset->bureau->name}}</h4></td>
              <td style="width: "><h4 class="mb-0">{{$asset->name }} </h4></td> 
              
              <td >    
                <input type="checkbox" style="width: 16px;height: 16px;" @if((\App\asset::find($asset->id)->selectInv && \App\asset::find($asset->id)->status == 1)) checked @endif name="fine[]" class="subject-list{{$asset->id}} " value="{{ $asset->id }} " id="option1{{$asset->id}}">
             
                </td>
              <td >
                <input type="checkbox" style="width: 16px;height: 16px;" @if((\App\asset::find($asset->id)->selectInv && \App\asset::find($asset->id)->status == 2)) checked @endif name="repair[]" class="subject-list{{$asset->id}} " value="{{ $asset->id }}" id="option2{{$asset->id}}">
               
                </td>
                <td >
                <input type="checkbox" style="width: 16px;height: 16px;" @if((\App\asset::find($asset->id)->selectInv && \App\asset::find($asset->id)->status == 3)) checked @endif name="lost[]" class="subject-list{{$asset->id}} " value="{{ $asset->id }}" id="option3{{$asset->id}}">
                </td>
            </tr>
    
            @endif
            <script type="text/javascript">
      
              $('.subject-list'.concat(<?php echo json_encode($asset->id); ?>)).on('change', function() {
                $('.subject-list'.concat(<?php echo json_encode($asset->id); ?>)).not(this).prop('checked', false);  
            });
          
            </script>
            
            <script type="text/javascript">
              $('.subject-list'.concat(<?php echo json_encode($asset->id); ?>)).on('change', function() {
                var asset_id=$(this).val();
                var div=$(this).parent();
              var op="";
              if($('#option1'.concat(<?php echo json_encode($asset->id); ?>)).is(':checked')){ 
              $.ajax({
                type:"get",
                url:'{!!URL::to('checkfine')!!}',
                data:{'id':asset_id},
                dataType:'json',
                success:function(data){
                  if (data) {
                    console.log('fine'); 
                      }      
                  },                                     
              })
                }else if($('#option2'.concat(<?php echo json_encode($asset->id); ?>)).is(':checked')){ 
              $.ajax({
                type:"get",
                url:'{!!URL::to('checkdamaged')!!}',
                data:{'id':asset_id},
                dataType:'json',
                success:function(data){
                  if (data) {
                    console.log('dammm'); 
                      }      
                  },                                     
              })
              }else if($('#option3'.concat(<?php echo json_encode($asset->id); ?>)).is(':checked')){ 
              $.ajax({
                type:"get",
                url:'{!!URL::to('checklost')!!}',
                data:{'id':asset_id},
                dataType:'json',
                success:function(data){
                  if (data) {
                    console.log('lost'); 
                      }      
                  },                                     
              })
              }else{
                $.ajax({
                type:"get",
                url:'{!!URL::to('uncheckAsset')!!}',
                data:{'id':asset_id},
                dataType:'json',
                success:function(data){
                  if (data) {
                    console.log('uncheck'); 
                      }      
                  },                                     
              })
              }
              }); 
            </script>
            @endforeach
                                     
            </tbody>
        
     
          </div>
          
        </table>
         
    </div>

  </div>
 </div>  
</div>


        
@endsection
