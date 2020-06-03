<?php

namespace App\Http\Controllers;
use App\Transfert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use PHPUnit\Framework\Constraint\Count;

class TransfertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:transfert-list|transfert-create|transfert-edit|transfert-delete', ['only' => ['index','show']]);
         $this->middleware('permission:transfert-create', ['only' => ['create','store']]);
         $this->middleware('permission:transfert-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:transfert-delete', ['only' => ['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Etage(Request $request){
        $data=\App\block::select('nbre_Etage')->where('id',$request->id)->first();
        $request->session()->put('blockID', $request->id);
        return response()->json($data);
    }
    public function Bureau(Request $request){
        $data=[];
        $id=$request->session()->get('blockID');
        $bureaus=\App\block::find($id)->bureaus;
        foreach ($bureaus as $bureau) {
            if ($bureau->etage==$request->id) {
                $data[]=$bureau;
            }
        }
            return response()->json($data);
    }

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
            'block_d'=>'required',
            'etage_d'=>'required',
            
            'transfered_at'=>'required',
            
        ]);
        $transfert = new \App\Transfert;
        $transfert->asset_id=$request->asset_id;
        $transfert->block_d=$request->block_d;
        $transfert->bureau_d='$request->bureau_d';
        $transfert->etage_d=$request->etage_d;
        $transfert->block_c=$request->block_c;
        $transfert->bureau_c=$request->bureau_c;
        $transfert->etage_c=$request->etage_c;
        $transfert->transfered_at=$request->transfered_at;

        $transfert->save();
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