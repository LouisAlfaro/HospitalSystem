<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HospitalController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

   
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
    Route::get('hospitales/crear', [HospitalController::class, 'showCreateForm'])->name('hospitals.create');
    Route::post('hospitales/crear', [HospitalController::class, 'registrar'])->name('hospitals.store');

    Route::get('hospitales/{id}/editar', [HospitalController::class, 'editForm'])->name('hospitals.edit');
    Route::post('hospitales/{id}/editar', [HospitalController::class, 'actualizar'])->name('hospitals.update');

    Route::delete('hospitales/{id}', [HospitalController::class, 'eliminar'])->name('hospitals.delete');

    Route::get('hospitales/{id}/confirm-delete', [HospitalController::class, 'confirmDelete'])->name('hospitals.confirmDelete');
    Route::delete('hospitales/{id}', [HospitalController::class, 'eliminar'])->name('hospitals.delete');
    
    Route::get('hospitales', [HospitalController::class, 'listar'])->name('hospitals.list');


    Route::get('hospitales/buscar', function () {
        return view('hospitals.search');
    })->name('hospitals.search');
});
