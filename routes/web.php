<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\ArticlePostController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|-------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------
*/


// Route::get('/home', function () {
//     return view('welcome');
// });

/*---Route->ы для регистрация и авторизация---*/
require_once __DIR__ . "/auth/auth.php";

/*---Пользовательская часть Route---*/
Route::group(['middleware' => ['web']], function () {
    Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend');
    Route::get('getSearch', [\App\Http\Controllers\Frontend\HomeController::class, 'getSearch'])->name('getSearch');
    Route::get('/article', [ArticleController::class, 'index'])->name('article');
    Route::get('/categoriesFrontend', [CategoryController::class, 'getCategories'])->name('categoriesFrontend');
    Route::get('/categoryFrontend/{id}', [CategoryController::class, 'getCategoryState'])->name('categoryFrontend');
    Route::post('/articlePost', [ArticlePostController::class, 'store'])->name('articlePost');
    Route::get('/infoTJK', [ArticleController::class, 'getInfoMountain'])->name('infoTJK');
    Route::get('/hissarFortress', [ArticleController::class, 'getInfoHissar'])->name('hissarFortress');
    Route::get('/chilDuhtaron', [ArticleController::class, 'getInfoChilDuhtaron'])->name('chilDuhtaron');
    Route::get('/chaihona', [ArticleController::class, 'getInfoChaihona'])->name('chaihona');
});

/*---Админская часть Route---*/
Route::group(['middleware' => ['auth', 'role:Admin']], function () {

    Route::get('/home', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [HomeController::class, 'index'])->name('admin');

    Route::prefix('users')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('/', 'index')->name('users.index');
            Route::get('/create/', 'create')->name('users.create');
            Route::get('/edit/{id}', 'edit')->name('users.edit');
            Route::put('/update/{id}', 'update')->name('users.update');
            Route::post('/store/', 'store')->name('users.store');
            Route::delete('/delete/{id}', 'destroy')->name('users.delete');
        });

    Route::prefix('accesses')
        ->controller(AccessController::class)
        ->group(function () {
            Route::get('/', 'index')->name('accesses.index');
            Route::get('/create/', 'create')->name('accesses.create');
            Route::get('/edit/{id}', 'edit')->name('accesses.edit');
            Route::put('/update/{id}', 'update')->name('accesses.update');
            Route::post('/store/', 'store')->name('accesses.store');
            Route::delete('/delete/{id}', 'destroy')->name('accesses.delete');
        });

    Route::prefix('roles')
        ->controller(RoleController::class)
        ->group(function () {
            Route::get('/', 'index')->name('roles.index');
            Route::get('/create/', 'create')->name('roles.create');
            Route::get('/edit/{id}', 'edit')->name('roles.edit');
            Route::put('/update/{id}', 'update')->name('roles.update');
            Route::post('/store/', 'store')->name('roles.store');
            Route::delete('/delete/{id}', 'destroy')->name('roles.delete');
        });

    Route::prefix('articles')
        ->controller(\App\Http\Controllers\ArticleController::class)
        ->group(function () {
            Route::get('/', 'index')->name('articles.index');
            Route::get('/create/', 'create')->name('articles.create');
            Route::get('/editFalse/{id}', 'editFalse')->name('articles.editFalse');
            Route::get('/editTrue/{id}', 'editTrue')->name('articles.editTrue');
            Route::put('/updateFalse/{id}', 'updateFalse')->name('articles.updateFalse');
            Route::put('/updateTrue/{id}', 'updateTrue')->name('articles.updateTrue');
            Route::post('/store/', 'store')->name('articles.store');
            Route::delete('/delete/{id}', 'destroy')->name('articles.delete');
        });

    Route::prefix('categories')
        ->controller(\App\Http\Controllers\CategoryController::class)
        ->group(function () {
            Route::get('/', 'index')->name('categories.index');
            Route::get('/create/', 'create')->name('categories.create');
            Route::get('/edit/{id}', 'edit')->name('categories.edit');
            Route::put('/update/{id}', 'update')->name('categories.update');
            Route::post('/store/', 'store')->name('categories.store');
            Route::delete('/delete/{id}', 'destroy')->name('categories.delete');
        });
});
