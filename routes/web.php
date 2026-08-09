<?php

use App\Http\Controllers\TraderController;
use Illuminate\Support\Facades\Route;

Route::get('trader/ad/', [TraderController::class, 'getChaikinAccumulationDistributionLine']);
Route::get('trader/rsi/', [TraderController::class, 'getRelativeStrengthIndex']);
