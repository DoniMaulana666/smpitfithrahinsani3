<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/teachers', function (Request $request) {
    return $request->user();
});