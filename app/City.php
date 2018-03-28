<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    /*protected $fillable = [
        'name'
    ];*/

    protected $table = 'cities';
    public $timestamps = false;

    public function Address(){

        return $this->hasMany('App\Address');

    }
}
