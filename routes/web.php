<?php

use App\Http\Controllers\CatController;
use \App\Http\Controllers\HomeController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|z
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/breed/{breed}', [HomeController::class, 'breed'])->name('breed');
Route::get('/{cat}', [HomeController::class, 'single'])->name('single')->where('cat', '[0-9]+');

Route::get('/setlang', [HomeController::class, 'setLang'])->name('lang.set');

Route::middleware(['auth'])->group(function() {
    Route::get('/home', function() {
        return view('home');
    })->name('home');

    Route::get('/user/profile', function() {
        return view('profile');
    })->name('profile');
    Route::resource('cats', CatController::class);
});

