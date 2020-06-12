<?php

namespace App\Http\Controllers;
use App\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:fournisseur-list|fournisseur-create|fournisseur-edit|fournisseur-delete', ['only' => ['index','show']]);
         $this->middleware('permission:fournisseur-create', ['only' => ['create','store']]);
         $this->middleware('permission:fournisseur-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:fournisseur-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::latest()->paginate(5);
        return view('fournisseur.index',compact('fournisseurs'))->with('user',Auth()->user())
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseur.create');
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
            'libel' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        (Fournisseur::create([
        'libel' => $request->libel,
        'tel' => $request->tel,
        'email' => $request->email,
        'address' => $request->address,
        'website' => $request->website,
        ]));

        return redirect()->route('indexFournisseur')->with('success', 'fournisseur created successfully.');
        
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $fournisseur = \App\Fournisseur::find($id);
        return view('fournisseur.show',compact('fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = \App\Fournisseur::find($id);
        return view('fournisseur.edit',compact('fournisseur'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'libel' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $fournisseur = \App\Fournisseur::find($id);
        $fournisseur->update($request->all());

        return redirect()->route('indexFournisseur')
                        ->with('success','fournisseur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fournisseur = \App\Fournisseur::find($id);
        $fournisseur->delete();

        return redirect()->route('indexFournisseur')
                        ->with('success','fournisseur deleted successfully');
    }

    
}