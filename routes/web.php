<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('top');
});

Route::get('/sign-up', function () {
    return view('sign-up');
})->name('sign-up');

Route::get('/users', function () {
    return view('users');
})->name('users');

Route::get('/users/{userId}', function () {
    return view('user-detail');
})->name('user-detail');

Route::get('/users/{userId}/create-record', function () {
    return view('create-record');
})->name('create-record');

Route::get('/medical-records', function () {
    return view('medical-records');
})->name('medical-records');
