<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tanggapan';

    protected $fillable = [
        'id_pengaduan', 'id_admin', 'isi_tanggapan', 'tanggal_tanggapan'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
