<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;

/*
|----------------------------------------------------------------
| Web Routes
|----------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [SiswaController::class, 'home'])->name('homepage');
Route::get('/list', [SiswaController::class, 'portfolioList'])->name('portfolio.list');
Route::get('/crud', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/crud/create', [SiswaController::class, 'createPage'])->name('siswa.create');
Route::get('/crud/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::middleware(['auth'])->group(function () {
    Route::post('/crud/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::delete('/crud/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');
    Route::put('/crud/edit/{id}',[SiswaController::class, 'update'])->name('siswa.update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');