<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\VisitingUserController;
use App\Models\Ventas;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});

Route::get('/denied',function () {
    return view('401error');
})->name('denied');

Route::get('/index', [VisitingUserController::class, 'index'])->name('index');

Route::resource('productos', ProductosController::class)->middleware('empleado');

Route::post('/productos/{id}/venta', [ProductosController::class,'venta'])->middleware('empleado');

Route::resource('usuarios', UsersController::class)->middleware('superAdmin');

Route::resource('ventas', VentasController::class)->middleware('empleado');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ProductosController::class, 'index'])->name('home');
});