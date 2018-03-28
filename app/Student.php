<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'dob',
        'sex',
        'yeargroup',
        'school_id',
        'address_id',
        'contact_id',
        'emgccontact_id'
    ];

    public function Address(){

        return $this->belongsTo('App\Address');

    }

    public function Pareent(){

        return $this->belongsToMany('App\Pareent');

    }

    public function Contact(){

        return $this->belongsTo('App\Contact');

    }

    public function Addition(){

        return $this->hasOne('App\Addition');

    }

    public function Emgccontact(){

        return $this->belongsTo('App\Emgccontact');

    }

    public function School(){

        return $this->belongsTo('App\School');

    }
}