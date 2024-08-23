<?php

use Modules\Attendances\Http\Controllers\AttendancesController;
use Illuminate\Support\Facades\Route;

app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/attendance')->group(function () {
    Route::controller(AttendancesController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permission:read attendances'])->name('attendances.index');
        Route::post('/', 'store')->middleware(['permission:create attendances'])->name('attendances.store');
        Route::post('/show', 'show')->middleware(['permission:read attendances'])->name('attendances.show');
        Route::put('/', 'update')->middleware(['permission:update attendances'])->name('attendances.update');
        Route::delete('/', 'destroy')->middleware(['permission:delete attendances'])->name('attendances.destroy');
        Route::post('students/byGrade', 'getStudentsByGrade')->name('students.byGrade');
    });
});


