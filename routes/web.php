<?php

use App\Http\Controllers\CryptoController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
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

Route::get('/', [CryptoController::class, 'index'])->name('home');

Route::get('/counter', Counter::class);

Route::get('/crypto-details/{id}', [CryptoController::class, 'show'])->name('crypto.details');
