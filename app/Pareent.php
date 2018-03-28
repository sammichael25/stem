<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pareent extends Model
{
    //
    protected $fillable = [
        'pfname',
        'plname',
        'type',
        'address_id',
        'contact_id'
    ];

    public function Student(){
        return $this->belongsToMany('App\Student');
    }

    public function Address(){
        return $this->belongsTo('App\Address');
    }

    public function Contact(){
        return $this->belongsTo('App\Contact');
    }
}
