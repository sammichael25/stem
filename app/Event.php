<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'id',
        'title',
        'start_date',
        'end_date',
        'color'
    ];
}