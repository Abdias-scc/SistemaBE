<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\PersonaController;
// Sección para las vistas estáticas de la página
Route::view('/', 'index')->name('index');
Route::view('/sobre_nosotros', 'aboutUs')->name('aboutUs');
Route::view('/login', 'auth.login')->name('login');


//Dashboard
Route::view('/dashboard', 'dashboard.index')->name('dashboard');

#Seccionen donde se mostran las vistas de las secciones de la dashboard
//Maestros

//Metodos en la seccion de estudiantes
Route::prefix('/dashboard/estudiantes')->group(function () {
    // Ruta para mostrar los estudiantes en la tabla
    Route::get('/', [PersonaController::class, 'info'])->name('estudiantes');
    // Ruta para eliminar un estudiante por su cédula
    Route::delete('/{cedula}', [PersonaController::class, 'deleteEstudiante'])
        ->where('cedula', '[0-9]+')
        ->name('deleteEstudiante');
    // Ruta para mostrar el detalle de un estudiante por su cédula
    Route::get('/{cedula}/detalle', [PersonaController::class, 'detalleEstudiante'])
        ->where('cedula', '[0-9]+');
});


Route::view('/dashboard/administradores', 'dashboard.maestro.admin')->name('admin');
Route::view('/dashboard/becados', 'dashboard.maestro.becados')->name('becados');
Route::view('/dashboard/sede', 'dashboard.maestro.sede')->name('sede');
Route::view('/dashboard/pnf', 'dashboard.maestro.pnf')->name('pnf');
Route::view('/dashboard/servicios', 'dashboard.maestro.servicio')->name('servicio');
Route::view('/dashboard/lapso', 'dashboard.maestro.lapso')->name('lapso');

//Movimientos
Route::view('/dashboard/registro_comedor', 'dashboard.movimientos.R_comedor')->name('R_comedor');
Route::view('/dashboard/solicitud_becas', 'dashboard.movimientos.S_becados')->name('S_becas');



Route::view('/dashboard/config', 'dashboard.config')->name('config');

//Servicios
Route::view('/dashboard/servicios/transporte', 'dashboard.servicios.transporte')->name('transporte');
Route::view('/dashboard/servicios/servicio_medico', 'dashboard.servicios.servicio_medico')->name('servicio_medico');
Route::view('/dashboard/servicios/comedor', 'dashboard.servicios.comedor')->name('comedor');
Route::view('/dashboard/servicios/atencion_social', 'dashboard.servicios.atencion_social')->name('atencion_social');
Route::view('/dashboard/servicios/censo', 'dashboard.reporte.censo')->name('censo');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

Route::get('/verificar-cedula', function (Illuminate\Http\Request $request) {
    $exists = \App\Models\User::where('cedula', $request->cedula)->exists();
    return response()->json(['exists' => $exists]);
});

Route::get('/verificar-email', function (Illuminate\Http\Request $request) {
    $exists = \App\Models\User::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
});


