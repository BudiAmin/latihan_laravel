<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('id_user', Auth::id())
                                ->with(['tanggapan.admin', 'user'])
                                ->latest()
                                ->get();
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
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $newFileName = 'fotopengaduan_' . time() . '.' . $extension;
            $path = $file->storeAs('pengaduan_foto', $newFileName, 'public');
        }

        Pengaduan::create([
            'id_user' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'lokasi' => $request->lokasi,
            'foto' => $path,
            'status' => 'menunggu',
            'tanggal_pengaduan' => Carbon::now()
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
