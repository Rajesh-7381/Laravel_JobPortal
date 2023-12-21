<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api routes
// Route::get('/',[HomeController::class,'index'])->name('home');
// Route::get('/account/register',[AccountController::class,'registration'])->name('Account.registration');
// Route::post('/account/process-register',[AccountController::class,'processregistration'])->name('Account.processregistration');
// Route::get('/account/login',[AccountController::class,'login'])->name('Account.login');

// Route::group(["middleware"=>["auth.api"]],function(){
//     Route::get('profile',[AccountController::class,'profile'])->name('profile');
// Route::get('refresh',[AccountController::class,'refresh'])->name('refresh');
// Route::get('logout',[AccountController::class,'logout'])->name('logout');
// });
