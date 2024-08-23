<?php

use Modules\Posts\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/post')->group(function() {
    Route::controller(PostsController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read posts'])->name('posts.index');
        Route::post('/', 'store')->middleware(['permisson:create posts'])->name('posts.store');
        Route::post('/show', 'show')->middleware(['permisson:read posts'])->name('posts.show');
        Route::put('/', 'update')->middleware(['permisson:update posts'])->name('posts.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete posts'])->name('posts.destroy');
    });
});
