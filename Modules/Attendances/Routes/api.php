<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/attendances', function (Request $request) {
    return $request->user();
});