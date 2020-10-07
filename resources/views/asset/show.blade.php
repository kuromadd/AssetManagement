@extends('app.layout')
@section('content')
<style>
    .float-container {
    padding: 5px;
}

.float-child {
    width: 50%;
    float: left;
    padding: 15px;
}  
</style>
    <div class="card card-default">
        <div class="card-header" style="background-color: #ecf4fd">
            <div class="text-center h1" > 
                Asset information :
            </div>  
        </div>
             
        <div class="card-body">
            <div class="text-center float-container">
                @if ($asset->category=='Vehicle')
                    <div class="float-child">
                @endif
                
                <p>
                    <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsedeta" aria-expanded="flase" aria-controls="collapsedeta">
                        Asset detail
                    </button>
                </p>
                <div class="collapse" id="collapsedeta">
                    <div class="card card-body">
                
                <div class="h3 mt-4">
                    Asset : {{$asset->name}} .
                </div>
                <hr class="my-4"/>
                <div class="h3 mt-4">
                    Brand : {{$asset->brand}} .
                </div>
                <hr class="my-4"/>
                <div class="h3 mt-4">
                    Description : {{ $asset->description }} .
                </div>
                <hr class="my-4"/>
                <div class="h3 mt-4">
                    Price : {{ $asset->prix }} .
                </div>
                <hr class="my-4"/>
                <div class="h3 mt-4">
                    Category : {{ $asset->category }} .
                </div>
                <hr class="my-4"/>
                <div class="h3 mt-4">
                    Acquisition date : {{ $asset->dateService }} .
                </div>
                <hr class="my-4" width="75%"/>
                <div class="h3 mt-4">
                    Lifetime : {{ $asset->duree_vie }} years .
                </div>
                <hr class="my-4"/>
                <div class="h3 mt-4">
                    Provider : @foreach (\App\Fournisseur::all() as $fournisseur)
                                    @if($fournisseur->id == $asset->fournisseur_id)
                                        {{$fournisseur->libel}}
                                    @endif
                                @endforeach
                </div>
                <hr class="my-4"/>
                
            </div>
            </div>
        </div> 
                @if ($asset->category=='Vehicle')
                    </div>
                @endif

                <div class="text-center">
                    @if ($asset->category == 'Vehicle')
                        <div class="float-child">
                            <p>
                                <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseMission" aria-expanded="false" aria-controls="collapseMission">
                                    Mission history
                                </button>
                            </p>
                            <div class="collapse" id="collapseMission">
                                <div class="card card-body">    
                                    @if (\App\Mission::all()->where('asset_id', $asset->id)->isEmpty())
                                        No mission history has been recorded .
                                    @else
                                        <div class="table-responsive">
                                            @php
                                                $missions = \App\mission::where('asset_id',$asset->id)->paginate(5);
                                            @endphp
                                            <table class="table align-items-center table-flush table-striped">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Mission goal</th>{{-- 
                                                        <th scope="col">Destination</th>
                                                        <th scope="col">Mission date</th> --}}
                                                        <th scope="col">State</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($missions as $mission)
                                                        <tr>
                                                            <td>{{$mission->but_mission}}</td>{{-- 
                                                            <td>{{$mission->destination}}</td>
                                                            <td>{{$mission->mission_at}}</td> --}}
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
                                            
                                    <div class="h3 mt-4">
                                        @if ($asset->etat ==1 && $asset->status == 1 && $asset->occupied == 1)
                                            <a href="{{route('createMission',$asset->id)}}"><i class="fa fa-play fa-fw text-blue"></i></i> &#160start mission</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            
        </div>        

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
                <p>
                    <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseTransfert" aria-expanded="flase" aria-controls="collapseTransfert">
                        Transfert history
                    </button>
                </p>
                <div class="collapse" id="collapseTransfert">
                    <div class="card card-body text-center">    
                        @if (\App\Transfert::all()->where('asset_id', $asset->id)->isEmpty())
                            No transfert history has been recorded .
                        @else
                            <div class="table-responsive">
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
                            
                        <div class="h3 mt-4">
                            @if ($asset->status != 3 && $asset->occupied == 1||2)
                                <a href="{{route('createTransfert',$asset->id)}}"><i class="fa fa-paper-plane fa-fw text-blue"></i></i> transfer &#160&#160&#160</a>
                            @endif
                        </div>
                    </div>
                </div> 
                
    <div id="div_print" >
        <div style="display: flex; justify-content: center; text-align: center;" id="qrcode"></div>     
        </div>
        <input  name="b_print" type="button" class="ipt btn" style="width: 15%;margin-left: 42%;margin-top: 1%;background-color: #6994ef;" onClick="printdiv('div_print');" value=" Print ">
    </div>
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
