<?php

namespace App\Http\Controllers;

use App\Category;
use App\Set;
use App\Team;
use Illuminate\Http\Request;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Set::all();

        return view('sets.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        return view('sets.create', compact('teams','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:4|unique:sets,name',
            'type'=>'required',
            'level'=>'required',
            'team_id'=>'required',
            'category_id'=>'required'
        ]);

        Set::create($request->all());

        return redirect('/admin/sets/')->with('status', 'Set created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function edit(Set $set)
    {
        $teams = Team::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        return view('sets.edit', compact('teams', 'set','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Set $set)
    {
        $this->validate($request,[
            'name'=>'required|min:4|unique:sets,name,'.$set->id,
            'type'=>'required',
            'level'=>'required',
            'team_id'=>'required',
            'category_id'=>'required'
        ]);

        $set->update($request->all());

        return redirect('/admin/sets/')->with('edit', 'Set');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function destroy(Set $set)
    {
        //
    }
}
