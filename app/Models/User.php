<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password',
    ];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id_user');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'id_admin');
    }
}
