<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventaire extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
    public function bureaus(){
        return $this->belongsToMany('\App\bureau');
    }
}
