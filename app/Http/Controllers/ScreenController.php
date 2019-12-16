<?php

namespace App\Http\Controllers;

use App\Category;
use App\Team;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    public function screen($type)
    {
        $rows = Category::all();
        $teams= Team::all();
        if (\request()->ajax())
        {
            return view("screen.table",compact('rows','teams'))->render();
        }
        return view("screen.{$type}",compact('rows','teams'));
    }

    public function screenSecond()
    {
        $rows = Category::all();
        $teams= Team::all();
        if (\request()->ajax())
        {
            return view("screen.table",compact('rows','teams'))->render();
        }
        return view("screen.second",compact('rows','teams'));
    }

    public function screenFirst()
    {
        $rows = Category::all();
        $teams= Team::all();
        if (\request()->ajax())
        {
            return view("screen.table",compact('rows','teams'))->render();
        }
        return view("screen.first",compact('rows','teams'));
    }
}
