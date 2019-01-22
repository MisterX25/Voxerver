<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'title'];

    public function words(){
        return $this->belongsToMany('App/Words');
    }
}
