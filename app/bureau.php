<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bureau extends Model
{
    protected $fillable =[
        'name','type','block_id','etage'
    ]; 

    public function block()
    {
        return $this->belongsTo('\App\block');
    }

    public function assets()
    {
        return $this->hasMany('\App\asset');
    }
}
