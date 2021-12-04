<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\HomesController;


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
    return view('home');
})->middleware('auth');

/*
QUIERO SUGERIR QUE USEMOS LA FORMA DE HACER TODAS RUTAS EN FORMA AUTOMATICA,
SERIA MÁS SENCILLO YA QUE SOLO SE HACE UNA POR CADA CONTROLADOR
 Route::resource('home', HomeController::class)->only
*/


Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');


//Route::get('/home', [HomesController::class, 'index']);
//Route::post('home', [HomesController::class, 'store']);
Route::resource('home', HomesController::class);
