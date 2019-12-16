<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $fillable = [
        'name',
        'type',
        'level',
        'team_id',
        'category_id',
        'is_used',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $with=['questions','category'];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function results()
    {
        return $this->hasMany('App\SurveyAnswers');
    }
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
