<?php

namespace App\Http\Controllers;

use App\Question;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters = Team::all();

        return view('teams.index',compact('voters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
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
            'name'=>'required|unique:teams,name|min:4'
        ]);

        Team::create($request->all());

        return redirect('/admin/teams/')->with('status', 'Team added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(Team $voter)
    {
        $questions = Question::all();
        return view('teams.show', compact('voter', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'name'=>'required|min:4|unique:teams,name,'.$team->id
        ]);

        $team->update($request->all());

        return redirect('/admin/teams/')->with('edit', 'Team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $voter)
    {
        //
    }
}
