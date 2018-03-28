<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    /*protected $fillable = [
        'name',
        'rotation'
    ];*/

    //protected $table = 'schools';
    public $timestamps = false;

    public function Scontact(){
        return $this->hasMany('App\Scontact');
    }

    public function Student(){
        return $this->hasMany('App\Student');
    }

    public function Stemcenter(){
        return $this->hasOne('App\Stemcenter');
    }
}
