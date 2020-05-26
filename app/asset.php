<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{

   public function bureau()
   {
       return $this->hasOne('\App\bureau');
   }

   public function inventaires(){
       return $this->belongsToMany('\App\inventaire')->withPivot('id','status');
   }
   
}
