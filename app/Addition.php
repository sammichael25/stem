<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    //
    protected $fillable = [
        'career',
        'shirt',
        'allergy',
        'meal',
        'type',
        'btype',
        'shoe',
        'degree',
        'stemcenter_id',
        'yr',
        'student_id'
    ];

    public function Student(){
        return $this->belongsTo('App\Student');
    }

    public function Stemcenter(){
        return $this->belongsTo('App\Stemcenter');
    }
}
