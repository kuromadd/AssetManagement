<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    //
    protected $fillable = [
            'block_c',
            'etage_c',
            'bureau_c',
            'block_d',
            'etage_d',
            'bureau_d',
            'transfered_at',
    ];

    public function asset(){
        return $this->belongsTo('App\Asset');
    }
}
