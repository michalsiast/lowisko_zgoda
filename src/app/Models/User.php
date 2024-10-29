<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Nazwa tabeli w bazie danych.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Atrybuty, które mogą być masowo przypisywane.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Atrybuty, które powinny być ukryte dla tablic lub JSON.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atrybuty, które powinny być automatycznie rzutowane na inne typy.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Sprawdza, czy użytkownik ma rolę administratora.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
