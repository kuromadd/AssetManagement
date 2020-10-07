<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    //
    protected $fillable =[
        'code_dep','libel','division_id'
    ]; 

    public function Division(){
        return $this->belongsTo('\App\Division');
    }

    public function Services()
    {
        return $this->hasMany('\App\Service');
    }
}
