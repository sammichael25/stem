<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centerattendance extends Model
{
    //
    protected $fillable = [
        'last_session_date',
        'last_session_total',
        'last_session_males',
        'last_session_females',
        'stemcenter_id'
    ];

    public function Stemcenter(){

        return $this->belongsTo('App\Stemcenter');

    }
}
