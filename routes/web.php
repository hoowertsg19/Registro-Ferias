<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeriaController;
use App\Http\Controllers\EmprendedorController;
use App\Models\Feria;
use App\Models\Emprendedor;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard con contadores
Route::get('/dashboard', function () {
    return view('dashboard', [
        'feriasCount' => Feria::count(),
        'emprendedoresCount' => Emprendedor::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Recursos protegidos por autenticación
Route::middleware(['auth'])->group(function () {
    Route::resource('ferias', FeriaController::class);
    Route::resource('emprendedores', EmprendedorController::class)->parameters([
        'emprendedores' => 'emprendedor'
    ]);
});

require __DIR__.'/auth.php';
