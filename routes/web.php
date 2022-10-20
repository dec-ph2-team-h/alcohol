<?php

use Illuminate\Support\Facades\Route;
use App\Models\Alcohol;
use App\Http\Controllers\AlcoholController;
use App\Http\Controllers\TwitterController;

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



// TwitterAPI実装のとりあえずの確認用の画面を表示するためのルーティング
// Route::get('/alcohol/twitter', 'App\Http\Controllers\TwitterController@index');
Route::get('/alcohol/twitter', [TwitterController::class, 'index']);

// ログインからinput画面に移動できるようにするときに
// The GET method is not supported for this route. Supported methods: POSTってエラーが出たから追加
// したけど解決できなかったからいったんおいとく
Route::get('/alcohol/input', [AlcoholController::class, 'create'])
                ->name('input');
// input.blade.phpからAlcoholControllerへ
Route::post('/alcohol/input', [AlcoholController::class, 'store']);
                

//inputのルーティング
// Route::get('/alcohol/input', function () {
//     $alcohols = Alcohol::get();
//     return view('alcohol.input',compact('alcohols'));
// })->middleware(['auth', 'verified'])->name('input');

//ouputのルーティング (これ使ってなさそう)
Route::post('/alcohol/output', function () {
    return view('output');
})->middleware(['auth', 'verified'])->name('output');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




require __DIR__.'/auth.php';
