<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/grades', function (Request $request) {
    return $request->user();
});