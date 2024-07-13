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


Route::get('pdf', 'PdfController@gerarPDF');
Route::get('pdf', 'PdfReservaController@generatePDF');
// Route ::get('/encomenda/pdf', [PDFController::class,"pdf"] )-> name('encomenda.pdf');

Route::post('/encomenda/search', [EncomendaController::class,"search"])->name('encomenda.search');
Route::get('/encomenda/chart',[EncomendaController::class, "chart"])-> name ("encomenda.chart");
Route::resource('encomenda', EncomendaController::class);



Route::resource('reserva', ReservaController::class);
Route::post('/reserva/search', [ReservaController::class,"search"])->name('reserva.search');
Route::resource('categoria_reserva', CategoriaReservaController::class);
Route::post('/categoria_reserva/search', [CategoriaReservaController::class,"search"])->name('categoria_reserva.search');
Route::get('/reserva/chart',[ReservaController::class, "chart"])-> name ("reserva.chart");


Route::resource('sugestao', SugestaoController::class);
Route::post('/sugestao/search', [SugestaoController::class,"search"])->name('sugestao.search');



Route::resource('personalizado', PersonalizadoController::class);
Route::post('/personalizado/search', [PersonalizadoController::class,"search"])->name('personalizado.search');



Route::resource('inscricao', InscricaoController::class);
 Route::post('/inscricao/search', [InscricaoController::class, "search"])->name('inscricao.search');

