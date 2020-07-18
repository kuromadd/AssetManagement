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
    public function create($qr)
    {
        return view('asset.create')->with('qr',$qr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'category' => 'required',
            'dateservice' => 'required',
            'duree' => 'required',
            'qr' => 'required'
        ]);

        $asset = new \App\asset;
        $asset->name = $request->name;
        $asset->description=$request->description;
        $asset->prix = $request->prix;
        $asset->category = $request->category;
        $asset->dateService = $request->dateservice;
        $asset->duree_vie = $request->duree;
        $asset->qrcode = $request->qr;
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
            'description' => 'required',
            'prix' => 'required',
            'category' => 'required',
            'dateservice' => 'required',
            'duree' => 'required',
        ]);
        $asset = \App\asset::find($id);
        $asset->name = $request->name;
        $asset->description=$request->description;
        $asset->prix = $request->prix;
        $asset->category = $request->category;
        $asset->dateService = $request->dateservice;
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
        DB::table("asset_inventaire")->where('asset_id',$id)->delete();
       
        $asset->delete();
        return redirect()->back()->with('success','you deleted asset');
    }

   public function replace($id){
    $asset = \App\asset::find($id);
    foreach (\App\asset::all() as $item) {
        if ($item->occupied && $item->category === $asset->category) {
            $assets[] =$item;
        }
    }
    dd($assets);
        return ;
   }

    public function reset($id){
        foreach(\App\asset::whereIn('status',['0','1','2'])->get() as $asset)
        {
        $asset->status = 0;
        $asset->save();
    }
    if($id != 0){
    DB::table('asset_inventaire')->where('inventaire_id',$id)->update(["status" => 0]);}
    return redirect()->route('assetList');
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
        return view('qr.qrhInv');
    }

    public function exist($qrcode){
        if (\App\asset::where('qrcode',$qrcode)->first()) {
            
            $asset = \App\asset::where('qrcode',$qrcode)->first();
       
            return view('asset.show')->with('asset',$asset)->with('success',$asset->name.' full information');
        }else {
         
            return view('asset.create')->with('qr',$qrcode)->with('info','fill all the blancks');
        }
    }
    public function existInv($qrcode){
        if (\App\asset::where('qrcode',$qrcode)->first()) {
            
            $asset = \App\asset::where('qrcode',$qrcode)->first();
       
            return view('qr.exist')->with('asset',$asset);
        }else {
         
            return view('asset.create')->with('qr',$qrcode);
        }
    }
}
