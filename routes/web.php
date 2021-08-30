<?php

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeListController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PositionListController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
   Route::view('/', 'home')->name('home');

   Route::get('/positions/list', PositionListController::class)->name('positions.list');
   Route::resource('/positions', PositionController::class)->except(['show']);

   Route::get('/employees/list', EmployeeListController::class)->name('employees.list');
   Route::resource('/employees', EmployeeController::class)->except(['show']);
});
