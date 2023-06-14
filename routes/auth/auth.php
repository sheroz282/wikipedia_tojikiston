<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

//Authentication Routes...
Route::get('login','App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login','App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
//Route::get('register','App\Http\Controllers\Auth\RegisterController@register')->name('register');

Auth::routes();

// Password Reset Routes...
//Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
