<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:division-list|division-create|division-edit|division-delete', ['only' => ['index','show']]);
         $this->middleware('permission:division-create', ['only' => ['create','store']]);
         $this->middleware('permission:division-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:division-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $user=Auth()->user();
        $divisions = \App\Division::orderBy('id','DESC')->paginate(5);
        return view('division.index',compact('divisions'))
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
        return view('division.create');
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
            'code_div' => 'required',
            'libel' => 'required',
        ]);
        $division = new \App\Division ; 
        $division->code_div = $request->code_div;
        $division->libel = $request->libel;
        
        $division->save();
        return redirect()->back()->with('success','you stored a new division');
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
        $division = \App\Division::find($id);
        return view('division.show')->with('division',$division)->with('user',$user);
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
        $division = \App\Division::find($id);
        return view('division.edit')->with('division',$division)->with('user',$user);
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
            'code_div' => 'required',
            'libel' => 'required',
        ]);

        $division = \App\Division::find($id) ; 
  
        $division->code_div = $request->code_div;
        $division->libel = $request->libel;
        
        $division->save();
        
        return redirect()->route('indexDivision')->with('success','you updated a division');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* $block = \App\block::find($id);

        DB::table("bureaus")->where('block_id',$id)->delete();
        $block->delete(); */
        if (\App\Departement::where('division_id',$id)->get()->isEmpty()) {
            \App\Division::find($id)->delete();
            return redirect()->back()->with('success','you deleted a division');
        }
        



        
    }
}
