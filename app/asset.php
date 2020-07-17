<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    protected $fillable =[
        'name',
        'description',
        'category',
        'prix',
        'dateService',
        'duree_vie',
        'fournisseur_id',
        'bureau_id'
    ];

   public function bureau()
   {
       return $this->belongsto('\App\bureau');
   }

   public function inventaires(){
       return $this->belongsToMany('\App\inventaire')->withPivot('id');
   }
   
   public function missions(){
       return $this->hasMany('\App\Mission');
   }

   public function transferts(){
    return $this->hasMany('\App\Transfert');
}

    public function reparations(){
        return $this->hasMany('\App\Reparation');
    }

    public function fournisseur(){
        return $this->belongsTo('\App\Fournisseur');
    }
}
