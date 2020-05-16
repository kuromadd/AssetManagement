<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
   public function bureau()
   {
       return $this->belongsTo('\App\bureau');
   }
   
}
