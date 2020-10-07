<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    protected $fillable =[
        'code_div','libel'
    ];

    public function Departements(){
        return $this->hasMany('\App\Departement');
    }
}
