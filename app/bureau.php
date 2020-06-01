<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bureau extends Model
{
    protected $fillable =[
        'name','description','prix','category','duree_vie','selected','occupied'
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
