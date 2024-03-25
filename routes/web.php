<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\ReservaController;
Route::get('/', function () {
});
/*
//routes/web.php
Route::get('/aluno',[AlunoController::class,"index"]);
//carrega formulario
Route::get('/aluno/create', [AlunoController::class,"create"]);
//recebe os dados do formulario para ser salvo na função store
Route::post('/aluno', [AlunoController::class,"store"])->name('aluno.store');
//destruir/excluir
// Route::get('/aluno/destroy/{$id}',[AlunoController::class,"destroy"])->name('aluno.destroy');
Route::delete('/aluno/{$id}',
[AlunoController::class,"destroy"])->name('aluno.destroy');

Route::get('/aluno/edit/{id}', [AlunoController::class,"edit"])
->name('aluno.edit');
Route::post('/aluno',
[AlunoController::class,"update"])->name('aluno.update');
*/
//pesquisa/buscar
Route::resource('encomenda', EncomendaController::class);
Route::post('/encomenda/search', [EncomendaController::class,"search"])->name('encomenda.search');

Route::resource('reserva', ReservaController::class);
Route::post('/reserva/search', [ReservaController::class,"search"])->name('reserva.search');

Route::resource('categoria_reserva', CategoriaReservaController::class);
Route::post('/categoria_reserva/search', [CategoriaReservaController::class,"search"])->name('categoria_reserva.search');

Route::resource('sugestao', SugestaoController::class);
Route::post('/sugestao/search', [SugestaoController::class,"search"])->name('sugestao.search');

