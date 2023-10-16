<?php

use App\Http\Controllers\local\central\PerfilController;
use Illuminate\Support\Facades\Route;

Route::controller(PerfilController::class)->group(function () {
    Route::get('/Perfil', 'store')->name('perfil');
    Route::post('/uploadIcon', 'UploadIcon')->name('up.icon');
    Route::post('/AlterarSenha', 'AlterarDados')->name('alt.dados');
});
