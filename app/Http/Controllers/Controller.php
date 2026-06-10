<?php

namespace App\Http\Controllers;

abstract class Controller
{
   $stats = Stat::all();
    $profile = Profile::first();
    $projects = Project::all();
    return view('home', compact('stats', 'profile', 'projects'));
}
