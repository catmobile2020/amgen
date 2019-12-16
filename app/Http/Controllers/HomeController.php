<?php

namespace App\Http\Controllers;

use App\Team;
use App\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();

        $deact_users = Question::where('status',1)->count();
        $all_users = Team::all()->count();

        $questions = Question::whereStatus(1)->get();

        return view('home', compact( 'deact_users', 'all_users', 'questions'));
    }
}
