<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('registration');
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
Route::get('/otp',[HomeController::class,'otp_form'])->name('otp_form')->middleware('isRegister');


Route::post('/registration',[HomeController::class,'register'])->name('registration.action');
Route::post('/otp',[HomeController::class,'otp'])->name('registration.otp');

