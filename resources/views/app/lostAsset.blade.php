@extends('app.layout')  
@section('content')
    @if (\App\asset::all()->where('status',3)->isEmpty())
    <div class="card card-default">
        <div class="card-header" style="background-color: #ecf4fd">  
            <div class="text-center">
                <div class="h1 mt-4">
                    <div class="text-center">
                        Lost assets :
                    </div>
                </div>
            </div>
        </div>
            
        <div class="card-body">     
            <div class="text-center">
                <h2>
                    <br><br><br>
                    No Lost assets have been found !
                    <br><br><br><br>
                </h2>
            </div>
        </div>
    </div>
        @else
        <div  style="margin-left: 10%;margin-right: 10%" class="row">
          <div class="col">
              <div class="card shadow">
                  <div class="card-header border-0">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h3 class="mb-0">Lost Assets :</h3>
                          </div>
                          <div class="col-4 text-right">
                          
                          </div>
                      </div>
                  </div>
    
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead>
            <tr>
                <th scope="col">asset</th>
                <th  scope="col">block</th>
                <th scope="col">etage</th>
                <th scope="col">bureau</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>    
            </thead>    
            <tbody>
            @foreach($assets as $asset)
            @if ($asset->status==3)
            <tr>
              <td style="width: 16%"><h4 class="mb-0">{{$asset->name }}</h4></td>  
              <td style="margin: 5px;width: 16%"><h4 class="mb-0"> {{ $asset->bureau->block->name }}</h4></td>
              <td style="width: 16%"><h4 class="mb-0"> {{$asset->bureau->etage}}</h4></td>
              <td style="width: 16%"><h4 class="mb-0">{{$asset->bureau->name}}</h4></td>
            <td style="width: 14%" class="rep{{$asset->id}}">
            @if($asset->replaced)
            <label class="text-info">replaced.</label>
                @else
                <select class="form-control" name="" id="" onchange="replaceAsset(this.value,{{$asset->id}})">
                    <option value=0 disabled selected>replace</option>
                @foreach (\App\asset::all() as $item)
                    @if ($item->occupied = [0,2] && $item->status = [0,1] && $item->category == $asset->category)
                        <option value="{{$item->id}}">{{$item->name}}</option> 
                    @endif
                @endforeach
                </select>
  
                @endif
            </td>
        <td style="width: 25% " class="found{{$asset->id}}">@if($asset->replaced)
                    <select class="form-control" name="" id="" onchange="chooseBureau(this.value,{{$asset->id}})">
                        <option value=0 disabled selected>found !!</option>
                    @foreach (\App\bureau::all() as $item)
                        @if ($item->type == "Stock" && \App\bureau::find($asset->bureau_id)->id == $item->id)
                            <option value="{{$item->id}}">{{$item->name}}</option> 
                        @endif
                    @endforeach
                    </select>
                    @else
                    <button onclick="Found({{$asset->id}})" class="btn btn-info">found !!</button>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach    
            </tbody>
        </table>
       
    </div>

  </div>
 </div>  
</div>
@endif

<script>
    function replaceAsset(id,val){
    $.ajax({
     type:'get',
     url:'{!!URL::to('replaceAsset')!!}',
     data:{'id':id,'val':val},
     dataType:'json',
     success:function(data){

     console.log(data);
     $(".rep".concat(val)).empty(); 
    $(".rep".concat(val)).append('<label class="text-success">replaced.</label>');
    $(".found".concat(val)).empty(); 
    $(".found".concat(val)).append('<select class="form-control choose'+val+'" name="" id="" onchange=\"chooseBureau(this.value,'+val+')\"><option value=0 disabled selected>found !!</option></select>')
    $(".choose".concat(val)).empty();
    for(var i=0 ; i<data.length; i++){ 
    $(".choose".concat(val)).append('<option value='+data[1].id+'>'+data[1].name+'</option>');                                            
     }
     },
     error:function(){ 
     console.log('dsdsd');
     }
    })
    }

    function Found(id){
    $.ajax({
     type:'get',
     url:'{!!URL::to('Found')!!}',
     data:{'id':id},
     dataType:'json',
     success:function(data){

     console.log(data);
     $(".found".concat(id)).empty(); 
    $(".found".concat(id)).append('<label class="text-success">found.</label>');
    $(".rep".concat(id)).empty(); 
     
                                                
     },
     error:function(){ 
     console.log('dsdsd');
     }
    })
    }
 
    function chooseBureau(id,val){
    $.ajax({
     type:'get',
     url:'{!!URL::to('chooseBureau')!!}',
     data:{'id':id,'val':val},
     dataType:'json',
     success:function(data){

     console.log(data);
     
     $(".found".concat(val)).empty(); 
    $(".found".concat(val)).append('<label class="text-success">found.</label>');

     },
     error:function(){ 
     console.log('dsdsd');
     }
    })
    }

</script>

@endsection
