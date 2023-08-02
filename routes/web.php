<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dasboard',[DasboardController::class,'index']);
Route::post('/proseslogin',[AuthController::class,'proseslogin']);

Route::middleware(['guest:user'])->group(function(){
    Route::get('/panel', function(){
        return view('auth.loginadmin');
    })->name('loginadmin');
});

Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin']);