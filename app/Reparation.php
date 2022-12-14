<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    //
    protected $fillable= [
        'asset_id',
        'prix',
        'repaired_at',
    ];


    public function asset(){
        return $this->belongsTo('App\Asset');
    }
}


