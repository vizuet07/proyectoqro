<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PiezaController;

Auth::routes();

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/dock/pieza/{id}',[PiezaController::class, 'getPieza'])->name('PiezaVista');
Route::patch('/dock/pieza/edit/{id}',[PiezaController::class, 'updatePieza'])->name('PiezaEditar');
Route::patch('/dock/pieza/update/{id}', [PiezaController::class, 'updatePartStatus'])->name('PiezaActualizar');

Route::delete('/dock/pieza/delete/{id}',[PiezaController::class, 'deletePieza'])->name('PiezaEliminar');

Route::get('/vizualizador/pieza',[PiezaController::class, 'getPiezaVizualizador'])->name('PiezaVistaVizualizador');
Route::get('/vizualizador/pieza/fecha', [PiezaController::class, 'filtrarporFecha'])->name('PiezaVistaFecha');
Route::get('/vizualizador/pieza/fecha/{id}', [PiezaController::class, 'filtrarporFechaEstados'])->name('PiezaVistaFechaEstado');

    Route::post('/print-qr', [PiezaController::class, 'printQr'])->name('print.qr');
