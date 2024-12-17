<?php

use Illuminate\Support\Facades\Route;

Route::name('app.product')
    ->prefix('product')
    ->group(__DIR__ . '/api/product.php');
