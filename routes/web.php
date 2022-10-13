<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ouputのルーティング
Route::get('/output', function () {
    return view('output');
})->middleware(['auth', 'verified'])->name('output');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//inputのルーティング
Route::get('/alcohol/input', function () {
    $alcohols = [];
    return view('alcohol.input',compact('alcohols'));
})->middleware(['auth', 'verified'])->name('input');


require __DIR__.'/auth.php';
