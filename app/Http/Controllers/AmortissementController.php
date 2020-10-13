<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmortissementController extends Controller
{
    
    public function StoreAmo(Request $request)
    {
        
        $amortissement = new \App\Amortissement() ; 
        $amortissement->asset_id = $request->asset_id;
        $amortissement->save();
    }
}
