<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    public $timestamps = false;

    public $fillable = ['value','language_id','semantc_id'];

    public function themes(){
     return $this->belongsToMany('App/Themes');
    }
}
