<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['employees'];

    public function user(){
        return $this->belongsTo('App\Employee');
    }
}
