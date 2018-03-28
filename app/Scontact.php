<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scontact extends Model
{
    //
    protected $fillable = [
        'fname',
        'lname',
        'position',
        'school_id',
        'contact_id'
    ];


    //protected $table = 'scontacts';

    public  function School(){
        return $this->belongsTo('App\School');
    }

    public  function Contact(){
        return $this->belongsTo('App\Contact');
    }

}
