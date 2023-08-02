<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);


Route::group(['middleware' => 'auth'], function () {
    // Home Page
    Route::get('/', [AdminController::class, 'index'])->middleware('auth');
    // Category
    Route::group(['prefix'=>'categories'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::post('/create', [CategoryController::class, 'create'])->name('create-category');
        

    });


    Route::get('/logout', [AuthController::class, 'logout']);

});