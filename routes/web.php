<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\HomePageController;

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
    return view ('mainMenu');
});
Route::get('/login',[LoginController::class,'indexAction'])->name('loginPage');
Route::get('/registration',[RegistrationController::class,'indexAction'])->name('registrationPage');
Route::post('/registration',[RegistrationController::class,'registrationAction'])->name('registration');
Route::get('/userPage',[UserPageController::class,'indexAction'])->name('userPage');
Route::get('/mainMenu',[MainPageController::class,'indexAction'])->name('mainMenu');
Route::get('/homePage',[HomePageController::class,'indexAction'])->name('homePage');
Route::post('/login',[LoginController::class,'loginAction'])->name('login');
