<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasboardController;
use Illuminate\Support\Facades\Route;

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



Route::middleware(['guest:karyawan'])->group(function (){
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin',[AuthController::class,'proseslogin']);
});

Route::middleware(['auth:karyawan'])->group(function (){
    Route::get('/dasboard',[DasboardController::class,'index']);
    Route::get('/proseslogout',[AuthController::class,'proseslogout']);

});
