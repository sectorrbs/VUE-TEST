<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Site\HomeController as SiteHomeController;
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


Route::get('/admin', [AdminHomeController::class, 'index'])->where('page', '.*')->middleware('auth');
Route::get('/admin/{page}', [AdminHomeController::class, 'index'])->where('page', '.*')->middleware('auth');
Route::get('/{page}', [SiteHomeController::class, 'index'])->where('page', '.*');

Auth::routes();

