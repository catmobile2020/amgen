<?php

namespace App\Http\Controllers\api;

use App\Question;
use App\SurveyAnswers;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $voter = Team::create(['name'=>$request->name,
                                'phone'=>$request->phone,
                                'designation'=>$request->designation]);
        foreach ($request->result as $results)
        {
           SurveyAnswers::create([
               'question_id'=>$results['question'],
               'answer_id'=>$results['answer'],
               'voter_id'=>$voter->id
           ]);
        }

        return 1;
    }
}
