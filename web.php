<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoQualityControlController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

require_once __DIR__ . "/auth/auth.php";

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('users')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('/', 'index')->name('users.index');
//            Route::get('/create/', 'create')->name('users.create');
//            Route::get('/getSortAdmin/', 'getSortAdmin')->name('users.getSortAdmin');
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

    Route::prefix('prices')
        ->controller(PriceController::class)
        ->group(function () {
            Route::get('/', 'index')->name('prices.index');
            Route::get('create','create')->name('prices.create');
            Route::get('edit/{id}','edit')->name('prices.edit');
            Route::put('update/{id}','update')->name('prices.update');
            Route::post('store','store')->name('prices.store');
            Route::delete('delete/{id}','destroy')->name('prices.delete');
        });

    Route::prefix('photo-quality')
        ->controller(PhotoQualityControlController::class)
        ->group(function (){
            Route::get('/','index')->name('photo-quality.index');
//            Route::get('create','create')->name('photo-quality.create');
            Route::get('edit/{id}','edit')->name('photo-quality.edit');
            Route::put('update/{id}','update')->name('photo-quality.update');
//            Route::post('store','store')->name('photo-quality.store');
//            Route::delete('delete/{id}','destroy')->name('photo-quality.delete');
        });

    Route::prefix('violations')
        ->controller(\App\Http\Controllers\ViolationController::class)
        ->group(function (){
            Route::get('/','index')->name('violations.index');
            Route::get('create','create')->name('violations.create');
            Route::get('edit/{id}','edit')->name('violations.edit');
            Route::put('update/{id}','update')->name('violations.update');
            Route::post('store','store')->name('violations.store');
            Route::delete('delete/{id}','destroy')->name('violations.delete');
        });

    Route::prefix('work-marriages-violations')
        ->controller(\App\Http\Controllers\WorkMarriagViolationController::class)
        ->group(function (){
            Route::get('/','index')->name('work-marriages-violations.index');
            Route::get('create','create')->name('work-marriages-violations.create');
            Route::get('edit/{id}','edit')->name('work-marriages-violations.edit');
            Route::put('update/{id}','update')->name('work-marriages-violations.update');
            Route::post('store','store')->name('work-marriages-violations.store');
            Route::delete('delete/{id}','destroy')->name('work-marriages-violations.delete');
        });

    Route::prefix('resolutions')
        ->controller(\App\Http\Controllers\ResolutionController::class)
        ->group(function (){
            Route::get('/','index')->name('resolutions.index');
            Route::get('create','create')->name('resolutions.create');
            Route::get('edit/{id}','edit')->name('resolutions.edit');
            Route::put('update/{id}','update')->name('resolutions.update');
            Route::post('store','store')->name('resolutions.store');
            Route::delete('delete/{id}','destroy')->name('resolutions.delete');
        });

    Route::prefix('invoice-payments')
        ->controller(\App\Http\Controllers\InvoicePaymentController::class)
        ->group(function (){
            Route::get('/','index')->name('invoice-payments.index');
            Route::get('create','create')->name('invoice-payments.create');
            Route::get('edit/{id}','edit')->name('invoice-payments.edit');
            Route::put('update/{id}','update')->name('invoice-payments.update');
            Route::post('store','store')->name('invoice-payments.store');
            Route::delete('delete/{id}','destroy')->name('invoice-payments.delete');
        });

    Route::prefix('refunds')
        ->controller(\App\Http\Controllers\RefundController::class)
        ->group(function (){
            Route::get('/','index')->name('refunds.index');
            Route::get('create','create')->name('refunds.create');
            Route::get('edit/{id}','edit')->name('refunds.edit');
            Route::put('update/{id}','update')->name('refunds.update');
            Route::post('store','store')->name('refunds.store');
            Route::delete('delete/{id}','destroy')->name('refunds.delete');
        });

    Route::prefix('accounts')
        ->controller(\App\Http\Controllers\AccountController::class)
        ->group(function (){
            Route::get('/','index')->name('accounts.index');
//            Route::get('create','create')->name('refunds.create');
//            Route::get('edit/{id}','edit')->name('refunds.edit');
//            Route::put('update/{id}','update')->name('refunds.update');
//            Route::post('store','store')->name('refunds.store');
//            Route::delete('delete/{id}','destroy')->name('refunds.delete');
        });

    Route::prefix('system-states')
        ->controller(\App\Http\Controllers\SystemStateController::class)
        ->group(function (){
            Route::get('/','index')->name('systems-state.index');
//            Route::get('create','create')->name('refunds.create');
//            Route::get('edit/{id}','edit')->name('refunds.edit');
//            Route::put('update/{id}','update')->name('refunds.update');
//            Route::post('store','store')->name('refunds.store');
//            Route::delete('delete/{id}','destroy')->name('refunds.delete');
        });

    Route::prefix('device-states')
        ->controller(\App\Http\Controllers\DeviceStateController::class)
        ->group(function (){
            Route::get('/','index')->name('device-state.index');
//            Route::get('create','create')->name('refunds.create');
//            Route::get('edit/{id}','edit')->name('refunds.edit');
//            Route::put('update/{id}','update')->name('refunds.update');
//            Route::post('store','store')->name('refunds.store');
//            Route::delete('delete/{id}','destroy')->name('refunds.delete');
        });

    Route::prefix('park-zones')
        ->controller(\App\Http\Controllers\ParkZoneController::class)
        ->group(function (){
            Route::get('/','index')->name('park-zones.index');
//            Route::get('create','create')->name('refunds.create');
//            Route::get('edit/{id}','edit')->name('refunds.edit');
//            Route::put('update/{id}','update')->name('refunds.update');
//            Route::post('store','store')->name('refunds.store');
//            Route::delete('delete/{id}','destroy')->name('refunds.delete');
        });

    Route::prefix('parking')
        ->controller(\App\Http\Controllers\ParkingController::class)
        ->group(function (){
            Route::get('/','index')->name('parking.index');
//            Route::get('create','create')->name('refunds.create');
//            Route::get('edit/{id}','edit')->name('refunds.edit');
//            Route::put('update/{id}','update')->name('refunds.update');
//            Route::post('store','store')->name('refunds.store');
//            Route::delete('delete/{id}','destroy')->name('refunds.delete');
        });

    Route::prefix('statistics')
        ->controller(\App\Http\Controllers\StatisticController::class)
        ->group(function (){
            Route::get('/','index')->name('statistics.index');
//            Route::get('create','create')->name('refunds.create');
//            Route::get('edit/{id}','edit')->name('refunds.edit');
//            Route::put('update/{id}','update')->name('refunds.update');
//            Route::post('store','store')->name('refunds.store');
//            Route::delete('delete/{id}','destroy')->name('refunds.delete');
        });

    Route::prefix('benefits')
        ->controller(\App\Http\Controllers\BenefitController::class)
        ->group(function (){
            Route::get('/','index')->name('benefits.index');
//            Route::get('create','create')->name('benefits.create');
//            Route::get('edit/{id}','edit')->name('benefits.edit');
//            Route::put('update/{id}','update')->name('benefits.update');
//            Route::post('store','store')->name('benefits.store');
//            Route::delete('delete/{id}','destroy')->name('benefits.delete');
        });


});

