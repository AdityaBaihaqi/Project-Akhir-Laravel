<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\GedungController;


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

Route::get('/', function () {
    return view('welcome');
});

// Route AdminLTE
Route::get(
    '/home',
    [HomeController::class, 'index']
);

Route::get(
    '/aboutus',
    [HomeController::class, 'aboutus']
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Kategori, Inventaris, dan Gedung
Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('inventaris', InventarisController::class)->middleware('auth');
Route::resource('gedung', GedungController::class)->middleware('auth');

//Export PDF Data Kategori, Inventaris, dan Gedung
Route::get('kategoripdf',[KategoriController::class, 'kategoriPDF'])->middleware('auth');
Route::get('inventarispdf',[InventarisController::class, 'inventarisPDF'])->middleware('auth');
Route::get('gedungpdf',[GedungController::class, 'gedungPDF'])->middleware('auth');

//Export Excel Data Kategori, Inventaris, dan Gedung
Route::get('kategoricsv',[KategoriController::class, 'kategoricsv'])->middleware('auth');
Route::get('inventariscsv',[InventarisController::class, 'inventariscsv'])->middleware('auth');
Route::get('gedungcsv',[GedungController::class, 'gedungcsv'])->middleware('auth');

Route::get('/afterRegister', function () {
    return view('layouts.afterRegister');
});

Route::get('/users', function () {
    return view('layouts.users');
});
