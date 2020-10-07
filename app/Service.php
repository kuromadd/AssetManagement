<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable =[
        'code_ser','libel'
    ]; 

    public function Departement(){
        return $this->belongsTo('\App\Departement');
    }

    public function Bureaus()
    {
        return $this->hasMany('\App\bureau');
    }
}
