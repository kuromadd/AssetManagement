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
        // dd(\App\bureau::select()->whereIn('id', DB::table('asset_bureau_inventaire')->select('bureau_id')->where('inventaire_id', 1))->get());
        $assets = (\App\asset::whereIn('status',['0','1','2'])->get());
        return view('inventaire.create')->with('assets',$assets)->with('user',auth()->user());
        



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
                'name' =>'required',
                'description' =>'required',
            ]);

            foreach (\App\asset::all() as $asset) {
                if ($asset->status == [0,1,2]) {
                    $asset->occupied = 0;
                    $asset->save();
                }
            }
            
            $inventaire = \App\inventaire::all()->last();
            if($request->has('fine')){ \App\asset::whereIn('id',$request->fine)->update(["status" => 1]);}
            if($request->has('repair')){ \App\asset::whereIn('id',$request->repair)->update(["status" => 2]);}
            if($request->has('lost')){ \App\asset::whereIn('id',$request->lost)->update(["status" => 3,"occupied" => 1]);}

            if($request->has('fine')) {DB::table('asset_bureau_inventaire')->where('inventaire_id',$inventaire->id)->whereIn('asset_id',$request->fine)->update(["status" => 1]);}
            if($request->has('damaged')) {DB::table('asset_bureau_inventaire')->where('inventaire_id',$inventaire->id)->whereIn('asset_id',$request->fine)->update(["status" => 2]);}
            if($request->has('lost')) {DB::table('asset_bureau_inventaire')->where('inventaire_id',$inventaire->id)->whereIn('asset_id',$request->fine)->update(["status" => 3]);}

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

        if($request->has('fine')){ \App\asset::whereIn('id',$request->fine)->update(["status" => 1]);}
        if($request->has('repair')){ \App\asset::whereIn('id',$request->repair)->update(["status" => 2]);}
        if($request->has('lost')){ \App\asset::whereIn('id',$request->lost)->update(["status" => 3,"occupied" => 1]);}

        if($request->has('fine')) {DB::table('asset_bureau_inventaire')->where('inventaire_id',$inventaire->id)->whereIn('asset_id',$request->fine)->update(["status" => 1]);}
        if($request->has('damaged')) {DB::table('asset_bureau_inventaire')->where('inventaire_id',$inventaire->id)->whereIn('asset_id',$request->fine)->update(["status" => 2]);}
        if($request->has('lost')) {DB::table('asset_bureau_inventaire')->where('inventaire_id',$inventaire->id)->whereIn('asset_id',$request->fine)->update(["status" => 3]);}

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


    public function BureauInvCheck(Request $request){
        $inventaire = \App\inventaire::all()->last();
        $bureau=\App\bureau::find($request->id);
        foreach ($bureau->assets as $asset) {
            DB::insert('insert into asset_bureau_inventaire (asset_id, bureau_id,inventaire_id) values (?, ?,?)', [$asset->id, $bureau->id,$inventaire->id]);
        }
    
        return response()->json('bureauchecked');
    }

    public function BureauInvUnCheck(Request $request){
        $inventaire = \App\inventaire::all()->last();
        $bureau=\App\bureau::find($request->id);
            DB::table('asset_bureau_inventaire')->where('inventaire_id',$inventaire->id)->where('bureau_id',$bureau->id)->delete();    
        return response()->json('bureauUnchecked');
    }

    public function AssetInv(){
       $data=[];
     foreach (\App\bureau::select()->whereIn('id', DB::table('asset_bureau_inventaire')->select('bureau_id')->where('inventaire_id', \App\inventaire::all()->last()->id))->get() as $bureau) {
         foreach ($bureau->assets as $asset) {
             $data[1][]=$asset->bureau->block->name;
             $data[2][]=$asset->bureau->etage;
             $data[3][]=$asset->bureau->name;
             $data[4][]=$asset->name;
             $data[5][]=$asset->id;
         }
     }
       
        return response()->json($data);
    }
   
    public function uncheckAsset(Request $request){
        $user=\App\User::find();
        DB::table('asset_user')->where('user_id',$user->id)->where('id',$request->id)->delete();
        return response()->json('uncheck');
    }


    public function saveInv(Request $request)
    {
       
        $inventaire = new \App\inventaire;
        $inventaire->name = $request->name;
        $inventaire->description = $request->description;
        $inventaire->user_id = auth()->user()->id;
        $inventaire->save();
        
        return response()->json('invSaved');
    }
}
