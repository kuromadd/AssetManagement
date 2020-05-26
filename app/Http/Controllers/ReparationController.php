<?php

namespace App\Http\Controllers;
use App\Reparation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ReparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:reparation-list|reparation-create|reparation-edit|reparation-delete', ['only' => ['index','show']]);
         $this->middleware('permission:reparation-create', ['only' => ['create','store']]);
         $this->middleware('permission:reparation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:reparation-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reparations = Reparation::latest()->paginate(5);
        return view('reparation.index',compact('reparations'))->with('user',Auth()->user())
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reparation.create');
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
            'asset_id' => 'required',
            'prix' => 'required',
            'repaired_at' => 'required',
        ]);
        $reparation = Reparation::create([
            'asset_id' => $request->asset_id,
            'prix' => $request->prix,
            'repaired_at' => $request->repaired_at,
        ]);
        \App\asset::where('id',$request->asset_id)->update(["status" => 1]);
        if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'indexReparation'){
            return redirect()->route('indexReparation')
                        ->with('success', 'Reparation created successfully.');
        }else{
            return redirect()->route('repairList')
            ->with('success', 'Reparation created successfully.');
        }
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */

    public function show(Reparation $reparation)
    {
        return view('reparation.show',compact('reparation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reparation $reparation)
    {
        return view('reparation.edit',compact('reparation'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reparation $reparation)
    {
         request()->validate([
            'prix' => 'required',
            'repaired_at' => 'required',
        ]);

        $reparation->update($request->all());

        return redirect()->route('reparation.index')
                        ->with('success','Reparation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reparation $reparation)
    {
        $reparation->delete();

        return redirect()->route('reparation.index')
                        ->with('success','Reparation deleted successfully');
    }

    
}