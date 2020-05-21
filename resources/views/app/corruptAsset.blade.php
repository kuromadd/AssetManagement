@extends('app.edit_layout')  
@section('content')

        <div  style="margin-left: 10%;margin-right: 10%" class="row">
          <div class="col">
              <div class="card shadow">
                  <div class="card-header border-0">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h3 class="mb-0">Corrupt Assets</h3>
                          </div>
                         
                      </div>
                  </div>

      <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead>
            <tr>
                <th  scope="col">Block</th>
                <th scope="col">Etage</th>
                <th scope="col">Bureau</th>
                <th scope="col">Asset</th>
                <th scope="col"></th>
            </tr>    
            </thead>    
            <tbody>
            @foreach($assets as $asset)
            @if ($asset->repair==0)
            <tr> 
              <td style="margin: 5px"><h4 class="mb-0"> B1</h4></td>
              <td style="width: 16%"><h4 class="mb-0"> E1</h4></td>
              <td style="width: 16%"><h4 class="mb-0">BR1</h4></td>
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

@endsection
