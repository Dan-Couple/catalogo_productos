<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::resource("productos", ProductoController::class);

Route::get('/', function () {
    return redirect('/productos');
});

Route::post('/productos/search', [ProductoController::class, 'search'])->name('productos.search');
