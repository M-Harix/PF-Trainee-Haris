<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('users',UserController::class);
Route::post('delete/{id}',[UserController::class,'destroy'])->name('destroy');