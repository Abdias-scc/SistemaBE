<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Sección para las vistas estáticas de la página
Route::view('/', 'index')->name('index');
Route::view('/sobre_nosotros', 'aboutUs')->name('aboutUs');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');
    Route::view('/dashboard/config', 'dashboard.config')->name('config');
    Route::view('/dashboard/empleado', 'dashboard.maestro.empleado')->name('empleado');
    Route::view('/dashboard/horario', 'dashboard.maestro.horario')->name('horario');
    Route::view('/dashboard/administradores', 'dashboard.admin')->name('admin');


});


Route::get('/verificar-cedula', function (Illuminate\Http\Request $request) {
    $exists = \App\Models\User::where('cedula', $request->cedula)->exists();
    return response()->json(['exists' => $exists]);
});

Route::get('/verificar-email', function (Illuminate\Http\Request $request) {
    $exists = \App\Models\User::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
});


