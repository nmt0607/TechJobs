<?php

use App\Http\Livewire\Product\Index;
use App\Http\Livewire\Shop\Cart;
use App\Http\Livewire\Shop\Checkout;
use App\Http\Livewire\Shop\Index as ShopIndex;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => ['auth']], function () {
    Route::group([
        'prefix' => 'master',
    ], function () {
        Route::get('/', 'App\Http\Controllers\Admin\Config\MasterController@index')->name('admin.config.master');
    });
    Route::prefix('user')->group(function (){
        Route::get('/create', 'App\Http\Controllers\Admin\User\UserController@create')->name('user.create.index');
        Route::post('/store', 'App\Http\Controllers\Admin\User\UserController@store')->name('user.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\User\UserController@edit')->name('user.edit.index');
        Route::patch('/{id}', 'App\Http\Controllers\Admin\User\UserController@update')->name('user.update');
        Route::patch('/updateRole', 'App\Http\Controllers\Admin\User\UserController@updateRole')->name('user.update_role');
        Route::get('/', 'App\Http\Controllers\Admin\User\UserController@index')->name('user.index');
    });
    Route::group(['prefix' => 'files'], function() {
        Route::get('/', 'App\Http\Controllers\Admin\Site\FilesController@index')->name('files.index');
        Route::get('/edit/{id}', 'App\Http\Controllers\Admin\Site\FilesController@edit')->name('files.edit');
    });
    Route::get('/', [App\Http\Controllers\Admin\Site\HomeController::class, 'index'])->name('home');
    Route::get("/serviceProduct", "App\Http\Controllers\Admin\Test\ServiceProductController@index")->name("admin.serviceProduct.index");
});

Route::get("/test", "App\Http\Controllers\Admin\Test\TestController@index")->name("admin.test.index");