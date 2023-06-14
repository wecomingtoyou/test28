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
        Route::get('{id}', ShowController::class)->name('show');
        Route::post('', CreateController::class)->name('create');
        Route::patch('{id}', UpdateController::class)->name('update');
        Route::delete('{id}', DeleteController::class)->name('delete');
    });
