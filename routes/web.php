<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Rutas principales
Route::get('/', [CarritoController::class, 'mostrarProductosEnWelcome'])->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Autenticación
Route::post('login', [LoginController::class, 'login'])->name('login.post');

// Gestión de usuarios
Route::prefix('usuarios')->name('usuarios.')->group(function () {
    Route::get('pending', [UsuarioController::class, 'pending'])->name('pending');
    Route::patch('{id}/approve', [UsuarioController::class, 'approve'])->name('approve');
    Route::resource('/', UsuarioController::class)->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'show' => 'show',
        'edit' => 'edit',
        'update' => 'update',
        'destroy' => 'destroy',
    ]);
});

Route::get('/waiting-for-approval', function () {
    return view('auth.waiting_for_approval');
})->name('approval.wait');

// Gestión de productos
Route::resource('productos', ProductoController::class)->names([
    'index' => 'productos.index',
    'create' => 'productos.create',
    'store' => 'productos.store',
    'show' => 'productos.show',
    'edit' => 'productos.edit',
    'update' => 'productos.update',
    'destroy' => 'productos.destroy',
]);

// Carrito de compras
Route::prefix('carrito')->name('carrito.')->group(function () {
    Route::get('/', [CarritoController::class, 'verCarrito'])->name('index');
    Route::post('agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('agregar');
    Route::post('actualizar/{id}', [CarritoController::class, 'actualizarCantidad'])->name('actualizar');
    Route::delete('eliminar/{id}', [CarritoController::class, 'eliminarDelCarrito'])->name('eliminar');
});

Route::post('/comprar', [CarritoController::class, 'comprar'])->name('comprar');

Route::get('/checkout', [CarritoController::class, 'mostrarFormularioPago'])->name('carrito.checkout');
Route::post('/procesar-compra', [CarritoController::class, 'procesarCompra'])->name('carrito.procesarCompra');

// Productos comprados por postulantes (solo para empresas)
Route::get('/productos/compras', [ProductoController::class, 'compras'])->name('productos.compras');

Route::get('/productos/compradores', [ProductoController::class, 'verCompradores'])->name('productos.compradores');

