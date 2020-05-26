<?php

namespace App\Http\Controllers;
use App\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:mission-list|mission-create|mission-edit|mission-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mission-create', ['only' => ['create','store']]);
         $this->middleware('permission:mission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mission-delete', ['only' => ['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $missions = Mission::latest()->paginate(5);
        return view('mission.index',compact('missions'))->with('user',Auth()->user())
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mission.create');
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

            'asset_id'=>'required',
            'but_mission'=>'required',
            'destination'=>'required',
            'mission_at'=>'required',
        ]);
        $mission = Mission::create([
            'asset_id' => $request->asset_id ,
        'but_mission'=> $request->but_mission,
        'destination'=> $request->destination,
        'mission_at'=> $request->mission_at,
    ]);
       
            return redirect()->route('missions.index')
            ->with('success', 'mission created successfully.');
        
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */

    public function show(Mission $mission)
    {
        return view('mission.show',compact('mission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
        return view('mission.edit',compact('mission'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
         request()->validate([
            'but_mission'=>'required',
            'destination'=>'required',
            'mission_at'=>'required',
        ]);

        $mission->update($request->all());

        return redirect()->route('missions.index')
                        ->with('success','mission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
        $mission->delete();

        return redirect()->route('missions.index')
                        ->with('success','mission deleted successfully');
    }

    
}