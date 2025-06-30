<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('id_user', Auth::id())->latest()->get();
        return view('pengaduan', compact('pengaduan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:150',
            'isi' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('pengaduan_foto', 'public');
        }

        Pengaduan::create([
            'id_user' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'lokasi' => $request->lokasi,
            'foto' => $path,
            'status' => 'menunggu',
            'tanggal_pengaduan' => now()->toDateString()
        ]);

        return redirect()->route('pengaduan')->with('success', 'Pengaduan berhasil dikirim.');
    }
public function statistik()
{
    $totalPengaduan = Pengaduan::count();
    $pengaduanSelesai = Pengaduan::where('status', 'selesai')->count();
    $pengaduanDiproses = Pengaduan::where('status', 'diproses')->count();
    
   
    $penggunaAktif = \App\Models\User::count();


    return view('welcome', compact(
        'totalPengaduan',
        'pengaduanSelesai',
        'pengaduanDiproses',
        'penggunaAktif'
    ));
}


}
