<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'score',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function answers(){
        return $this->hasMany('App\SurveyAnswers');
    }

    public function sets(){
        return $this->hasMany('App\Set');
    }

    public function results()
    {
        return $this->hasMany('App\SurveyAnswers');
    }
}
