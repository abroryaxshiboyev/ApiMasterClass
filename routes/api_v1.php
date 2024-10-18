<?php

use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\AuthorsController;
use App\Http\Controllers\Api\V1\AuthorTicketsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::middleware('auth:sanctum')->apiResource('tickets', TicketController::class);
    Route::middleware('auth:sanctum')->apiResource('authors', AuthorsController::class);
    Route::middleware('auth:sanctum')->apiResource('authors.tickets', AuthorTicketsController::class);
    
});