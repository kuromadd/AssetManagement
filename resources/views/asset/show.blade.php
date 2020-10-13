@extends('app.layout')
@section('content')

<div class="row">
    <div class="col">     
        <div class="card shadow" style="width:80%;margin-left:10%;padding:3%">
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active h3" id="assinf-tab" data-toggle="tab" href="#assinf" role="tab" aria-controls="assinf" aria-selected="true">Asset informations</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link h3" id="asstra-tab" data-toggle="tab" href="#asstra" role="tab" aria-controls="asstra" aria-selected="false">transfert history</a>
    </li>
    @if ($asset->category=='Vehicle')
        <li class="nav-item" role="presentation">
            <a class="nav-link h3" id="assmis-tab" data-toggle="tab" href="#assmis" role="tab" aria-controls="assmis" aria-selected="false">mission history</a>
        </li>
    @endif
    <li class="nav-item" role="presentation">
        <a class="nav-link h3" id="assamo-tab" data-toggle="tab" href="#assamo" role="tab" aria-controls="assamo" aria-selected="false">Amortissement</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link h3" id="assqr-tab" data-toggle="tab" href="#assqr" role="tab" aria-controls="assqr" aria-selected="false">QR code</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="assinf" role="tabpanel" aria-labelledby="assinf-tab">
        <div class=" mt-4">
            Asset : {{$asset->name}} .
        </div>
        <hr class="my-4"/>
        <div class=" mt-4">
            Brand : {{$asset->brand}} .
        </div>
        <hr class="my-4"/>
        <div class=" mt-4">
            Description : {{ $asset->description }} .
        </div>
        <hr class="my-4"/>
        <div class=" mt-4">
            Price : {{ $asset->prix }} .
        </div>
        <hr class="my-4"/>
        <div class=" mt-4">
            Category : {{ $asset->category }} .
        </div>
        <hr class="my-4"/>
        <div class=" mt-4">
            Acquisition date : {{ $asset->dateAchat }} .
        </div>
        <hr class="my-4"/>
        <div class=" mt-4">
            Commissioning date : {{ $asset->dateService }} .
        </div>
        <hr class="my-4" width="75%"/>
        <div class=" mt-4">
            Lifetime : {{ $asset->duree_vie }} years .
        </div>
        <hr class="my-4"/>
        <div class=" mt-4">
            Provider : @foreach (\App\Fournisseur::all() as $fournisseur)
                            @if($fournisseur->id == $asset->fournisseur_id)
                                {{$fournisseur->libel}}
                            @endif
                        @endforeach
        </div>
        <hr class="my-4" width="75%"/>
        <div class=" mt-4">
            Bureau : <a href="{{ route('showBureau', \App\bureau::find($asset->bureau_id)->id) }}">{{ \App\bureau::find($asset->bureau_id)->name }} </a> .
        </div>
    </div>



    <div class="tab-pane fade" id="asstra" role="tabpanel" aria-labelledby="asstra-tab">
        @if (\App\Transfert::all()->where('asset_id', $asset->id)->isEmpty())
        <br>
            No transfert history has been recorded...!<br>
            @if ($asset->status != 3 && $asset->occupied == 1||2)
                <a href="{{route('createTransfert',$asset->id)}}"><i class="fa fa-paper-plane fa-fw text-blue"></i></i> transfer &#160&#160&#160</a>
            @endif
        @else
            <div class="table-responsive">
                <br>
                @if ($asset->status != 3 && $asset->occupied == 1||2)
                    <a href="{{route('createTransfert',$asset->id)}}"><i class="fa fa-paper-plane fa-fw text-blue"></i></i> transfer &#160&#160&#160</a><br>
                @endif
                @php
                    $transferts = \App\Transfert::where('asset_id', $asset->id)->paginate(5);
                @endphp
                <table class="table align-items-center table-flush table-striped">
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
                        @foreach($transferts as $transfert)
                            <tr>
                                <td @if (\App\block::onlyTrashed()->find($transfert->block_c)) data-toggle="tooltip" data-placement="top" title="Block deleted" style="color:red"@endif>{{\App\block::withTrashed()->find($transfert->block_c)->name}}</td>
                                <td>{{$transfert->etage_c}}</td>
                                <td @if (\App\bureau::onlyTrashed()->find($transfert->bureau_c)) data-toggle="tooltip" data-placement="top" title="Bureau deleted" style="color:red"@endif >{{\App\bureau::withTrashed()->find($transfert->bureau_c)->name}}</td>
                                <td>{{$transfert->transfered_at}}</td>
                                <td @if (\App\block::onlyTrashed()->find($transfert->block_d)) data-toggle="tooltip" data-placement="top" title="Block deleted" style="color:red"@endif>{{\App\block::withTrashed()->find($transfert->block_d)->name}}</td>
                                <td>{{$transfert->etage_d}}</td>
                                <td @if (\App\bureau::onlyTrashed()->find($transfert->bureau_d)) data-toggle="tooltip" data-placement="top" title="Bureau deleted" style="color:red"@endif>{{\App\bureau::withTrashed()->find($transfert->bureau_d)->name}}</td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $transferts->links() !!}
                </div>
            </div>
        @endif
    </div>




    <div class="tab-pane fade" id="assmis" role="tabpanel" aria-labelledby="asshis-tab">
        @if (\App\Mission::all()->where('asset_id', $asset->id)->isEmpty())
            <br><p>No mission history has been recorded...!</p>
            @if ($asset->etat ==1 && $asset->status == 1 && $asset->occupied == 1)
                <a href="{{route('createMission',$asset->id)}}"><i class="fa fa-play fa-fw text-blue"></i></i> start mission</a> <br>
            @endif
        @else
        <br>
        @if ($asset->etat ==1 && $asset->status == 1 && $asset->occupied == 1)
                <a href="{{route('createMission',$asset->id)}}"><i class="fa fa-play fa-fw text-blue"></i></i>start mission</a><br>
        @endif    
            <div class="table-responsive">
                @php
                    $missions = \App\mission::where('asset_id',$asset->id)->paginate(5);
                @endphp
                <table class="table align-items-center table-flush table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Mission goal</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Mission date</th>
                            <th scope="col">State</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($missions as $mission)
                            <tr>
                                <td>{{$mission->but_mission}}</td>
                                <td>{{$mission->destination}}</td>
                                <td>{{$mission->mission_at}}</td>
                                @if ($mission->etat==0)
                                    <td><a href="{{route('completeMission',$mission->id)}}" class="text-info">incomplite</a></td>
                                @else
                                    <td><label class="text-success">complited</label></td>    
                                @endif
                                                            
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $missions->links() !!}
                </div>
        
            </div>
        @endif
    </div>

    <div class="tab-pane fade" id="assamo" role="tabpanel" aria-labelledby="assamo-tab">
        @if (\App\Amortissement::all()->where('asset_id', $asset->id)->isEmpty())
            <br><p>there is no Amortissement sheet associated with this asset...!</p>
            <p><a href="#" data-toggle="modal" data-target="#addamo">Add Amortissement</a></p>
        @else
        <br>
        
        
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>                        
                            </tr>
                    </tbody>
                </table>
        
            </div>
        @endif
    </div>





   
   
    <div class="tab-pane fade" id="assqr" role="tabpanel" aria-labelledby="assqr-tab">
        <br><br>
        <div id="div_print" >
            <div style="display: flex; justify-content: center; text-align: center;" id="qrcode"></div>     
            </div>
            <br>
            <input  name="b_print" type="button" class="ipt btn" style="width: 15%;margin-left: 42%;margin-top: 1%;background-color: #6994ef;" onClick="printdiv('div_print');" value=" Print ">
        </div>
    </div>

    
  </div>

        </div></div></div>

        <div class="modal fade" id="addamo">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('storeAmo',$asset->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h2>Add amortissement :</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <div class="model-body">
                                
                        </div>
                        <br>
                        <div class="model-footer">
                             <button class="btn btn-info" type="submit" >Save</button>
                            <button class="btn btn-primary" data-dismiss="modal">cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>








        {{--     <a href="{{route('createTransfert',$asset->id)}}"><i class="fa fa-paper-plane fa-fw text-blue"></i></i> transfer &#160&#160&#160</a>
            <a href="{{route('createMission',$asset->id)}}"><i class="fa fa-play fa-fw text-blue"></i></i> &#160&start mission</a> 
 --}}
      

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
{{-- <div class="row">
<div class="column" id="div_print">
<div style="margin-left:33%" id="qrcode"></div>
</div>
<div class="column">
<input style="margin-top:32%" name="b_print" type="button" class="ipt" style="margin-left: 35%" onClick="printdiv('div_print');" value=" Print ">    
</div>
</div> --}}
                
                

<script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.js"></script>
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
@endsection    
