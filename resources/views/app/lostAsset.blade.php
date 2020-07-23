@extends('app.edit_layout')  
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
              <td style="margin: 5px"><h4 class="mb-0"> {{ $asset->bureau->block->name }}</h4></td>
              <td style="width: 16%"><h4 class="mb-0"> {{$asset->bureau->etage}}</h4></td>
              <td style="width: 16%"><h4 class="mb-0">{{$asset->bureau->name}}</h4></td>
            <td class="rep">
            @if($asset->replaced == 0)
               
                <select class="form-control" name="" id="" onchange="replaceAsset(this.value,{{$asset->id}})">
                    <option value=0 disabled selected>replace</option>
                @foreach (\App\asset::all() as $item)
                    @if ($item->occupied == [0,2] && $item->status = [0,1] && $item->category === $asset->category)
                        <option value="{{$item->id}}">{{$item->name}}</option> 
                    @endif
                @endforeach
                </select>
  
                @else
                <label class="text-info">replaced.</label>
                @endif
            </td>
            <td ><a href="" class="btn btn-sm btn-success">found !!</a></td>
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
     
                                                
     },
     error:function(){ 
     console.log('dsdsd');
     }
    })
    }
</script>

@endsection
