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
        Route::get('/create', 'App\Http\Controllers\Admin\Test\UserController@create')->name('user.create.index');
        Route::post('/store', 'App\Http\Controllers\Admin\Test\UserController@store')->name('user.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\Test\UserController@edit')->name('user.edit.index');
        Route::patch('/{id}', 'App\Http\Controllers\Admin\Test\UserController@update')->name('user.update');
        Route::patch('/updateRole', 'App\Http\Controllers\Test\User\UserController@updateRole')->name('user.update_role');
        Route::get('/', 'App\Http\Controllers\Admin\Test\UserController@index')->name('user.index');
    });
    Route::prefix('sla')->group(function (){
        Route::get("/priority", "App\Http\Controllers\Admin\Test\SlaController@priority")->name("sla.priority");
        Route::get("/priority-spdv", "App\Http\Controllers\Admin\Test\SlaController@prioritySPDV")->name("sla.priority-spdv");
        Route::get("/priority-qlyc", "App\Http\Controllers\Admin\Test\SlaController@priorityQLYC")->name("sla.priority-qlyc");
    });
    Route::prefix('ticket')->group(function (){
        Route::get("/", "App\Http\Controllers\Admin\Test\TicketController@index")->name("ticket.index");
    });
    Route::group(['prefix' => 'files'], function() {
        Route::get('/', 'App\Http\Controllers\Admin\Site\FilesController@index')->name('files.index');
        Route::get('/edit/{id}', 'App\Http\Controllers\Admin\Site\FilesController@edit')->name('files.edit');
    });
    Route::get('/', [App\Http\Controllers\Admin\Site\HomeController::class, 'index'])->name('home');
    Route::get("/serviceProduct", "App\Http\Controllers\Admin\Test\ServiceProductController@index")->name("admin.serviceProduct.index");
    Route::get("/getMail", "App\Http\Controllers\Admin\Test\MailController@index")->name("admin.mail.index");
    Route::get("/role", "App\Http\Controllers\Admin\Test\RoleController@index")->name("admin.role.index");
    Route::get("/unit", "App\Http\Controllers\Admin\Test\UnitController@index")->name("admin.unit.index");
});

Route::get("/test", "App\Http\Controllers\Admin\Test\TestController@index")->name("admin.test.index");
Route::get("/customer", "App\Http\Controllers\Admin\Test\CustomerController@index")->name("admin.customer.index");

Route::get("/delegate", "App\Http\Controllers\Admin\Test\DelegateController@index")->name("admin.delegate.index");
