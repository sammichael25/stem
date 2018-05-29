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
        'subject',
        'shirt',
        'allergy',
        'meal',
        'type',
        'yr',
        'region',
        'address_id',
        'contact_id'
    ];
    
    public function Address(){

        return $this->belongsTo('App\Address');

    }

    public function Contact(){

        return $this->belongsTo('App\Contact');

    }
    
}
