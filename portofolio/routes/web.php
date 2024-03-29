<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

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
Route::get('/', [SiswaController::class,'home'])->name('homepage');
Route::get('/list', [SiswaController::class,'portfolioList'])->name('portfolio.list');
Route::get('/crud', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/crud/create', [SiswaController::class, 'createPage'])->name('siswa.create');
Route::post('/crud/siswa', [SiswaController::class, 'store'])->name('siswa.store');

// Route::get('/welcome', function () {
//     return view('welcome');
// });