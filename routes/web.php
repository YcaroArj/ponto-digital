<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(base_path('routes/local/User.php'));

Route::prefix('Home')->middleware(['web', 'auth'])->group(function () {
    Route::middleware('web')->group(function () {
        Route::middleware('web')->group(base_path('routes/local/BaterPonto.php'));
        Route::middleware('web')->group(base_path('routes/local/Relatorio.php'));
        Route::middleware('web')->group(base_path('routes/local/Help.php'));
        Route::middleware('web')->group(base_path('routes/local/Funcionario.php'));
        Route::middleware('web')->group(base_path('routes/local/Perfil.php'));
        Route::middleware('web')->group(base_path('routes/local/Configuracao.php'));
    });
});
