<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'dob',
        'sex',
        'degree',
        'driver',
        'status',
        'career',
        'shirt',
        'allergy',
        'meal',
        'type',
        'yr',
        'address_id',
        'contact_id',
        'emgccontact_id'
    ];
    
    public function Address(){

        return $this->belongsTo('App\Address');

    }

    public function Contact(){

        return $this->belongsTo('App\Contact');

    }

    public function Emgccontact(){

        return $this->belongsTo('App\Emgccontact');

    }
    
}
