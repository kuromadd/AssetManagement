<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function User(){
        return $this->belongsTo('\App\User');
    }
    protected $fillable = [
        'user_id','image','about','youtube','facebook'
    ];
   
}
