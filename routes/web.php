<?php

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
    //dd('test');
    return view('pages.index');
})->name('index');


Route::prefix('auth')->group(function(){
    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    //$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    //$this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');
});

Route::middleware('auth')->group(function(){

    Route::get('/log', function (){
        return view('pages.logviewer');
    })->name('log');

    Route::get('/profile', function (){
        return view('pages.profile');
    })->name('profile');
});

Route::middleware('auth')->prefix('admin')->group(function(){
     $this->resource('server', 'ServerController');

    Route::get('/oauth', function (){
        return view('admin.oauth');
    })->name('oauth');
});

Route::get('/home', 'HomeController@index')->name('home');
