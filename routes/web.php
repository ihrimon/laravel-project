<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profile;

Route::get('/', function () {
    $profile = Profile::first();
    return view('pages.home', compact('profile'));
});
