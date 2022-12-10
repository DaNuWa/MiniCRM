<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return to_route('companies.index');
});

Auth::routes();

Route::get('/register', function () {
    return to_route('companies.index');
});

Route::group(['middleware' => 'auth'], function(){
    Route::resource('companies', CompanyController::class);
    Route::resource('users', UserController::class);
});


