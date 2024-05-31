<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [AppController::class, 'index']);

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

