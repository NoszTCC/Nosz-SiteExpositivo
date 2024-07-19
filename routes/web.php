<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\DownloadController;

Route::get("/", [PrincipalController::class, "mostrarPrincipal"])->name("mostrarPrincipal");
Route::post("/", [PrincipalController::class, "enviarEMail"])->name("enviarEMail");
Route::get("/download", [DownloadController::class, "mostrarDownload"])->name("mostrarDownload");
Route::post("/download", [DownloadController::class, "cadastrarFBAuth"])->name("cadastrarFBAuth");
Route::get("/verificarEmail", [DownloadController::class, "emailExistente"])->name("emailExistente");
