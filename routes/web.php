<?php

use App\Http\Controllers\Index\IndexController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'index']);

Auth::routes();

//Route::post('login', [
//    'as' => '',
//    'uses' => 'Auth\LoginController@login'
//]);

Route::get('/{any}', [IndexController::class, 'index'])->where('any', '.*');;
