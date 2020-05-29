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
}
