<?php

use App\Http\Controllers\local\central\FuncionarioController;
use Illuminate\Support\Facades\Route;

Route::controller(FuncionarioController::class)->group(function () {
    Route::get('/Funcionario', 'listUsers')->name('funcionario')->middleware('admin');
    Route::post('/CreateUser', 'createUser')->name('create_user');
    Route::put('/{id}', 'update')->where('id', '[0-9]+')->name('update-user');
    Route::delete('/DeletUser/{id}', 'destroy')->name('user-destroy');
});
