<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
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
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');


Route::group(['account'], function () {
    // guest routes
    Route::group(['middleware' => 'guest'], function () {
  
        Route::get('/account/register', [AccountController::class, 'registration'])->name('account.registration');
        Route::post('/account/process-register', [AccountController::class, 'processregistration'])->name('account.processregistration');
        Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });

    // authenticated route
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::put('/update-profile', [AccountController::class, 'updateprofile'])->name('account.updateprofile');
        Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
        Route::post('/updateprofilepic', [AccountController::class, 'updateprofilepic'])->name('account.updateprofilepic');
        Route::get('/createjob', [AccountController::class, 'createjob'])->name('account.createjob');
        Route::post('/savejob', [AccountController::class, 'savejob'])->name('account.savejob');
        Route::get('/myjobs', [AccountController::class, 'myjobs'])->name('account.myjobs');
        Route::get('/editjob/{jobid}', [AccountController::class, 'editjob'])->name('account.editjob');
        Route::post('/updatejob/{jobid}', [AccountController::class, 'updatejob'])->name('account.updatejob');
        Route::post('/deletejob', [AccountController::class, 'deletejob'])->name('account.deletejob');

    });
});
