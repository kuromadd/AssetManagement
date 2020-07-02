<?php

namespace App\Http\Controllers;

use App\inventaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:inventaire-list|inventaire-create|inventaire-edit|inventaire-delete', ['only' => ['index','show']]);
         $this->middleware('permission:inventaire-create', ['only' => ['create','store']]);
         $this->middleware('permission:inventaire-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:inventaire-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $user = Auth()->user();
        $inventaires = \App\inventaire::all();
        return view('inventaire.index')->with('user',$user)->with('inventaires',$inventaires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $assets = (\App\asset::whereIn('status',['0','1','2'])->get());
        return view('inventaire.create')->with('assets',$assets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            
        ]);
        $inventaire = new \App\inventaire;
        $inventaire->name = $request->name;
        $inventaire->save();

        foreach(\App\asset::all() as $asset){
            $asset->occupied = 0;
            $asset->save();
        }
        
        if($request->has('fine')){ \App\asset::whereIn('id',$request->fine)->update(["status" => 1,"occupied" => 1]);}
        if($request->has('repair')) \App\asset::whereIn('id',$request->repair)->update(["status" => 2,"occupied" => 1]);
        if($request->has('lost')) \App\asset::whereIn('id',$request->lost)->update(["status" => 3,"occupied" => 1]);
        $inventaire->assets()->attach((\App\asset::where('occupied','=',1)->get()));
<<<<<<< HEAD
        foreach (\App\asset::all() as $value) {
            if ($value->bureau_id && (\App\bureau::find($value->bureau_d))->type == 'stock') {
                \App\asset::whereIn('id', $value->id)->update(["occupied" => 0]);
            }
        }
        if($request->has('lost')) \App\asset::whereIn('id',$request->fine)->update(["occupied" => 1]);
=======
       
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
        if($request->has('fine')) DB::table('asset_inventaire')->whereIn('asset_id',$request->fine)->update(["status" => 1]);
        if($request->has('repair')) DB::table('asset_inventaire')->whereIn('asset_id',$request->repair)->update(["status" => 2]);
        if($request->has('lost')) DB::table('asset_inventaire')->whereIn('asset_id',$request->lost)->update(["status" => 3]);

        
        return redirect()->route('indexInventaire');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\inventaire  $inventaire
     * @return \Illuminate\Http\Response
     */
    public function show(inventaire $inventaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inventaire  $inventaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth()->user();
        return view('inventaire.edit')->with('user',$user)->with('inventaire',\App\inventaire::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inventaire  $inventaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
        {
        $inventaire = \App\inventaire::find($id);    
        $inventaire->name = $request->name;
        $inventaire->save();

        foreach(\App\asset::all() as $asset){
            $asset->occupied = 0;
            $asset->save();
        }

        if($request->has('fine')){ \App\asset::whereIn('id',$request->fine)->update(["status" => 1,"occupied" => 1]);}
        if($request->has('repair')) \App\asset::whereIn('id',$request->repair)->update(["status" => 2,"occupied" => 1]);
        if($request->has('lost')) \App\asset::whereIn('id',$request->lost)->update(["status" => 3,"occupied" => 1]);
        $inventaire->assets()->sync((\App\asset::where('occupied','=',1)->get()));
<<<<<<< HEAD
        foreach (\App\asset::all() as $value) {
            if (\App\bureau::find($value->bureau_d)->type == 'stock') {
                \App\asset::whereIn('id', $value->id)->update(["occupied" => 0]);
            }
        }
        if($request->has('lost')) \App\asset::whereIn('id',$request->fine)->update(["occupied" => 1]);
=======
        /*foreach (\App\asset::all() as $value) {
            if (\App\bureau::find($value->bureau_id)->type == 'stock') {
                \App\asset::whereIn('id', $value->id)->update(["occupied" => 0]);
            }
        }*/
        //if($request->has('lost')) \App\asset::whereIn('id',$request->fine)->update(["occupied" => 1]);
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
        if($request->has('fine')) DB::table('asset_inventaire')->whereIn('asset_id',$request->fine)->update(["status" => 1]);
        if($request->has('repair')) DB::table('asset_inventaire')->whereIn('asset_id',$request->repair)->update(["status" => 2]);
        if($request->has('lost')) DB::table('asset_inventaire')->whereIn('asset_id',$request->lost)->update(["status" => 3]);

       
        return redirect()->route('indexInventaire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inventaire  $inventaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaire = \App\inventaire::find($id);

        DB::table("asset_inventaire")->where('inventaire_id',$id)->delete();
        $inventaire->delete();
        return redirect()->back()->with('success','you deleted inventaire');
    }


    public function EtageInv(Request $request){
        $data=[];
        $data[0]=\App\block::select('sous','nbre_Etage')->where('id',$request->id)->first();
        $data[2]=[];
        foreach (\App\asset::all() as $asset) {
            if ($asset->bureau_id && $asset->status = [0,1,2] && \App\bureau::find($asset->bureau_id)->block_id == $request->id) {
                $data[2][1][]=$asset->bureau->block->name;
                $data[2][2][]=$asset->bureau->etage;
                $data[2][3][]=$asset->bureau->name;
                $data[2][4][]=$asset->name;
                $data[2][5][]=$asset->id;
            }
        }    
        $request->session()->put('blockID', $request->id);
        return response()->json($data);
    }
    public function BureauInv(Request $request){
        $data=[];
        $id=$request->session()->get('blockID');
        $bureaus=\App\block::find($id)->bureaus;

        foreach ($bureaus as $bureau) {
                if ($bureau->etage==$request->id) {
                    $data[1][]=$bureau;
                    $assets=$bureau->assets;
                  foreach ($assets as $asset) {
                    if ($asset->status = [0,1,2]) {
                        
                    $data[2][1][]=$asset->bureau->block->name;
                    $data[2][2][]=$asset->bureau->etage;
                    $data[2][3][]=$asset->bureau->name;
                    $data[2][4][]=$asset->name;
                    $data[2][5][]=$asset->id;
                    
                }  
                }
            }
        }
            $request->session()->put('etage', $request->id);
            return response()->json($data);
    }

    public function AssetInv(Request $request){
       $data=[];
        $id=$request->session()->get('blockID');
        $etage=$request->session()->get('etage');
        $bureaus=\App\block::find($id)->bureaus;
        
        foreach ($bureaus as $bureau) {
                if ($bureau->id==$request->id && $bureau->etage == $etage) {
                    $assets=$bureau->assets;
                  foreach ($assets as $asset) {
                    if ($asset->status = [0,1,2]) {
                        
                    $data[1][]=$asset->bureau->block->name;
                    $data[2][]=$asset->bureau->etage;
                    $data[3][]=$asset->bureau->name;
                    $data[4][]=$asset->name;
                    $data[5][]=$asset->id;
                    
                }  
                }
            }
        }
        return response()->json($data);
    }
}
