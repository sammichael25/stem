<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emgccontact extends Model
{
    //
    protected $fillable = [
        'fname',
        'lname',
        'relation',
        'contact_id'
        
    ];

    public function Student(){
        return $this->hasMany('App\Student');
    }

    public function Employee(){
        return $this->hasMany('App\Employee');
    }

    public function Contact(){
        return $this->belongsTo('App\Contact');
    }
}
