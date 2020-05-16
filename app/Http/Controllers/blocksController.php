<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class blocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=Auth()->user();
        $blocks = \App\block::orderBy('id','DESC')->paginate(5);
        return view('block.index',compact('blocks'))
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
        return view('block.create');
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
            'name' => 'required',
            'adress' => 'required',
            'nbreEt' => 'required',
        ]);
        $block = new \App\block ; 
        $block->name = $request->name;
        $block->adress = $request->adress;
        $block->nbre_etage =$request->nbreEt;
        
        $block->save();
        return redirect()->back()->with('success','you stored a new block');
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
        $block = \App\block::find($id);
        return view('block.edit')->with('block',$block)->with('user',$user);
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
        $block = \App\block::find($id) ; 
        $block->name = $request->name;
        $block->adress = $request->adress;
        $block->nbre_etage =$request->nbreEt;
        
        $block->save();
        
        return redirect()->back()->with('success','you updated a block');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = \App\block::find($id);

        DB::table("bureau")->where('block_id',$id)->delete();
        $block->delete();
        return redirect()->back()->with('success','you deleted a block');
    }
}
