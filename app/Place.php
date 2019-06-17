<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;
use App\Area;

class Place extends Model
{
    //
    protected $guarded = ['id'];

    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }
}
