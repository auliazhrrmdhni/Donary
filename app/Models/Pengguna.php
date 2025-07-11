<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use Notifiable;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'id_penggalang');
    }

    public function donasis()
    {
        return $this->hasMany(Donasi::class, 'id_donatur');
    }
}
