<?php

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

/** for side bar menu active */
function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();
Route::group(['namespace' => 'App\Http\Controllers\Auth'],function()
{
    // ----------------------------login -----------------------------//
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'authenticate');
        Route::get('logout', 'logout')->name('logout');
    });

    // ----------------------------- register -------------------------//
    Route::controller(RegisterController::class)->group(function () {
        Route::get('register', 'register')->name('register');
        Route::post('register','storeUser')->name('register');    
    });
});

Route::group(['namespace' => 'App\Http\Controllers'],function()
{
    // ---------------------- main dashboard ---------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::get('\home', 'index')->middleware('auth')->name('home');
    });
    // ---------------------- user controll ---------------------//
    Route::controller(UserManagementController::class)->group(function () {
        Route::get('users-profile', 'userProfilePage')->middleware('auth')->name('users-profile');
    });
});

