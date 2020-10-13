<?php

namespace App\Http\Controllers;

use App\asset;
use App\inventaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:asset-list|asset-create|asset-edit|asset-delete', ['only' => ['index','show']]);
         $this->middleware('permission:asset-create', ['only' => ['create','store']]);
         $this->middleware('permission:asset-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:asset-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $user = Auth()->user();
        $assets = \App\asset::orderBy('id','DESC')->paginate(10);
        return view('asset.index',compact('assets'))
            ->with('i', ($request->input('page', 1) - 1) * 10)
            ->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
        

        $asset = new \App\asset;
        $asset->name = $request->name;
        $asset->description=$request->description;
        $asset->brand=$request->brand;
        $asset->prix = $request->prix;
        $asset->category = $request->category;
        $asset->dateService = $request->dateservice;
        $asset->dateAchat = $request->dateAchat;
        $asset->duree_vie = $request->duree;
        $asset->qrcode = $request->qrcode;
        $asset->occupied = 0;
        $asset->status = 1;
        $asset->fournisseur_id= $request->fournisseur_id;

        $asset->save();
        return redirect()->route('indexAsset')->with('success','you added asset successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\asset  $asset
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        
        $user=Auth()->user();
        $asset = \App\asset::find($id);
        return view('asset.show')->with('asset',$asset)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Auth()->user();
        $asset = \App\asset::find($id);
        return view('asset.edit')->with('asset',$asset)->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'brand' => 'required',
            'prix' => 'required',
            'category' => 'required',
            'dateservice' => 'required',
            'dateAchat' => 'required',
            'duree' => 'required',
        ]);
        $asset = \App\asset::find($id);
        $asset->name = $request->name;
        $asset->description=$request->description;
        $asset->brand=$request->brand;
        $asset->prix = $request->prix;
        $asset->category = $request->category;
        $asset->dateService = $request->dateservice;
        $asset->dateAchat = $request->dateAchat;
        $asset->duree_vie = $request->duree;

        $asset->save();
        return redirect()->route('indexAsset')->with('success','you edited asset successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $asset = \App\asset::find($id);
        foreach (\App\transfert::all()->where('asset_id',$id) as $trans) {
            \App\transfert::find($trans->id)->delete();
        }
        DB::table("asset_inventaire")->where('asset_id',$id)->delete();
       
        $asset->delete();
        return redirect()->back()->with('success','you deleted asset');
    }

   public function replace(Request $request){

    $asset = \App\asset::find($request->id);
    $bureau1 = \App\bureau::find(\App\asset::find($request->val)->bureau_id);
    $bureau2 = \App\bureau::find(\App\asset::find($request->id)->bureau_id);
    
    if ($bureau2 <> null) {

        $transfert = new \App\Transfert;
        $transfert->asset_id=$asset->id;
        $transfert->block_d=$bureau1->block_id;
        $transfert->bureau_d=$bureau1->id;
        $transfert->etage_d=$bureau1->etage;
        $transfert->block_c=$bureau2->block_id;
        $transfert->bureau_c=$bureau2->id;
        $transfert->etage_c=$bureau2->etage;
        $transfert->transfered_at= now();

        $transfert->save();      
            $asset->bureau_id = $bureau2->id;
    } else{
        $asset->bureau_id = $bureau2->id;        
    }   
        $asset->occupied = 1;
        $asset->save();
        DB::update('update assets set replaced = 1 where id = ?', [$request->val]);
        
        $data=[];
    foreach (\App\bureau::all() as $item){
        if ($item->type == "Stock" && \App\bureau::find($asset->bureau_id)->id == $item->id){
            $data[]=$item;
        }
    }
    
        return response()->json('replace');
   }

   public function choose(Request $request){

    $asset = \App\asset::find($request->id);
    $bureau2 = \App\bureau::find(\App\asset::find($request->val)->bureau_id);
    $bureau1 = \App\bureau::find($request->id);

        $transfert = new \App\Transfert;
        $transfert->asset_id=$asset->id;
        $transfert->block_d=$bureau1->block_id;
        $transfert->bureau_d=$bureau1->id;
        $transfert->etage_d=$bureau1->etage;
        $transfert->block_c=$bureau2->block_id;
        $transfert->bureau_c=$bureau2->id;
        $transfert->etage_c=$bureau2->etage;
        $transfert->transfered_at= now();

        $transfert->save();      
            $asset->bureau_id = $bureau1->id;

        $asset->occupied = 2;
        $asset->save();

        return response()->json('choose');
   }

    public function found(Request $request){

        DB::update('update assets set status = 0 where id = ?', [$request->id]);
        return response()->json('found');
    }

    public function saveall(Request $request){
        foreach(\App\asset::all() as $asset){
            $asset->status = 0;
            $asset->save();
        }
        \App\asset::whereIn('id',$request->fine)->update(["status" => 1]);
        \App\asset::whereIn('id',$request->repair)->update(["status" => 2]);
        \App\asset::whereIn('id',$request->lost)->update(["status" => 3]);
        

        return redirect()->route('assetList');
    }

    function scan() {
        return view('qr.qrh');
    }

    public function exist($qrcode){
        if (\App\asset::where('qrcode',$qrcode)->first()) {
            
            $asset = \App\asset::where('qrcode',$qrcode)->first();
       
            return view('asset.show')->with('asset',$asset);
        }else {
         
            return redirect()->back()->with('danger','this asset doesn\'t exist');
        }
    }
    public function existInv($qrcode){
        if (\App\asset::where('qrcode',$qrcode)->first()) {
            
            $asset = \App\asset::where('qrcode',$qrcode)->first();
       
            return view('qr.exist')->with('asset',$asset);
        }else {
            return redirect()->back()->with('info','this asset doesn\'t exist');
        }
    }
}
