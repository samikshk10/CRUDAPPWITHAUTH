<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CarController;



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

Route::get('/rentacar', [homeController::class, 'rentacar'])->name('rentacarbtn')->middleware(['auth']);
Route::post('/rentacar', [CarController::class, 'rentacar'])->name('renting')->middleware(['auth']);

Route::get('/', [homeController::class, 'index'])->name('dashboard')->middleware(['auth']);
Route::get('/login', [homeController::class, 'login'])->name('login');
Route::get('/signup', [homeController::class, 'signup'])->name('signup');


Route::post('/login', [MainController::class, 'loginuser'])->name('loginuser');
Route::post('/signup', [MainController::class, 'registeruser'])->name('signupuser');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');


Route::get('delete/{id}', [CarController::class, 'deleteitems']);

Route::get('edit/{id}', [CarController::class, 'edititems'])->middleware(['auth']);
Route::post('/edit', [CarController::class, 'updateitems'])->name('updateCar')->middleware(['auth']);
