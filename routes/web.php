<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductAjaxController;
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
    return view('welcome');
});

// Route::resource('products-ajax-crud', ProductAjaxController::class);

Route::resource('products-ajax-crud', ProductAjaxController::class);
Route::group([ 'middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::resource('company', CompaniesController::class);
    Route::resource('employee', EmployeeController::class);

   
});
require __DIR__.'/auth.php';