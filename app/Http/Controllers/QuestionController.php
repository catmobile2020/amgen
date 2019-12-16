<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Question::all();
        return view('survey.index', compact('surveys'));
    }


    public function set(Set $set)
    {
        $surveys = $set->questions;
        return view('survey.index', compact('surveys'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Set $set)
    {
        $sets = Set::all()->pluck('name', 'id');
        return view('survey.create',compact('sets', 'set'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string',
            'score'=>'required',
            'set_id'=>'required|exists:sets,id',
        ], [
            'title.required'=>'please enter a question...'
        ]);
        $survey = Question::create($request->all());
        return redirect('/admin/question/'.$survey->id.'/answers/create')->with('status', 'Your Question has been created .. add answers!');
    }


    public function AnswerCreate(Question $survey)
    {
        return view('survey.answer-create', compact('survey'));
    }

    public function AnswerStore(Request $request){
        $this->validate($request, [
            'answer'=>'required|string',
        ], [
            'answer.required'=>'please enter an answer first...'
        ]);
        $answer= Answer::create($request->all());
        return redirect()->back()->with('status', 'Your answer has been created .. add another one');
    }

    public function AnswerDelete(Answer $answer){


        if($answer->results()->count() > 0){
            $answer->results()->delete();
        }
        $answer->delete();

        return redirect()->back()->with('status', 'Your answer has been Deleted With all votes');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Question $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('survey.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $this->validate($request, [
            'title'=>'required|string',
            'score'=>'required'
        ], [
            'title.required'=>'please enter a question...'
        ]);

        $question->update($request->all());

        return redirect()->back()->with('status', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $survey)
    {
        //
    }
}
