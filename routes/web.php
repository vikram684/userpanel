<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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
    return view('index');
});

Auth::routes(['verify' => true]);

// admin
Route::prefix('admin')->middleware(['auth','verified'])->name('admin.')->group(function(){
    Route::resource('/users',UserController::class);
    Route::post('/users/changeStatus', [UserController::class, 'changeStatus'])->name('users.updateStatus');
    Route::get('/users/userDetails', [UserController::class, 'getUserDetails'])->name('users.getUserDetails');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
