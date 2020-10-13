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
/**
     * to give info of sous and nbreetage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function findEtage(Request $request){
        $data=\App\block::select('nbre_Etage','sous')->where('id',$request->id)->first();
        $request->session()->put('blockID', $request->id);
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
            'name' =>'required|min:2|max:30',
            'type' =>'required',
            'block_id' =>'required',
            'etage' => 'required',
        ]);
        $bureau = new \App\bureau ; 
        $bureau->name = $request->name;
        $bureau->type = $request->type;
        $bureau->block_id = $request->block_id;
        $bureau->etage =$request->etage;
        /* try{ */
            $bureau->save();
            return redirect()->back()->with('success','You stored a new bureau..!');
        /* }
        catch(Exception $e){
            return redirect()->back()->with('error', "Could not save the bureau!");
        }
        return redirect()->back()->with('error', "Error Occured, please try again!");
        $bureau->save(); */

      //  \App\asset::whereIn('id',$request->assets)->update(["bureau_id" => $bureau->id]);
      //  \App\asset::whereIn('id',$request->assets)->update(["occupied" => 1]);
        
        
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

         if ($bureau->type=='Stock' && $request->type !='Stock') {
            foreach (\App\asset::where('bureau_id',$bureau->id)->get() as $asse) {
                $asse->update(["occupied"=>1]);
            }
        } elseif ($bureau->type!='Stock' && $request->type =='Stock') {
            foreach (\App\asset::where('bureau_id',$bureau->id)->get() as $asse) {
                $asse->update(["occupied"=>2]);
            }
        } 

        $bureau->name = $request->name;
        $bureau->type = $request->type;
        $bureau->etage = $request->etage;
        $bureau->block_id =$request->block_id;
        
        $bureau->save();
  
        return redirect()->route('indexBureau')->with('success','you updated a bureau');
    }

    public function storeAddedAssets(Request $request,$id){
        $bureau = \App\bureau::find($id);

        foreach (\App\asset::whereIn('id',$request->assetsun)->get() as $asset) {
            if ($asset->occupied == 0) {
                if ($bureau->type=='Stock') {
                    \App\asset::where('id',$asset->id)->update(["bureau_id" => $id,"occupied" => 2]);
                }else {
                    \App\asset::where('id',$asset->id)->update(["bureau_id" => $id,"occupied" => 1]);
                } 
            } else {
                $transfert = new \App\Transfert;
                $transfert->asset_id=$asset->id;
                $transfert->block_d=$bureau->block_id;
                $transfert->bureau_d=$bureau->id;
                $transfert->etage_d=$bureau->etage;
                $transfert->block_c=\app\bureau::find($asset->bureau_id)->block_id;
                $transfert->bureau_c=$asset->bureau_id;
                $transfert->etage_c=\app\bureau::find($asset->bureau_id)->etage;
                $transfert->transfered_at= now();

                $transfert->save();
                $asset->update(["bureau_id"=> $bureau->id]);
                if ($bureau->type == 'Stock') {
                    \App\asset::where('id',$asset->id)->update(["occupied" => 2]);
                }else {
                    \App\asset::where('id',$asset->id)->update(["occupied" => 1]);
                }
            }
            
        }






        /* if ($bureau->type=='Stock') {
            \App\asset::whereIn('id',$request->assetsun)->update(["occupied"=>2,"bureau_id"=>$id]);
        } else {
            \App\asset::whereIn('id',$request->assetsun)->update(["occupied"=>1,"bureau_id"=>$id]);
        } */
        return view('bureau.show')->with('bureau',$bureau);
    }

    /*public function changeDelete(Request $request,$id){
        $bureau1 = \App\bureau::find($id);
        $bureau2 = \App\bureau::find($request->bur);

        foreach (\App\asset::where('bureau_id',$id) as $asset) {
            
            $transfert = new \App\Transfert;
            $transfert->asset_id=$asset->id;
            $transfert->block_d=$bureau2->block_id;
            $transfert->bureau_d=$bureau2->id;
            $transfert->etage_d=$bureau2->etage;
            $transfert->block_c=\app\bureau::find($asset->bureau_id)->block_id;
            $transfert->bureau_c=$asset->bureau_id;
            $transfert->etage_c=\app\bureau::find($asset->bureau_id)->etage;
            $transfert->transfered_at= now();

            $transfert->save();
            $asset->update(["bureau_id"=> $bureau2->id]);
            if ($bureau->type == 'Stock') {
                \App\asset::where('id',$asset->id)->update(["occupied" => 2]);
            }else {
                \App\asset::where('id',$asset->id)->update(["occupied" => 1]);
            }

        }

        \App\bureau::find($id)->delete();
        return redirect()->route('indexBureau')->with('success','you deleted a bureau');

    }*/


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\App\asset::where('bureau_id',$id)->get()->isEmpty()) {
            \App\bureau::find($id)->delete();
            /* foreach (\App\transfert::all()->where('bureau_c',$id) as $trans) {
                \App\transfert::find($trans->id)->delete();
            }
            foreach (\App\transfert::all()->where('bureau_d',$id) as $trans2) {
                \App\transfert::find($trans2->id)->delete();
            } */
            return redirect()->back()->with('success','you deleted a bureau');
        }



       /*  DB::table('assets')->where('bureau_id',$id)->update(['occupied'=>0,'bureau_id'=>0]);

        $bureau = \App\bureau::find($id);
        foreach($bureau->assets as $asset){
            $asset->occupied = 0;
        }
        foreach($bureau->assets() as $asset){
            $asset->bureau_id = null;
        }
        $bureau->delete();
        return redirect()->back()->with('success','you deleted a bureau'); */
    }
}
