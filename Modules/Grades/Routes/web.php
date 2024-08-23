<?php

use Modules\Grades\Http\Controllers\GradesController;
use Illuminate\Support\Facades\Route;
app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/grade')->group(function() {
    Route::controller(GradesController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read grades'])->name('grades.index');
        Route::post('/', 'store')->middleware(['permisson:create grades'])->name('grades.store');
        Route::post('/show', 'show')->middleware(['permisson:read grades'])->name('grades.show');
        Route::put('/', 'update')->middleware(['permisson:update grades'])->name('grades.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete grades'])->name('grades.destroy');
    });
});
