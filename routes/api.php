<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SendPanicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', LoginController::class)
    ->name('auth.login')
    ->middleware(['throttle:10,1']);

Route::middleware('auth:api')
    ->group(function () {
        Route::name('panics.')
            ->prefix('panics')
            ->group(function () {
                Route::post('', SendPanicController::class)->name('send');
            });
    });
