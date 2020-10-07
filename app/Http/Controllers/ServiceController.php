<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','show']]);
         $this->middleware('permission:service-create', ['only' => ['create','store']]);
         $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=Auth()->user();
        $services = \App\Service::orderBy('id','DESC')->paginate(10);
        return view('service.index',compact('services'))
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
        return view('service.create');
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
            'code_ser' =>'required',
            'libel' =>'required',
            'departement_id' =>'required',
        ]);
        $service = new \App\Service ; 
        $service->code_ser = $request->code_ser;
        $service->libel = $request->libel;
        $service->departement_id = $request->departement_id;
      
            $service->save();
            return redirect()->back()->with('success','You stored a new service..!');
     
        
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
        $service = \App\Service::find($id);
        return view('service.show')->with('service',$service)->with('user',$user);
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
        $service = \App\Service::find($id);
        return view('service.edit')->with('service',$service)->with('user',$user);
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
            'code_ser' =>'required',
            'libel' =>'required',
            'departement_id' =>'required',
        ]);

        $service = \App\Service::find($id) ; 


        $service->code_ser = $request->code_ser;
        $service->libel = $request->libel;
        $service->departement_id = $request->departement_id;
        
        $service->save();
  
        return redirect()->route('indexService')->with('success','you updated a service');
    }

     public function storeAddedBureaus(Request $request,$id){
        $service = \App\Service::find($id);

        foreach (\App\bureau::whereIn('id',$request->buruno)->get() as $bureau) {
            
                $bureau->update(["service_id"=> $service->id]);
            
        }

        return view('service.show')->with('service',$service);
    }

    public function changeSerBur($id){

        $bureau = \App\bureau::find($id);
        $bureau->update(["service_id"=>null]);
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
        if (\App\bureau::where('service_id',$id)->get()->isEmpty()) {
            \App\Service::find($id)->delete();
            return redirect()->back()->with('success','you deleted a service');
        }else{
            foreach(\App\bureau::where('service_id',$id)->get() as $bur){
                $bur->service_id = null;
            }
            \App\Service::find($id)->delete();
            return redirect()->back()->with('success','you deleted a service');
        }



    }
}
