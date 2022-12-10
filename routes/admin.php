<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HabitController;
use App\Http\Controllers\Admin\EventController;
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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('dashboard');
Route::resource('/habits',HabitController::class);
Route::resource('/events',EventController::class);
