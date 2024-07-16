<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SugestaoController;

Route::get('/', function () {
});

//pesquisa/buscar

 //PDF
Route::get('pdf', 'PdfController@gerarPDF');
Route::get('pdf', 'PdfReservaController@generatePDF');
// Route ::get('/encomenda/pdf', [PDFController::class,"pdf"] )-> name('encomenda.pdf');


//ENCOMENDA
Route::post('/encomenda/search', [EncomendaController::class,"search"])->name('encomenda.search');
Route::get('/encomenda/chart',[EncomendaController::class, "chart"])-> name ("encomenda.chart");
Route::resource('encomenda', EncomendaController::class);


//RESERVA
Route::resource('reserva', ReservaController::class);
Route::post('/reserva/search', [ReservaController::class,"search"])->name('reserva.search');
Route::resource('categoria_reserva', CategoriaReservaController::class);
Route::post('/categoria_reserva/search', [CategoriaReservaController::class,"search"])->name('categoria_reserva.search');
Route::get('/reserva/chart',[ReservaController::class, "chart"])-> name ("reserva.chart");

//SUGESTAO
Route::resource('sugestao', SugestaoController::class);
Route::post('/sugestao/search', [SugestaoController::class,"search"])->name('sugestao.search');

