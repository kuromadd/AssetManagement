@extends('app.edit_layout')  
@section('content')
@if (\App\asset::all()->where('status',2)->isEmpty())
    <div  style="margin-left: 10%;margin-right: 10%" class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">No record of Damaged assets have been found . </h3>
                        </div>
                    </div>
                </div>
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
                              <h3 class="mb-0">damaged Assets</h3>
                          </div>
                         
                      </div>
                  </div>

      <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead>
            <tr>
                <th  scope="col">block</th>
                <th scope="col">etage</th>
                <th scope="col">bureau</th>
                <th scope="col">asset</th>
                <th scope="col"></th>
            </tr>    
            </thead>    
            <tbody>
            @foreach($assets as $asset)
            @if ($asset->status==2)
            <tr> 
              <td style="margin: 5px"><h4 class="mb-0">{{ $asset->bureau->block->name }}</h4></td>
              <td style="width: 16%"><h4 class="mb-0">{{$asset->bureau->etage}}</h4></td>
              <td style="width: 16%"><h4 class="mb-0">{{$asset->bureau->name}}</h4></td>
              <td style="width: 16%"><h4 class="mb-0">{{$asset->name }}</h4></td> 
            <td ><a href="{{route('createReparation',['id'=>$asset->id])}}" class="btn btn-sm btn-info">repair</a></td>
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
@endsection
