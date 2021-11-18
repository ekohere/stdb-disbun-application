<?php

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



Route::get('/', function () {
   return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('roles', App\Http\Controllers\RoleController::class);

Route::resource('permissions', App\Http\Controllers\PermissionController::class);

Route::resource('users', App\Http\Controllers\UserController::class);

Route::get('profil', [App\Http\Controllers\UserController::class,'profil'])->name('profil');
Route::get('editProfil/{id}', [App\Http\Controllers\UserController::class,'editProfiles']);
Route::patch('updateProfile/{id}', [App\Http\Controllers\UserController::class,'updateProfile']);


Route::resource('wilayahs', \App\Http\Controllers\WilayahController::class);

Route::resource('pelayanans', \App\Http\Controllers\PelayananController::class);

Route::resource('wilayahPelayanans', \App\Http\Controllers\WilayahPelayananController::class);

Route::resource('jenisPelayanans', \App\Http\Controllers\JenisPelayananController::class);

Route::resource('fileDownloads', \App\Http\Controllers\FileDownloadController::class);

Route::resource('tipeSyarats', \App\Http\Controllers\TipeSyaratController::class);

Route::resource('syaratPelayanans', \App\Http\Controllers\SyaratPelayananController::class);

Route::resource('itemPilihans', \App\Http\Controllers\ItemPilihanController::class);
