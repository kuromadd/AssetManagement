<?php

namespace App\Http\Controllers;
use App\Transfert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class TransfertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        /*  $this->middleware('permission:transfert-list|transfert-create|transfert-edit|transfert-delete', ['only' => ['index','show']]);
         $this->middleware('permission:transfert-create', ['only' => ['create','store']]);
         $this->middleware('permission:transfert-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:transfert-delete', ['only' => ['destroy']]); */
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAsset(Request $request){
       
        $asset=\App\asset::find($request->id);
        if ($asset->bureau->block->name) {
            $data[1]=$asset->bureau->block->name;
            $data[2]=$asset->bureau->etage;
            $data[3]=$asset->bureau->name;
        }
        
        return response()->json($data);
    }

    public function index()
    {
        $transferts = Transfert::latest()->paginate(5);
        return view('transfert.index',compact('transferts'))->with('user',Auth()->user())
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transfert.create');
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
            'bloc_d'=>'required',
            'etage_d'=>'required',
            'bureau_d'=>'required',
            'transfered_at'=>'required',
            
        ]);
        $transfert = Transfert::create($request->all());
       
            return redirect()->route('transfert.index')
            ->with('success', 'transfert created successfully.');
        
         
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfert  $transfert
     * @return \Illuminate\Http\Response
     */

    public function show(Transfert $transfert)
    {
        return view('transfert.show',compact('transfert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfert  $transfert
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfert $transfert)
    {
        return view('transfert.edit',compact('transfert'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfert  $transfert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfert $transfert)
    {
         request()->validate([
            'bloc_d'=>'required',
            'etage_d'=>'required',
            'bureau_d'=>'required',
            'transfered_at'=>'required',
        ]);

        $transfert->update($request->all());

        return redirect()->route('transfert.index')
                        ->with('success','transfert updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfert  $transfert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfert $transfert)
    {
        $transfert->delete();

        return redirect()->route('transfert.index')
                        ->with('success','transfert deleted successfully');
    }

    
}