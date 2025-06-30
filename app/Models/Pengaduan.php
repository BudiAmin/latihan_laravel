<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'id_user', 'judul', 'isi', 'lokasi', 'foto', 'status', 'tanggal_pengaduan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'id_pengaduan');
    }
}
