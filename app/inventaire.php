<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventaire extends Model
{
    public function assets(){
        return $this->belongsToMany('\App\asset');
    }
}
