<?php

namespace App\Http\Controllers;

use App\bureau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=Auth()->user();
        $bureaus = \App\bureau::orderBy('id','DESC')->paginate(5);
        return view('bureau.index',compact('bureaus'))
            ->with('i', ($request->input('page', 1) - 1) * 5)
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
            'block_id' =>'required',
            'etage' => 'required',
            'assets' => 'required',
        ]);
        $bureau = new \App\bureau ; 
        $bureau->name = $request->name;
        $bureau->block_id = $request->block_id;
        $bureau->etage =$request->etage;
        
        $bureau->save();
        $bureau->assets()->attach($request->assets);
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
            'block_id' =>'required',
            'etage' => 'required',
            'assets' => 'required',
        ]);

        $bureau = \App\bureau::find($id) ; 
        $bureau->name = $request->name;
        $bureau->etage = $request->etage;
        $bureau->block_id =$request->block_id;
        
        $bureau->save();
        $bureau->assets()->sync($request->assets);
        return redirect()->back()->with('success','you updated a bureau');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bureau = \App\bureau::find($id);
      
        DB::table("asset_bureau")->where('bureau_id',$id)->delete();
        $bureau->delete();
        return redirect()->back()->with('success','you deleted a bureau');
    }
}
