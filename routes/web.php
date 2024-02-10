<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', [CrudController::class, 'index']);

Route::resource('home', CrudController::class);

Route::get('/', [CrudController::class,'index'])->name('home');

Route::get('/delete/{id}', [CrudController::class,'destroy'])->name('delete');
// Route::put('/update/{id}', [CrudController::class,'update'])->name('update');
