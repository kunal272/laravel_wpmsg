<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActionController;
use App\Http\Controllers\Api\Email\EmailController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Action Api
Route::post('/saveAction', [ActionController::class, 'saveAction']);

Route::post('/saveAction', [EmailController::class, 'saveAction']);
