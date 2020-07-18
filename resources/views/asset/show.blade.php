@extends('app.edit_layout')
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
            
                <p>
                    <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseTransfert" aria-expanded="flase" aria-controls="collapseTransfert">
                        Transfert history
                    </button>
                </p>
                <div class="collapse" id="collapseTransfert">
                    <div class="card card-body">    
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
                                <div class="d-flex justify-content-center">
                                    {!! $transferts->links() !!}
                                </div>

                            </div>
                        @endif
                            
                        <div class="h3 mt-4">
                            @if ($asset->status != 3 && $asset->occupied == 1)
                                <a href="{{route('createTransfert',$asset->id)}}"><i class="fa fa-paper-plane fa-fw text-blue"></i></i> transfer &#160&#160&#160</a>
                            @endif
                        </div>
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>
        <div style="margin: 2%;margin-left:40%" id="qrcode"></div>
                
        </div>
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
