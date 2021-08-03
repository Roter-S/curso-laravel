<?php
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class,'index']);
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::delete('users/{user}', [UserController::class,'destroy'])->name('users.destroy');
