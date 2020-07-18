@extends('app.edit_layout') 
@section('content')

    <div class="card card-default">
        <div class="card-header">  
              <div class="col-8">
              <h3 class="mb-0">Asset : <b class="text-blue"> {{$asset->name}} </b></h3>
              </div>
          </div>
      
  <div class="card-body">

      <div class="form-group">
          <label class="form-control-label" for="name">&#160&#160Name</label>
          <input type="text" name="name" disabled value="{{$asset->name}}" class="form-control form-control">
      </div>

      <div class="form-group">
          <label for="description" class="form-control-label"> &#160&#160Description </label>
          <textarea class="form-control" name="description" id="description" disabled cols="4" rows="4">{{$asset->description}}</textarea>
      </div>
  
      <div class="form-group">
          <label class="form-control-label" for="prix">&#160&#160price</label>
          <input type="text" name="prix" disabled value="{{$asset->prix}}" class="form-control form-control">
      </div>
      <div class="form-group">
        <label for="category" class="form-control-label">&#160&#160category</label>
        <select name="category" id="category" disabled class="form-control form-control">
          <option value="furniture" @if ($asset->category == 'furniture') selected @endif >furniture and fixtures</option>
          <option value="intangible" @if($asset->category == 'intangible') selected @endif>intangible assets</option>
          <option value="office" @if($asset->category == 'office') selected @endif>office equipement</option>
          <option value="vehicle" @if($asset->category == 'vehicle') selected @endif>vehicle</option>
          <option value="software" @if($asset->category == 'software') selected @endif>software</option>
          <option value="building" @if($asset->category == 'building') selected @endif>building</option>

        </select>
      </div>
     
      <div class="form-group">
        <label for="date" class="form-control-label">&#160&#160mis en service a :</label>
        <input type="date" name="dateservice" id="dateservice" disabled value="{{ $asset->dateService }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="duree" class="form-control-label">&#160&#160duree de vie</label>
      <input  type="text" name="duree" disabled value="{{ $asset->duree_vie }}" class="form-control form-control">
      </div>

      <div class="form-group">

            <label for="fournisseur_id">Fournisseur</label>
                    <select class="form-control" disabled name="fournisseur_id" id="fournisseur_id">
                        @foreach(\App\Fournisseur::all() as $fournisseur)
                    <option value="{{ $fournisseur->id }}"
                        @if ($fournisseur_id ?? ''== $asset->fournisseur_id)
                        selected
                    @endif
                        >{{$fournisseur->libel}}</option>
                        @endforeach
                    </select>
            
        </div>        
<script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.js"></script>
<script language="javascript">
    function printdiv(printpage)
    {
    var headstr = "<html><head><title></title></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(printpage).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = headstr+newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return false;
    }
    </script>
    <style>


.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
    </style>
<div class="row">
<div class="column" id="div_print">
<div style="margin-left:33%" id="qrcode"></div>
</div>
<div class="column">
<input style="margin-top:32%" name="b_print" type="button" class="ipt" style="margin-left: 35%" onClick="printdiv('div_print');" value=" Print ">    
</div>
</div>
<script>

    var userInput = <?php echo json_encode($asset->qrcode); ?>

    var qrcode = new QRCode("qrcode", {
        text: userInput,
        width: 200,
        height: 200,
        colorDark: "black",//#5e72e4
        colorLight: "white",
        correctLevel: QRCode.CorrectLevel.H
    });
    
   
</script>

        <label >Transfert history </label><br>
            
        @if (\App\Transfert::all()->where('asset_id', $asset->id)->isEmpty())
            No transfert history has been detected .
         @else
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
              <thead class="thead-light">
                  <tr>
                      <th scope="col">P-block</th>
                      <th scope="col">P-etage</th>
                      <th scope="col">P-bureau</th>
                      <th scope="col">transfered at</th>
                      <th scope="col">next block</th>
                      <th scope="col">next etage</th>
                      <th scope="col">next bureau</th>

                  </tr>
              </thead>
              <tbody>
              
              @foreach(\App\Transfert::all()->where('asset_id', $asset->id) as $transfert)
              <tr>
                  <td>{{$transfert->block_c}}</td>
                  <td>{{$transfert->etage_c}}</td>
                  <td>{{$transfert->bureau_c}}</td>
                  <td>{{$transfert->transfered_at}}</td>
                  <td>{{$transfert->block_d}}</td>
                  <td>{{$transfert->etage_d}}</td>
                  <td>{{\App\bureau::find($transfert->bureau_d)->name}}</td>
                  
                  
              </tr>
              
              @endforeach    
              </tbody>
          </table>
      </div>
      @endif




      <div class="text-center">
        <a href="{{route('createTransfert',$asset->id)}}"><i class="fa fa-paper-plane fa-fw text-blue"></i></i> transfer &#160&#160&#160</a>
        @if ($asset->category == 'vehicle')
            <a href="{{route('createMission',$asset->id)}}"><i class="fa fa-play fa-fw text-blue"></i></i> &#160&start mission</a> 
        @endif                                                                
      </div>
</div>
</div>

@endsection