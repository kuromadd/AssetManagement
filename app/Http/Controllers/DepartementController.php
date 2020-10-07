<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:departement-list|departement-create|departement-edit|departement-delete', ['only' => ['index','show']]);
         $this->middleware('permission:departement-create', ['only' => ['create','store']]);
         $this->middleware('permission:departement-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:departement-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=Auth()->user();
        $departements = \App\Departement::orderBy('id','DESC')->paginate(10);
        return view('departement.index',compact('departements'))
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
        return view('departement.create');
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
            'code_dep' =>'required',
            'libel' =>'required',
            'division_id' =>'required',
        ]);
        $departement = new \App\Departement ; 
        $departement->code_dep = $request->code_dep;
        $departement->libel = $request->libel;
        $departement->division_id = $request->division_id;
     
            $departement->save();
            return redirect()->back()->with('success','You stored a new departement..!');
       
        
        
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
        $departement = \App\Departement::find($id);
        return view('departement.show')->with('departement',$departement)->with('user',$user);
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
        $departement = \App\Departement::find($id);
        return view('departement.edit')->with('departement',$departement)->with('user',$user);
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
            'code_dep' =>'required',
            'libel' =>'required',
            'division_id' =>'required',
        ]);

        $departement = \App\Departement::find($id) ; 

        $departement->code_dep = $request->code_dep;
        $departement->libel = $request->libel;
        $departement->division_id = $request->division_id;
        
        $departement->save();
  
        return redirect()->route('indexDepartement')->with('success','you updated a departement');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\App\Service::where('departement_id',$id)->get()->isEmpty()) {
            \App\Departement::find($id)->delete();
            
            return redirect()->back()->with('success','you deleted a bureau');
        }
    }
}
