<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit karena nama tabel di database Anda adalah 'tanggapan' (singular),
    // sementara Laravel secara default mengasumsikan 'tanggapans' (plural).
    protected $table = 'tanggapan';

    // Mendefinisikan primary key jika bukan 'id' (dalam kasus ini 'id_tanggapan')
    protected $primaryKey = 'id_tanggapan';

    // Atribut yang dapat diisi secara massal (mass assignable).
    // Pastikan 'id_pengaduan' ada di sini agar Laravel dapat memasukkannya saat membuat record.
    protected $fillable = [
        'id_pengaduan',    // <--- PASTIKAN BARIS INI ADA DAN TIDAK TERKOMENTARI
        'id_admin',
        'isi_tanggapan',
        'tanggal_tanggapan'
    ];

    /**
     * Atribut yang harus di-cast ke tipe data native.
     * 'tanggal_tanggapan' akan secara otomatis diubah menjadi objek Carbon.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_tanggapan' => 'datetime',
    ];

    /**
     * Mendefinisikan relasi ke model Pengaduan.
     * Sebuah Tanggapan dimiliki oleh satu Pengaduan.
     */
    public function pengaduan()
    {
        // 'id_pengaduan' adalah foreign key di tabel 'tanggapan'
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }

    /**
     * Mendefinisikan relasi ke model User (untuk admin).
     * Sebuah Tanggapan dibuat oleh satu Admin (User dengan role admin).
     */
    public function admin()
    {
        // 'id_admin' adalah foreign key di tabel 'tanggapan',
        // 'id_user' adalah primary key di tabel 'users'.
        return $this->belongsTo(User::class, 'id_admin', 'id_user');
    }
}