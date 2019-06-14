<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function place(){
      return $this->belongsTo(Review;;class);
    }
    
    protected $fillable = array('nickname', 'text', 'country', 'feeling');
}
