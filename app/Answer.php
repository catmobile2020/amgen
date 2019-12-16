<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id',
        'answer',
        'is_right',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];



    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function results()
    {
        return $this->hasMany('App\SurveyAnswers');
    }

}
