<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('users.index');
});

Route::resource('users',UserController::class);
