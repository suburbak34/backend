<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
// CRUD API REST USER

Route::get("/user", [UserController::class, "funListar"]);
Route::post("/user", [UserController::class, "funGuardar"]);
Route::get("/user/{id}", [UserController::class, "funMostrar"]);
Route::put("/user/{id}", [UserController::class, "funModificar"]);
Route::delete("/user/{id}", [UserController::class, "funEliminar"]);
});
// AUTH API REST USER

Route::prefix('/v1/auth')->group(function () {

    Route::post("/login", [AuthController::class, "funLogin"]);
    Route::post("/register", [AuthController::class, "funRegister"]);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get("/profile", [AuthController::class, "funProfile"]);
        Route::post("/logout", [AuthController::class, "funLogout"]);
    });
});