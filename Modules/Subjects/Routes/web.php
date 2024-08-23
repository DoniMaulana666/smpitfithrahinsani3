<?php

use Modules\Subjects\Http\Controllers\SubjectsController;
use Illuminate\Support\Facades\Route;
app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/subject')->group(function() {
    Route::controller(SubjectsController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read subjects'])->name('subjects.index');
        Route::post('/', 'store')->middleware(['permisson:create subjects'])->name('subjects.store');
        Route::post('/show', 'show')->middleware(['permisson:read subjects'])->name('subjects.show');
        Route::put('/', 'update')->middleware(['permisson:update subjects'])->name('subjects.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete subjects'])->name('subjects.destroy');
    });
});
