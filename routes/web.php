<?php

use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PersonalDepartamento;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'home']);
Route::get('/service/{id}',[HomeController::class,'service_detail']);
Route::get('page/about-us',[PageController::class,'about_us']);
Route::get('page/contact-us',[PageController::class,'contact_us']);

Route::get('/admin', function () {
    return view('deshbord');
});

// Admin Login
Route::get('admin/login',[AdminsController::class,'login']);
Route::post('admin/login',[AdminsController::class,'check_login']);
Route::get('admin/logout',[AdminsController::class,'logout']);

// Admin Dashboard
Route::get('admin',[AdminsController::class,'dashboard']);

// Room
Route::get('admin/habitaciones/{id}/delete',[HabitacionesController::class,'destroy']);
Route::resource('admin/habitaciones',HabitacionesController::class);

//tipohabitacion route
Route::get('admin/tipohabitacion/{id}/delete',[TipoHabitacionController::class,'destroy']);
Route::resource('admin/tipohabitacion',TipoHabitacionController::class);

// Customer
Route::get('admin/clientes/{id}/delete',[ClientesController::class,'destroy']);
Route::resource('admin/clientes',ClientesController::class);

// Delete Image
Route::get('admin/tipohabitacion/delete/{id}',[TipoHabitacionController::class,'destroy_image']);

// // Departamentos
// Route::get('admin/departamento/{id}/delete',[PersonalDepartamento::class,'destroy']);
// Route::resource('admin/departamento',PersonalDepartamento::class);

// // Personal Payment
// Route::get('admin/personal/payments/{id}',[PersonalController::class,'all_payments']);
// Route::get('admin/personal/payment/{id}/add',[PersonalController::class,'add_payment']);
// Route::post('admin/personal/payment/{id}',[PersonalController::class,'save_payment']);
// Route::get('admin/personal/payment/{id}/{staff_id}/delete',[PersonalController::class,'delete_payment']);

// Personal CRUD
Route::get('admin/personal/{id}/delete',[PersonalController::class,'destroy']);
Route::resource('admin/personal',PersonalController::class);

// Reservas
Route::get('admin/reservas/{id}/delete',[ReservasController::class,'destroy']);
Route::resource('admin/reservas',ReservasController::class);

Route::get('login',[ClientesController::class,'login']);
Route::post('clientes/login',[ClientesController::class,'customer_login']);
Route::get('register',[ClientesController::class,'register']);
Route::get('logout',[ClientesController::class,'logout']);

Route::get('reservas',[ReservasController::class,'front_booking']);

// Testimonial
Route::get('clientes/add-testimonial',[HomeController::class,'add_testimonial']);
Route::post('clientes/save-testimonial',[HomeController::class,'save_testimonial']);
Route::get('admin/testimonial/{id}/delete',[AdminsController::class,'destroy_testimonial']);
Route::get('admin/testimonials',[AdminsController::class,'testimonials']);

Route::post('save-contactus',[PageController::class,'save_contactus']);

// Banner Routes
Route::get('admin/banner/{id}/delete',[BannersController::class,'destroy']);
Route::resource('admin/banner',BannersController::class);

// Productos Routes
Route::get('admin/productos/{id}/delete',[ProductosController::class,'destroy']);
Route::resource('admin/productos',ProductosController::class);

// Pedidos Routes
Route::get('admin/pedidos/{id}/delete',[PedidosController::class,'destroy']);
Route::resource('admin/pedidos',PedidosController::class);

// Boletas
Route::get('admin/reservas/{id}/generar-boleta', [ReservasController::class, 'generarBoleta'])->name('adminreservas.generar-boleta');
Route::get('admin/pedidos/{id}/generar-boleta', [PedidosController::class, 'generarBoleta'])->name('adminreservas.generar-boleta');
