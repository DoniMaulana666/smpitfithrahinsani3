<?php

use Modules\Teachers\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;
app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/teacher')->group(function() {
    Route::controller(TeachersController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read teachers'])->name('teachers.index');
        Route::post('/', 'store')->middleware(['permisson:create teachers'])->name('teachers.store');
        Route::post('/show', 'show')->middleware(['permisson:read teachers'])->name('teachers.show');
        Route::put('/', 'update')->middleware(['permisson:update teachers'])->name('teachers.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete teachers'])->name('teachers.destroy');
    });
});
