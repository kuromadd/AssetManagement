<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bureau extends Model
{
    public function block()
    {
        return $this->belongsTo('\App\block');
    }

    public function assets()
    {
        return $this->belongsToMany('\App\asset');
    }
}
