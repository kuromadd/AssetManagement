<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bureau extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =[
        'name','type','block_id','etage','service_id',
    ]; 

    public function block()
    {
        return $this->belongsTo('\App\block');
    }

    public function assets()
    {
        return $this->hasMany('\App\asset');
    }
}
