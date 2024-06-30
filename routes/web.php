<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SugestaoController;
use App\Http\Controllers\PersonalizadoController;
use App\Http\Controllers\InscricaoController;

Route::get('/', function () {
});

//pesquisa/buscar
Route::resource('encomenda', EncomendaController::class);
Route::post('/encomenda/search', [EncomendaController::class,"search"])->name('encomenda.search');

Route::resource('reserva', ReservaController::class);
Route::post('/reserva/search', [ReservaController::class,"search"])->name('reserva.search');

Route::resource('categoria_reserva', CategoriaReservaController::class);
Route::post('/categoria_reserva/search', [CategoriaReservaController::class,"search"])->name('categoria_reserva.search');

Route::resource('sugestao', SugestaoController::class);
Route::post('/sugestao/search', [SugestaoController::class,"search"])->name('sugestao.search');

Route::resource('personalizado', PersonalizadoController::class);
Route::post('/personalizado/search', [PersonalizadoController::class,"search"])->name('personalizado.search');

Route::resource('inscricao', InscricaoController::class);
    Route::post('/inscricao/search', [InscricaoController::class, "search"])->name('inscricao.search');