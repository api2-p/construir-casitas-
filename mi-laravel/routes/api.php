<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasitaController;

// Ruta del Problema 1 (si lo estás usando)
Route::post('/maullido-misterioso', [CasitaController::class, 'descifrarMaullidoMisterioso']);

// ✅ Problema 2: Secuencia de Siesta Felina
Route::post('/longitud-siesta', [CasitaController::class, 'longitudSiesta']);

// ✅ Problema 3: Descifrando el Maullido Secreto
Route::post('/descifrar-maullido', [CasitaController::class, 'descifrarMaullido']);
