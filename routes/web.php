<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [CustomerController::class, 'index'])->name('customer.home')->middleware("auth:web");
Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::post('/login', [CustomerController::class, 'handleLogin'])->name('customer.handleLogin');
Route::post('/add-comment', [CustomerController::class, 'addComment'])->name('customer.addComment')->middleware("auth:web");

Route::get('/admin', [AdminController::class, 'index'])->name('admin.home')->middleware("auth:admin");
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login', [AdminController::class, 'handleLogin'])->name('admin.handleLogin');
Route::post('/admin/add-comment', [AdminController::class, 'addComment'])->name('admin.addComment')->middleware("auth:admin");
