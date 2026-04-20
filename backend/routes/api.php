<?php

use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\BillingController;
use Illuminate\Support\Facades\Route;

Route::get('/health', fn () => [
    'status' => 'ok',
    'service' => 'agency-skillmind-api',
]);

Route::get('/agents', [AgentController::class, 'index']);
Route::post('/agents/custom-request', [AgentController::class, 'storeCustomRequest']);
Route::get('/billing/usage', [BillingController::class, 'usage']);
