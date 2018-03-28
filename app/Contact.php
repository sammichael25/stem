<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'mobile1',
        'mobile2',        
        'home',
        'work',        
        'email1',        
        'email2',
        'type'        
                
    ];

    //protected $table = 'contacts';

    public function Student(){
        return $this->hasOne('App\Student');
    }

    public function Pareent(){
        return $this->hasOne('App\Pareent');
    }

    public function Employee(){
        return $this->hasOne('App\Employee');
    }

    public function Emgccontact(){
        return $this->hasOne('App\Emgccontact');
    }

    public function Scontact(){
        return $this->hasOne('App\Scontact');
    }
}
