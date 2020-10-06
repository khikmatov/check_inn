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

use App\Http\Controllers\InnController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inn', [InnController::class, 'index']);
Route::post('/inn', [InnController::class, 'result']);
Route::get('/inn/all', [InnController::class, 'all']);
