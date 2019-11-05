<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->hasMany('App/User');
    }

}
