<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'index'])->name('index');

Route::post('/confirm', [ContactController::class, 'confirm']);

Route::post('/back', [ContactController::class, 'back']);

Route::post('/thanks', [ContactController::class, 'create']);

Route::get('/admin', [ContactController::class, 'admin']);

Route::post('/delete/{id}', [ContactController::class, 'delete']);

Route::get('/search', [
  ContactController::class,
  'search'
]);