<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $guarded = ['id'];

    public function places(){
        return $this->hasMany(Place::class);
    }
}
