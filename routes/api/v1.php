<?php

use Illuminate\Support\Facades\Route;

Route::name('brands:')
    ->prefix('brands')
    ->namespace('Brands')
    ->group(function () {
        Route::get('', IndexController::class)->name('index');
    });

Route::name('models:')
    ->prefix('models')
    ->namespace('Models')
    ->group(function () {
        Route::get('', IndexController::class)->name('index');
    });

Route::name('cars:')
    ->prefix('cars')
    ->namespace('Cars')
    ->group(function () {
        Route::get('', IndexController::class)->name('index');
        Route::get('{car}', ShowController::class)->name('show');
        Route::post('', CreateController::class)->name('create');
        Route::patch('{car}', UpdateController::class)->name('update');
        Route::delete('{car}', DeleteController::class)->name('delete');
    });
