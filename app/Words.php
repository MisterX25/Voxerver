<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Themes;

class Words extends Model
{
    public $timestamps = false;

    protected $fillable = ['value','language_id','semantic_id'];

    public function themes(){
        return $this->belongsToMany('App\Themes');
    }
}
