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
})->name('welcome');
Route::resource('prendas',PrendaController::class);
Route::resource('servicios',ServicioController::class);
Route::resource('tarifas',TarifaController::class);
Route::resource('clientes',ClienteController::class);
Route::resource('pedidos',PedidoController::class);
Route::resource('categorias',CategoriaoController::class);
Route::resource('lineas',LineaPedidoController::class);
//rutas del ajax
Route::post('ajax/prendas',[AjaxController::class,'prenda'])->name('ajax.prenda');
Route::post('ajax/cliente',[AjaxController::class,'cliente'])->name('ajax.cliente');

//sistema de logs
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);