<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    //
    protected $fillable = [
        'asset_id',
        'but_mission',
        'destination',
        'mission_at'
    ];

    public function asset(){
        return $this->belongsTo('App\Asset');
    }
}
