<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CurrenciesController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AppController::class, 'login']);

Route::apiResource('/currencies', CurrenciesController::class);

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::delete('/auth/logout', [AuthController::class, 'logout']);


Route::get('/user', [UserController::class, 'index']);

