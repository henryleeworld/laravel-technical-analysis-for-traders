<?php

use App\Http\Controllers\TraderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('trader/ad/', [TraderController::class, 'getChaikinAccumulationDistributionLine']);
Route::get('trader/rsi/', [TraderController::class, 'getRelativeStrengthIndex']);