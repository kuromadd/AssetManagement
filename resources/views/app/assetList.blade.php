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
        table tr {
          padding: 5px;
          background:none;
        }
        
        tr.repair {
          background: rgb(176, 180, 184);
          font-family: cursive;
          color: #ddd
        }

        tr.lost {
          background: rgb(243,164,91);
          font-family: cursive;
          color: #ddd
        }

        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <form action="{{ route('save') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div  style="margin-left: 10%;margin-right: 10%" class="row">
          <div class="col">
              <div class="card shadow">
                  <div class="card-header border-0">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h3 class="mb-0">Assets</h3>
                          </div>
                          <div class="col-4 text-right">
                          <a href="{{route('reset')}}" class="btn btn-sm btn-primary">reset</a>
                          <button type="submit" class="btn btn-sm btn-primary">save</button>
                          </div>
                      </div>
                  </div>

      <div class="table-responsive">
        <table class="table align-items-center table-flush minha-table">
            <thead>
            <tr>
                <th  scope="col">Block</th>
                <th scope="col">Etage</th>
                <th scope="col">Bureau</th>
                <th scope="col">Asset</th>
                <th scope="col">repair</th>
                <th scope="col">lost</th>
            </tr>    
            </thead>    
            <tbody>
            @foreach($assets as $asset)
            @if ($asset->occupied==0)
            <tr 
            @if ($asset->repair)
                class="repair"
            @elseif ($asset->lost)
                class="lost"
            @endif>
              <td style="margin: 5px"><h4 class="mb-0"> B1</h4></td>
              <td style="width: 16%"><h4 class="mb-0"> E1</h4></td>
              <td style="width: 16%"><h4 class="mb-0">BR1</h4></td>
              <td style="width: 16%"><h4 class="mb-0">{{$asset->name }}</h4></td> 
            <td style="margin: 15%">
                <input type="checkbox" name="select.{{$asset->id}}[]" value="{{$asset->id}}"
                @if($asset->repair)
                checked 
                @endif id="box-1{{$asset->id}}" class="option-input checkbox">
            <label class="form-control-label"></label>   
                </td>
                <td >
                <input type="checkbox" name="select.{{$asset->id}}[]" value="{{$asset->id}}"
                    @if($asset->lost)
                    checked 
                    @endif id="box-2{{$asset->id}}" class="">
                <label class="form-control-label"></label>   
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
</form>
  <script>
      
    var $table = document.querySelector('.minha-table');
 $table.addEventListener("click", function(ev1){
  if (ev1.target.tagName == "INPUT") {
    if (!ev1.target.checked) {
    ev1.target.parentNode.parentNode.classList.remove("repair");
    } 
    if(ev1.target.tagName == "INPUT"){ 
    ev1.target.parentNode.parentNode.classList.remove("lost");
    }
  }
});

  </script>    

@endsection
