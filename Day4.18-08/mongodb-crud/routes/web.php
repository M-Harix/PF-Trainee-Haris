<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

Route::resource('/',AuthorController::class);

Route::get('/create', function () {
    return view('Authors.create');
})->name('create');

Route::post('/createuser',[AuthorController::class,'store'])->name('createuser');

Route::get('/edit/{id}',[AuthorController::class,'edit'])->name('edituser');

Route::put('/update/{id}',[AuthorController::class,'update'])->name('updateuser');

Route::post('/delete/{data}',[AuthorController::class,'destroy'])->name('deleteuser');