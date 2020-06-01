@extends('app.edit_layout')
@section('content')
<style>
    .row {
  display: flex;
  flex-wrap: wrap;
  padding: 0 4px;
  }
  
  
  @media screen and (max-width:600px) {
  .column {
  flex: 100%;
  max-width: 100%;
  }
  }
  .img{
  height:auto; width:10%;
  }
  </style>
            <div class="card card-default">
                  <div class="card-header" >  
                   add a new Transfert
                </div>
                <form action="{{ route('transfert.store') }}" method="post" enctype="multipart/form-data">
                
                    {{ csrf_field() }}
                <div class="row" style="float: left;width: 100%;">
                    
                    <div class="column" style="height: auto;width: 50%;">
                     
                        <div class="card-body">
                            <div class="form-group">
                            <label for="Asset_id">Asset</label>
                                <select class="form-control assetID" name="asset_id" id="asset_id">
                                    <option value="0" disabled selected>-Select-</option>
                                    @foreach(\App\Asset::all() as $asset)
                                    @if ($asset->bureau_id)
                                    
                                <option value="{{ $asset->id }}"
                                   @if( $_GET["id"] && $asset->id == $_GET["id"])
                                    selected
                                @endif>{{$asset->name}}</option>
                    
                                @endif
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group" id="current_b">
                                <label for="block_c">current block</label>
                                <input type="text" name="block_c" class="form-control">
                            </div>
        
                            <div class="form-group" id="current_et">
                                <label for="etage_c">current etage</label>
                                <input type="text" name="etage_c" class="form-control">
                           </div>
        
                            <div class="form-group" id="current_br">
                                <label for="bureau_c">current bureau</label>
                                <input type="text" name="bureau_c"  class="form-control">
                            </div>
    
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
                    <script type="text/javascript"> 
                      $(document).ready(function(){
                      $(document).on('change','.assetID',function(){
                        
                        var asset_id=$(this).val();
                        var div=$(this).parent();
                        var op="";
                        $.ajax({
                          type:'get',
                          url:'{!!URL::to('getAsset')!!}',
                          data:{'id':asset_id},
                          dataType:'json',
                          
                          success:function(data){
                              console.log(data);
                            if(data[1])
                              {
                                  $("#current_b").empty();
                                  $("#current_b").append('<div class="form-group"><label for="block_c">current block</label><input type="text" name="block_c" id="current_b" value="'+data[1]+'" class="form-control"></div> ');
                                  $("#current_et").empty();
                                  $("#current_et").append('<div class="form-group"><label for="etage_c">current etage</label><input type="text" name="etage_c" id="current_et" value="'+data[2]+'" class="form-control"></div> ');
                                  $("#current_br").empty();
                                  $("#current_br").append('<div class="form-group"><label for="bureau_c">current bureau</label><input type="text" name="block_c" id="current_br" value="'+data[3]+'" class="form-control"></div> ');
                              }
                        },
                          error:function(){ 
  
                          }
                        })
                      });
                      });
                    </script>

                    </div>
                    
        
                    <div class="column" style="height: auto;width: 50%;">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="transfered_at">date de transfert</label>
                                <input type="date" value="{{date("Y-m-d")}}" name="transfered_at" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="block_d">next block</label>
                                <input type="text" name="block_d" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label for="etage_d">next etage</label>
                                <input type="text" name="etage_d" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label for="bureau_d">next bureau</label>
                                <input type="text" name="bureau_d" class="form-control">
                            </div>
        
        
                            
                            <div class="text-center">
                            <button class="btn btn-info" type="submit">store</button>    
                            </div> 
                        
                    
                        
                    </div>
        
                      
                    
                    </div>
                    
                </div>              
        </form>
    </div>
    @endsection



