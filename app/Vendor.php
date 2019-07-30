<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['vendors'];

    public function user(){
        return $this->belongsTo('App\Vendor');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }
}
