<?php

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

Route::get('/laravel', function () {
    return view('home');
});
Route::get('/user-forget-password', [App\Http\Controllers\GuestController::class, 'forgetPassword'])->name('userForgetPassword');
Route::post('/user-forget-password-save', [App\Http\Controllers\GuestController::class, 'forgetPasswordSave'])->name('userForgetPasswordSave');
Auth::routes();
Route::middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    
    //===============   Verifikator  ===============//
    Route::get('/verifikator/indicator/list', [App\Http\Controllers\VerifikatorController::class, 'indicatorList'])->name('verifikatorIndicatorList');
    Route::get('/verifikator/indicator-detail/{id}/list', [App\Http\Controllers\VerifikatorController::class, 'indicatorDetailList'])->name('verifikatorIndicatorDetailList');
    Route::get('/verifikator/indicator-detail/{id}/update', [App\Http\Controllers\VerifikatorController::class, 'indicatorDetailUpdate'])->name('verifikatorIndicatorDetailUpdate');
    Route::post('/verifikator/indicator-detail/save', [App\Http\Controllers\VerifikatorController::class, 'indicatorDetailSave'])->name('verifikatorIndicatorDetailSave');
    
    //===============   Validator  ===============//
    Route::get('/validator/indicator/list', [App\Http\Controllers\ValidatorController::class, 'indicatorList'])->name('validatorIndicatorList');
    Route::get('/validator/indicator/create', [App\Http\Controllers\ValidatorController::class, 'indicatorCreate'])->name('validatorIndicatorCreate');
    Route::get('/validator/indicator/{id}/update', [App\Http\Controllers\ValidatorController::class, 'indicatorUpdate'])->name('validatorIndicatorUpdate');
    Route::post('/validator/indicator/save', [App\Http\Controllers\ValidatorController::class, 'indicatorSave'])->name('validatorIndicatorSave');
    Route::get('/validator/indicator/{id}/delete', [App\Http\Controllers\ValidatorController::class, 'indicatorDelete'])->name('validatorIndicatorDelete');
    Route::get('/validator/indicator-detail/{id}/list', [App\Http\Controllers\ValidatorController::class, 'indicatorDetailList'])->name('validatorIndicatorDetailList');
    Route::get('/validator/indicator-detail/create', [App\Http\Controllers\ValidatorController::class, 'indicatorDetailCreate'])->name('validatorIndicatorDetailCreate');
    Route::get('/validator/indicator-detail/{id}/update', [App\Http\Controllers\ValidatorController::class, 'indicatorDetailUpdate'])->name('validatorIndicatorDetailUpdate');
    Route::post('/validator/indicator-detail/save', [App\Http\Controllers\ValidatorController::class, 'indicatorDetailSave'])->name('validatorIndicatorDetailSave');
    Route::get('/validator/indicator-detail/{id}/delete', [App\Http\Controllers\ValidatorController::class, 'indicatorDetailDelete'])->name('validatorIndicatorDetailDelete');
    
    //===============   Produsen Data  ===============//
    Route::get('/produsen-data/indicator/list', [App\Http\Controllers\ProdusenDataController::class, 'indicatorList'])->name('produsenDataIndicatorList');
    Route::get('/produsen-data/indicator/create', [App\Http\Controllers\ProdusenDataController::class, 'indicatorCreate'])->name('produsenDataIndicatorCreate');
    Route::get('/produsen-data/indicator/{id}/update', [App\Http\Controllers\ProdusenDataController::class, 'indicatorUpdate'])->name('produsenDataIndicatorUpdate');
    Route::get('/produsen-data/indicator/{id}/delete', [App\Http\Controllers\ProdusenDataController::class, 'indicatorDelete'])->name('produsenDataIndicatorDelete');
    Route::post('/produsen-data/indicator/save', [App\Http\Controllers\ProdusenDataController::class, 'indicatorSave'])->name('produsenDataIndicatorSave');
    Route::get('/produsen-data/indicator-detail/{id}/list', [App\Http\Controllers\ProdusenDataController::class, 'indicatorDetailList'])->name('produsenDataIndicatorDetailList');
    Route::get('/produsen-data/indicator-detail/create', [App\Http\Controllers\ProdusenDataController::class, 'indicatorDetailCreate'])->name('produsenDataIndicatorDetailCreate');
    Route::get('/produsen-data/indicator-detail/{id}/update', [App\Http\Controllers\ProdusenDataController::class, 'indicatorDetailUpdate'])->name('produsenDataIndicatorDetailUpdate');
    Route::post('/produsen-data/indicator-detail/save', [App\Http\Controllers\ProdusenDataController::class, 'indicatorDetailSave'])->name('produsenDataIndicatorDetailSave');
    Route::get('/produsen-data/indicator-detail/{id}/delete', [App\Http\Controllers\ProdusenDataController::class, 'indicatorDetailDelete'])->name('produsenDataIndicatorDetailDelete');

    //===============   Admin  ===============//
    Route::get('/admin/indicator/list', [App\Http\Controllers\AdminController::class, 'indicatorList'])->name('adminIndicatorList');
    Route::get('/admin/indicator-detail/list', [App\Http\Controllers\AdminController::class, 'indicatorDetailAllList'])->name('adminIndicatorDetailAllList');
    Route::get('/admin/indicator-detail/{id}/list', [App\Http\Controllers\AdminController::class, 'indicatorDetailList'])->name('adminIndicatorDetailList');
    Route::get('/admin/user/list', [App\Http\Controllers\AdminController::class, 'userList'])->name('adminUserList');
    Route::get('/admin/user/{id}/status/update', [App\Http\Controllers\AdminController::class, 'userStatusUpdate'])->name('adminUserStatusUpdate');
    Route::get('/admin/user/{id}/delete', [App\Http\Controllers\AdminController::class, 'userDelete'])->name('adminUserDelete');
    Route::get('/admin/user-validation/list', [App\Http\Controllers\AdminController::class, 'userValidationList'])->name('adminUserValidationList');
    Route::get('/admin/user-validation/{id}/delete', [App\Http\Controllers\AdminController::class, 'userValidationDelete'])->name('adminUserValidationDelete');
    Route::get('/admin/user-regis/{id}/update', [App\Http\Controllers\AdminController::class, 'userRegisDetailUpdate'])->name('adminUserRegisUpdate');
    Route::get('/admin/user-pass/{id}/update', [App\Http\Controllers\AdminController::class, 'userForgetPasswordUpdate'])->name('adminUserForgetPasswordUpdate');
});