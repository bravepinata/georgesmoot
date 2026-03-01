<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
/*
Route::get('/', function () {
    // return view('welcome');
    return view('index');
});
*/
Route::get('/', [ResumeController::class, 'index']);
Route::post('/download', [ResumeController::class, 'download']);

/*
Route::get('/resume', [ResumeController::class, 'index']);

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
*/
