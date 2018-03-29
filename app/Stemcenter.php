<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stemcenter extends Model
{
    //
    //protected $table = 'stemcenters';

    protected $fillable = [
        'name',
        'type',
        'wifiPassword',
        'males',
        'females',
        'busary',
        'incidents',
        'last_session_total',
        'last_session',
        'school_id'
    ];

    public function Addition(){

        return $this->hasMany('App\Addition');

    }

    public function School(){

        return $this->belongsTo('App\School');

    }
}
