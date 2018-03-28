<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'address1',
        'address2',
        'city_id',
        'type'
    ];

    public function Student(){
        return $this->hasMany('App\Student');
    }

    public function Pareent(){
        return $this->hasMany('App\Pareent');
    }

    public function Employee(){
        return $this->hasMany('App\Employee');
    }

    public function City(){

        return $this->belongsTo('App\City');

    }
}
