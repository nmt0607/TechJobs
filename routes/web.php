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
    return view('home.index');
});
Route::get('/login', function () {
    if(Auth::check())
        return redirect()->route('job.index'); 
    return view('auth.login');
})->name('login');
Route::group(['middleware' => ['auth', 'route-permission']], function () {
    Route::prefix('job')->group(function (){
        Route::get("/index", "App\Http\Controllers\JobController@index")->name("job.index");
        Route::get("/detail/{id}", "App\Http\Controllers\JobController@detail")->name("job.detail");
        Route::get("/apply-list/{id}", "App\Http\Controllers\JobController@applyList")->name("job.apply-list");
        Route::get("/create", "App\Http\Controllers\JobController@create")->name("job.create");
        Route::get("/edit/{id}", "App\Http\Controllers\JobController@edit")->name("job.edit");
        Route::get("/pushlished", "App\Http\Controllers\JobController@pushlished")->name("job.pushlished");
    });
    Route::prefix('user')->group(function (){
        Route::get('/{id}', 'App\Http\Controllers\UserController@info')->name('user.info');
    });
    Route::get('chat', 'App\Http\Controllers\ChatController@index')->name('chat');
});
