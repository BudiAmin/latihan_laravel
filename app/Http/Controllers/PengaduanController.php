<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan; // Impor model Pengaduan
use Illuminate\Support\Facades\Auth; // Impor facade Auth untuk mendapatkan user yang sedang login
use Carbon\Carbon; // Impor Carbon untuk manipulasi tanggal dan waktu

class PengaduanController extends Controller
{
    /**
     * Menampilkan daftar pengaduan untuk user yang sedang login.
     * Mengambil pengaduan terbaru.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua pengaduan yang dibuat oleh user yang sedang login, diurutkan dari yang terbaru
        $pengaduan = Pengaduan::where('id_user', Auth::id())->latest()->get();
        // Mengirim data pengaduan ke view 'pengaduan'
        return view('pengaduan', compact('pengaduan'));
    }

    /**
     * Menyimpan pengaduan baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk dari formulir pengaduan
        $request->validate([
            'judul' => 'required|string|max:150', // Judul wajib diisi, string, maks 150 karakter
            'isi' => 'required|string',           // Isi pengaduan wajib diisi, string
            'lokasi' => 'nullable|string|max:255', // Lokasi opsional, string, maks 255 karakter
            'foto' => 'nullable|image|max:2048'   // Foto opsional, harus gambar, maks 2MB
        ]);

        // Inisialisasi path foto sebagai null
        $path = null;
        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Simpan foto ke direktori 'pengaduan_foto' di dalam folder 'public' disk storage
            $path = $request->file('foto')->store('pengaduan_foto', 'public');
        }

        // Membuat record pengaduan baru di database
        Pengaduan::create([
            'id_user' => Auth::id(),             // ID user yang membuat pengaduan (user yang sedang login)
            'judul' => $request->judul,           // Judul pengaduan dari input form
            'isi' => $request->isi,               // Isi pengaduan dari input form
            'lokasi' => $request->lokasi,         // Lokasi kejadian dari input form
            'foto' => $path,                      // Path foto yang disimpan
            'status' => 'menunggu',               // Status awal pengaduan (default)
            'tanggal_pengaduan' => Carbon::now() // Menggunakan Carbon::now() untuk menyimpan tanggal dan waktu lengkap
        ]);

        // Redirect user kembali ke halaman 'pengaduan' dengan pesan sukses
        return redirect()->route('pengaduan')->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * Menampilkan statistik pengaduan untuk halaman welcome/utama.
     *
     * @return \Illuminate\View\View
     */
    public function statistik()
    {
        // Menghitung total semua pengaduan
        $totalPengaduan = Pengaduan::count();
        // Menghitung jumlah pengaduan dengan status 'selesai'
        $pengaduanSelesai = Pengaduan::where('status', 'selesai')->count();
        // Menghitung jumlah pengaduan dengan status 'diproses' (perhatikan konsistensi status di DB jika ada '0' juga)
        $pengaduanDiproses = Pengaduan::where('status', 'diproses')->count();
        
        // Menghitung jumlah total pengguna aktif (user)
        $penggunaAktif = \App\Models\User::count();

        // Mengirim data statistik ke view 'welcome'
        return view('welcome', compact(
            'totalPengaduan',
            'pengaduanSelesai',
            'pengaduanDiproses',
            'penggunaAktif'
        ));
    }
}
