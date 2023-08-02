<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresensiController;
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
<<<<<<< HEAD
    Route::get('/dashboard',[DasboardController::class,'index']);
    Route::get('/proseslogout',[AuthController::class,'proseslogout']);

});

Route::get('/dashboard',[DasboardController::class,'index']);
=======
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/proseslogout',[AuthController::class,'proseslogout']);

    //presensi
    Route::get('/presensi/create',[PresensiController::class,'create']);
    });



Route::get('/dashboard',[DashboardController::class,'index']);
>>>>>>> 59b153b6d34264805f5ea974c9d5398849b8bc3d
Route::post('/proseslogin',[AuthController::class,'proseslogin']);

Route::middleware(['guest:user'])->group(function(){
    Route::get('/panel', function(){
        return view('auth.loginadmin');
    })->name('loginadmin');

    
});

<<<<<<< HEAD
Route::post('/prosesloginadmin',[AuthController::class,'prosesloginadmin']);
Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin']);
=======
Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin']);




>>>>>>> 59b153b6d34264805f5ea974c9d5398849b8bc3d
