<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkillsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/partners/archive',[App\Http\Controllers\PartnerController::class,'archive'])->name('partners.archive');
Route::get('/partners/all',[App\Http\Controllers\PartnerController::class,'all'])->name('partners.all');
// Route::get('/partners/all', 'App\Http\Controllers\PartnerController@all')->name('partners.all');    

Route::resource('partners', PartnerController::class)->middleware('auth');
Route::resource('adverts',AdvertController::class)->middleware('auth');
Route::resource('roles',RoleController::class)->middleware('auth');
Route::resource('skills',SkillsController::class)->middleware('auth');




