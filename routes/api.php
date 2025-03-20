<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// CRUD API REST USER

Route::get("/user", [UserController::class, "funListar"]);
Route::post("/user", [UserController::class, "funGuardar"]);
Route::get("/user/{id}", [UserController::class, "funMostrar"]);
Route::put("/user/{id}", [UserController::class, "funModificar"]);
Route::delete("/user/{id}", [UserController::class, "funEliminar"]);
