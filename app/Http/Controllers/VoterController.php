<?php

namespace App\Http\Controllers;

use App\Question;
use App\voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters = voter::all();

        return view('offers.index',compact('voters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(voter $voter)
    {
        $questions = Question::whereStatus(1)->get();
        return view('offers.edit', compact('voter', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(voter $voter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voter $voter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(voter $voter)
    {
        //
    }
}
