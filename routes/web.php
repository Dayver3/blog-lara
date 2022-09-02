<?php

use App\Http\Controllers\admin\adminLoginController;
use App\Http\Controllers\admin\adminMainPageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PostController;
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
Route::group(['middleware'=>'adminauth'],function (){
    //Route::post('/login',[LoginController::class,'logAction'])->name('login');
    Route::get('adminHome', [HomeController::class, 'adminHome'])->name('adminHome');


});
Route::get('/login',[LoginController::class,'indexAction'])->name('loginPage');
Route::get('/registration',[RegistrationController::class,'indexAction'])->name('registrationPage');
Route::post('/registration',[RegistrationController::class,'registrationAction'])->name('registration');
Route::get('/post',[PostController::class,'indexAction'])->name('postPage');
Route::get('/mainMenu',[MainPageController::class,'indexAction'])->name('mainMenu');
Route::get('/homePage',[HomePageController::class,'indexAction'])->name('homePage');
Route::post('/login',[LoginController::class,'loginAction'])->name('login');
Route::post('/post',[PostController::class,'postAction'])->name('post');
Route::get('/theme',[ThemeController::class,'indexAction'])->name('theme');
Route::get('/comment',[CommentController::class,'indexAction'])->name('commentPage');
Route::post('/comment',[CommentController::class,'commentAction'])->name('comment');
Route::post('/comment',[CommentController::class,'commentAction'])->name('commentComment');
Route::get('/adminLogin',[adminLoginController::class,'indexAdminAction'])->name('adminLoginPage');
Route::post('/adminLogin',[adminLoginController::class,'adminLoginAction'])->name('adminLogin');
Route::get('/adminMainPage',[adminMainPageController::class,'indexAction'])->name('adminMainPage');
