<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RemediosController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login'])->name('user-login');
Route::post('/create', [UserController::class, 'create'])->name('user-create');
Route::post('/remedio', [RemediosController::class, 'create'])->name('remedio-create');
Route::get('/remedios', [RemediosController::class, 'read'])->name('remedio-read');
