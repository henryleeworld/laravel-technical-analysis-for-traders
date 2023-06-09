<?php

use App\Http\Controllers\TraderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('trader/ad/', [TraderController::class, 'getChaikinAccumulationDistributionLine']);
Route::get('trader/rsi/', [TraderController::class, 'getRelativeStrengthIndex']);