<?php

namespace App\Http\Controllers;

use App\bureau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BureauController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:bureau-list|bureau-create|bureau-edit|bureau-delete', ['only' => ['index','show']]);
         $this->middleware('permission:bureau-create', ['only' => ['create','store']]);
         $this->middleware('permission:bureau-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:bureau-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=Auth()->user();
        $bureaus = \App\bureau::orderBy('id','DESC')->paginate(10);
        return view('bureau.index',compact('bureaus'))
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
        return view('bureau.create');
    }

    public function findEtage(Request $request){
        
        $data=\App\block::select('nbre_Etage')->where('id',$request->id)->first();
        return response()->json($data);
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
            'name' =>'required',
            'type' =>'required',
            'block_id' =>'required',
            'etage' => 'required',
        ]);
        $bureau = new \App\bureau ; 
        $bureau->name = $request->name;
        $bureau->type = $request->type;
        $bureau->block_id = $request->block_id;
        $bureau->etage =$request->etage;
        $bureau->save();

      //  \App\asset::whereIn('id',$request->assets)->update(["bureau_id" => $bureau->id]);
      //  \App\asset::whereIn('id',$request->assets)->update(["occupied" => 1]);
        
        return redirect()->back()->with('success','you stored a new bureau');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user=Auth()->user();
        $bureau = \App\bureau::find($id);
        return view('bureau.show')->with('bureau',$bureau)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Auth()->user();
        $bureau = \App\bureau::find($id);
        return view('bureau.edit')->with('bureau',$bureau)->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' =>'required',
            'type' =>'required',
            'block_id' =>'required',
            'etage' => 'required',
        ]);

        $bureau = \App\bureau::find($id) ; 
        $bureau->name = $request->name;
        $bureau->type = $request->type;
        $bureau->etage = $request->etage;
        $bureau->block_id =$request->block_id;
        
        $bureau->save();
        if ($request->has('assets')) {
            \App\asset::whereIn('id', $bureau->assets)->update(["occupied" => 0,"bureau_id" => 0]);
            \App\asset::whereIn('id', $request->assets)->update(["occupied" => 1,"bureau_id" => $id]);
        }
        return redirect()->route('indexBureau')->with('success','you updated a bureau');
    }
    public function saveAsset(Request $request,$id){
        $bureau = \App\bureau::find($id) ; 

        \App\asset::whereIn('id',$bureau->assets)->update(["occupied" => 0,"bureau_id" => 0]);
        \App\asset::whereIn('id',$request->assets)->update(["occupied" => 1,"bureau_id" => $id]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('assets')->where('bureau_id',$id)->update(['occupied'=>0,'bureau_id'=>0]);

        $bureau = \App\bureau::find($id);
        foreach($bureau->assets as $asset){
            $asset->occupied = 0;
        }
        foreach($bureau->assets() as $asset){
            $asset->bureau_id = null;
        }
        $bureau->delete();
        return redirect()->back()->with('success','you deleted a bureau');
    }
}
