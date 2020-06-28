@extends('app.edit_layout')  
@section('content')

    <style>
      /*
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
          
        .boxes {
          margin: auto;
          padding: 50px;
          background: #484848;
        }
        
        /*Checkboxes styles
        input[type="checkbox"] { display: none; }
        
        input[type="checkbox"] + label {
          display: block;
          position: relative;
          padding-left: 35px;
          margin-bottom: 20px;
          font: 14px/20px 'Open Sans', Arial, sans-serif;
          color: #ddd;
          cursor: pointer;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
        }
        
        input[type="checkbox"] + label:last-child { margin-bottom: 5%; }
        
        input[type="checkbox"] + label:before {
          content: '';
          display: block;
          width: 20px;
          height: 20px;
          border: 1px solid #020708;
          position: absolute;
          left: 0;
          top: 0;
          opacity: .6;
          -webkit-transition: all .12s, border-color .08s;
          transition: all .12s, border-color .08s;
        }
        
        input[type="checkbox"]:checked + label:before {
          width: 10px;
          top: -5px;
          left: 5px;
          border-radius: 0;
          opacity: 1;
          border-top-color: transparent;
          border-left-color: transparent;
          -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
        }
        */

        </style>
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
                          <button type="submit" class="btn btn-sm btn-primary">store</button>
                          </div>
                      </div>
                  </div>

      <div class="table-responsive">
        
        <table class="table align-items-center table-flush minha-table">
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
            @foreach($assets as $asset)
            @if ($asset->bureau_id && $asset->status = [0,1,2])
            
            <tr>
            <td style="margin: "><h4 class="mb-0">{{ $asset->bureau->block->name }}</h4></td>
              <td style="width: "><h4 class="mb-0"> {{$asset->bureau->etage}} </h4></td>
            <td style="width: "><h4 class="mb-0">{{$asset->bureau->name}}</h4></td>
              <td style="width: "><h4 class="mb-0">{{$asset->name }}</h4></td> 
              
              <td >
                <input type="checkbox" style="width: 16px;height: 16px;" name="fine[]" class="subject-list{{$asset->id}} " value="{{ $asset->id }}">
             
                </td>
              <td >
                <input type="checkbox" style="width: 16px;height: 16px;" name="repair[]" class="subject-list{{$asset->id}} " value="{{ $asset->id }}">
               
                </td>
                <td >
                <input type="checkbox" style="width: 16px;height: 16px;" name="lost[]" class="subject-list{{$asset->id}} " value="{{ $asset->id }}">
                  
                </td>
            </tr>
                
            @endif
            <script type="text/javascript">
      
              $('.subject-list'.concat(<?php echo json_encode($asset->id); ?>)).on('change', function() {
                $('.subject-list'.concat(<?php echo json_encode($asset->id); ?>)).not(this).prop('checked', false);  
            });
          
            </script>
            @endforeach    
            </tbody>
        </table>
         
    </div>

  </div>
 </div>  
</div>
</form>

        
@endsection
