<?php

use App\Http\Controllers\ConfiguracioneController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');


// rutas para el admnin-usuarios 
Route::controller(UsuarioController::class)->middleware('auth')->group(function(){
    Route::get('/admin/usuarios', 'index')->name('admin.usuarios.index')->middleware('can:admin.usuarios.index');
    Route::get('/admin/usuarios/create', 'create')->name('admin.usuarios.create')->middleware('can:admin.usuarios.create');
    Route::post('/admin/usuarios/create', 'store')->name('admin.usuarios.store')->middleware('can:admin.usuarios.store');
    Route::get('/admin/usuarios/{id}',  'show')->name('admin.usuarios.show')->middleware('can:admin.usuarios.show');
    Route::get('/admin/usuarios/{id}/edit', 'edit')->name('admin.usuarios.edit')->middleware('can:admin.usuarios.edit');
    Route::put('/admin/usuarios/{id}', 'update')->name('admin.usuarios.update')->middleware('can:admin.usuarios.update');
    Route::get('/admin/usuarios/{id}/confirm-delete',  'confirmDelete')->name('admin.usuarios.confirmDelete')->middleware('can:admin.usuarios.confirmDelete');
    Route::delete('/admin/usuarios/{id}',  'destroy')->name('admin.usuarios.destroy')->middleware('can:admin.usuarios.destroy');
});

//rutas para secretarias 
Route::controller(SecretariaController::class)->middleware('auth')->group(function(){
    Route::get('/admin/secretarias', 'index')->name('admin.secretarias.index')->middleware('can:admin.secretarias.index');
    Route::get('/admin/secretarias/create', 'create')->name('admin.secretarias.create')->middleware('can:admin.secretarias.create');
    Route::post('/admin/secretarias/store', 'store')->name('admin.secretarias.store')->middleware('can:admin.secretarias.store');
    Route::get('/admin/secretarias/{id}', 'show')->name('admin.secretarias.show')->middleware('can:admin.secretarias.show');
    Route::get('/admin/secretarias/{id}/edit',  'edit')->name('admin.secretarias.edit')->middleware('can:admin.secretarias.edit');
    Route::put('/admin/secretarias/{id}', 'update')->name('admin.secretarias.update')->middleware('can:admin.secretarias.update');
    Route::get('/admin/secretarias/{id}/confirm-delete',  'confirmDelete')->name('admin.secretarias.confirmDelete')->middleware('can:admin.secretarias.confirmDelete');
    Route::delete('/admin/secretarias/{id}', 'destroy')->name('admin.secretarias.destroy')->middleware('can:admin.secretarias.destroy');
});

//rutas para pacientes 
Route::controller(PacienteController::class)->middleware('auth')->group(function(){
    Route::get('/admin/pacientes', 'index')->name('admin.pacientes.index')->middleware('can:admin.pacientes.index');
    Route::get('/admin/pacientes/create', 'create')->name('admin.pacientes.create')->middleware('can:admin.pacientes.create');
    Route::post('/admin/pacientes/create', 'store')->name('admin.pacientes.store')->middleware('can:admin.pacientes.store');
    Route::get('/admin/pacientes/{id}', 'show')->name('admin.pacientes.show')->middleware('can:admin.pacientes.show');
    Route::get('/admin/pacientes/{id}/edit',  'edit')->name('admin.pacientes.edit')->middleware('can:admin.pacientes.edit');
    Route::put('/admin/pacientes/{id}', 'update')->name('admin.pacientes.update')->middleware('can:admin.pacientes.update');
    Route::get('/admin/pacientes/{id}/confirm-delete',  'confirmDelete')->middleware('can:admin.pacientes.confirmDelete');
    Route::delete('/admin/pacientes/{id}', 'destroy')->name('admin.pacientes.destroy')->middleware('can:admin.pacientes.destroy');
});

//rutas para consultorios  
Route::controller(ConsultorioController::class)->middleware('auth')->group(function(){
    Route::get('/admin/consultorios', 'index')->name('admin.consultorios.index')->middleware('can:admin.consultorios.index');
    Route::get('/admin/consultorios/create', 'create')->name('admin.consultorios.create')->middleware('can:admin.consultorios.create');
    Route::post('/admin/consultorios/create', 'store')->name('admin.consultorios.store')->middleware('can:admin.consultorios.store');
    Route::get('/admin/consultorios/{id}', 'show')->name('admin.consultorios.show')->middleware('can:admin.consultorios.show');
    Route::get('/admin/consultorios/{id}/edit',  'edit')->name('admin.consultorios.edit')->middleware('can:admin.consultorios.edit');
    Route::put('/admin/consultorios/{id}', 'update')->name('admin.consultorios.update')->middleware('can:admin.consultorios.update');
    Route::get('/admin/consultorios/{id}/confirm-delete',  'confirmDelete')->middleware('can:admin.consultorios.confirmDelete');
    Route::delete('/admin/consultorios/{id}', 'destroy')->name('admin.consultorios.destroy')->middleware('can:admin.consultorios.destroy');
});

//rutas para doctores  
Route::controller(DoctorController::class)->middleware('auth')->group(function(){
    Route::get('/admin/doctores', 'index')->name('admin.doctores.index')->middleware('can:admin.doctores.index');
    //falta can 
    Route::get('/admin/doctores/reporte', 'reporte')->name('admin.doctores.reporte')->middleware('can:admin.doctores.reporte');

    Route::get('/admin/doctores/create', 'create')->name('admin.doctores.create')->middleware('can:admin.doctores.create');
    Route::post('/admin/doctores/store', 'store')->name('admin.doctores.store')->middleware('can:admin.doctores.store');
    Route::get('/admin/doctores/{id}', 'show')->name('admin.doctores.show')->middleware('can:admin.doctores.show');
    Route::get('/admin/doctores/{id}/edit',  'edit')->name('admin.doctores.edit')->middleware('can:admin.doctores.edit');
    Route::put('/admin/doctores/{id}', 'update')->name('admin.doctores.update')->middleware('can:admin.doctores.update');
    Route::get('/admin/doctores/{id}/confirm-delete',  'confirmDelete')->middleware('can:admin.doctores.confirmDelete');
    Route::delete('/admin/doctores/{id}', 'destroy')->name('admin.doctores.destroy')->middleware('can:admin.doctores.destroy');

});


//rutas para horarios  
Route::controller(HorarioController::class)->middleware('auth')->group(function(){
    Route::get('/admin/horarios', 'index')->name('admin.horarios.index')->middleware('can:admin.horarios.index');
    Route::get('/admin/horarios/create', 'create')->name('admin.horarios.create')->middleware('can:admin.horarios.create');
    Route::post('/admin/horarios/create', 'store')->name('admin.horarios.store')->middleware('can:admin.horarios.store');
    Route::get('/admin/horarios/{id}', 'show')->name('admin.horarios.show')->middleware('can:admin.horarios.show');
    Route::get('/admin/horarios/{id}/edit',  'edit')->name('admin.horarios.edit')->middleware('can:admin.horarios.edit');
    Route::put('/admin/horarios/{id}', 'update')->name('admin.horarios.update')->middleware('can:admin.horarios.update');
    Route::get('/admin/horarios/{id}/confirm-delete',  'confirmDelete')->middleware('can:admin.horarios.confirmDelete');
    Route::delete('/admin/horarios/{id}', 'destroy')->name('admin.horarios.destroy')->middleware('can:admin.horarios.destroy');
});

//AJAX
Route::get('/admin/horarios/consultorios/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_consultorios'])->name('admin.horarios.cargar_datos_consultorios')->middleware('can:admin.horarios.cargar_datos_consultorios');


//rutas para el suuario
Route::get('/consultorios/{id}', [App\Http\Controllers\WebController::class, 'cargar_datos_consultorios'])->name('cargar_datos_consultorios');

Route::get('/cargar_reserva_barberos/{id}', [App\Http\Controllers\WebController::class, 'cargar_reserva_barberos'])->name('cargar_reserva_barberos')->middleware('auth','can:cargar_reserva_barberos');

Route::get('admin/ver_reservas/{id}', [App\Http\Controllers\AdminController::class, 'ver_reservas'])->name('admin.ver_reservas')->middleware('auth','can:admin.ver_reservas');

Route::post('/admin/eventos/create', [App\Http\Controllers\EventController::class, 'store'])->name('admin.eventos.create')->middleware('auth','can:admin.eventos.create');
Route::delete('/admin/eventos/destroy/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('admin.eventos.destroy')->middleware('auth','can:admin.eventos.destroy');


Route::controller(ConfiguracioneController::class)->middleware('auth')->group(function(){
    Route::get('/admin/configuraciones', 'index')->name('admin.configuraciones.index')->middleware('can:admin.configuraciones.index');
    Route::get('/admin/configuraciones/create',  'create')->name('admin.configuraciones.create')->middleware('can:admin.configuraciones.create');
    Route::post('/admin/configuraciones/create',  'store')->name('admin.configuraciones.store')->middleware('can:admin.configuraciones.store');
    Route::get('/admin/configuraciones/{id}', 'show')->name('admin.configuraciones.show')->middleware('can:admin.configuraciones.show');
    Route::get('/admin/configuraciones/{id}/edit', 'edit')->name('admin.configuraciones.edit')->middleware('can:admin.configuraciones.edit');
    Route::put('/admin/configuraciones/{id}', 'update')->name('admin.configuraciones.update')->middleware('can:admin.configuraciones.update');
    Route::get('/admin/configuraciones/{id}/confirm-delete', 'confirmDelete')->name('admin.configuraciones.confirmDelete')->middleware('can:admin.configuraciones.confirmDelete');
    Route::delete('/admin/configuraciones/{id}',  'destroy')->name('admin.configuraciones.destroy')->middleware('can:admin.configuraciones.destroy');

});

//rutas para reservas
Route::get('/admin/reservas/reportes', [App\Http\Controllers\EventController::class, 'reportes'])->name('admin.reservas.reportes');

Route::get('/admin/reservas/pdf', [App\Http\Controllers\EventController::class, 'pdf'])->name('admin.reservas.pdf');

Route::get('/admin/reservas/pdf_fechas', [App\Http\Controllers\EventController::class, 'pdf_fechas'])->name('admin.reservas.pdf_fechas');


//rutas para historial clinico   
Route::controller(HistorialController::class)->middleware('auth')->group(function(){
    Route::get('/admin/historial', 'index')->name('admin.historial.index')->middleware('can:admin.historial.destroy');
    //falta can 
    Route::get('/admin/historial/reporte', 'reporte')->name('admin.historial.reporte')->middleware('can:admin.historial.reporte');

    Route::get('/admin/historial/create', 'create')->name('admin.historial.create')->middleware('can:admin.historial.destroy');
    Route::post('/admin/historial/create', 'store')->name('admin.historial.store')->middleware('can:admin.historial.destroy');
    Route::get('/admin/historial/{id}', 'show')->name('admin.historial.show')->middleware('can:admin.historial.destroy');
    Route::get('/admin/historial/{id}/edit',  'edit')->name('admin.historial.edit')->middleware('can:admin.historial.destroy');
    Route::put('/admin/historial/{id}', 'update')->name('admin.historial.update')->middleware('can:admin.historial.destroy');
    Route::get('/admin/historial/{id}/confirm-delete',  'confirmDelete')->middleware('can:admin.historial.confirmDelete');
    Route::delete('/admin/historial/{id}', 'destroy')->name('admin.historial.destroy')->middleware('can:admin.historial.destroy');

});




