<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('users.index');
});
Route::get('users/download',[UserController::class,'index'])->name('users.download');
Route::resource('users',UserController::class);
