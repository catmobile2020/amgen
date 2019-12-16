<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'status',
        'score',
        'set_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $with=['answers'];

    public function answers (){
        return $this->hasMany('App\Answer');
    }

    public function set(){
        return $this->belongsTo('App\Set');
    }

    public function results()
    {
        return $this->hasMany('App\SurveyAnswers');
    }
}
