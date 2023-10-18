<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = "funcionarios";
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nome',
        'image',
        'cargo',
        'TipoUsuario',
        'TipoContrato',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];
}
