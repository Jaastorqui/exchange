<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = ['id', 'name'];	


    public function prices()
    {
        return $this->hasMany('App\Price', 'origin');
    }
}
