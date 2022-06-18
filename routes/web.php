<?php

use App\Http\Controllers\NewsController;
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

Route::get('/index', [NewsController::class, 'index']);
Route::get('/show/{news}', [NewsController::class, 'show'])->name('show');
Route::get('/create', [NewsController::class, 'create']);
Route::post('/create', [NewsController::class, 'create']);
Route::match(['get', 'post'], '/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
Route::delete('/delete/{new}', [NewsController::class, 'delete']);



