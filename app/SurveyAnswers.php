<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswers extends Model
{
    protected $table = 'survey_answers';

    protected $fillable = [
        'answer_id',
        'question_id',
        'set_id',
        'team_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function set()
    {
        return $this->belongsTo('App\Set');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }
}
