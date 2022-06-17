<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrendaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\LineaPedidoController;
use App\Http\Controllers\CategoriaoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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
    return view('auth.login');
})->name('welcome');
Route::resource('prendas',PrendaController::class)->middleware('auth');
Route::resource('servicios',ServicioController::class)->middleware('auth');
Route::resource('tarifas',TarifaController::class)->middleware('auth');
Route::resource('clientes',ClienteController::class)->middleware('auth');
Route::resource('pedidos',PedidoController::class)->middleware('auth');
Route::resource('categorias',CategoriaoController::class)->middleware('auth');
Route::resource('lineas',LineaPedidoController::class)->middleware('auth');
//rutas del ajax
Route::post('ajax/tarifa',[AjaxController::class,'precio'])->name('ajax.tarifa');
Route::post('ajax/cliente',[AjaxController::class,'cliente'])->name('ajax.cliente');

//login
Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'store'])->name('login.store');
Route::post('/logout',[LoginController::class,'destroy'])->name('login.destroy');
//register
Route::get('register',[RegisterController::class,'index'])->name('register.index');
Route::post('register',[RegisterController::class,'store'])->name('register.store');
//sistema de logs
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);