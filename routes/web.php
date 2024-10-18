<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\DownloadController;

Route::controller(PrincipalController::class)->group(function () {
    Route::get('/', 'mostrarPrincipal')->name('mostrarPrincipal');
    Route::post('/', 'enviarEMail')->name("enviarEMail");
});

Route::controller(DownloadController::class)->group(function () {
    Route::get('/download', 'mostrarDownload')->name('mostrarDownload');
    Route::post('/download', 'cadastrarFBAuth')->name('cadastrarFBAuth');
    Route::get('verificarEmail', 'emailExistente')->name('emailExistente');
});
