<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    //
    protected $fillable = [
        'libel',
        'address',
        'tel',
        'email',
        'website',
    ];


    public function assets()
   {
       return $this->hasMany('\App\asset');
   }
}
