<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::with('user')->latest()->get();
        return view('admin.dashboard', compact('pengaduans'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);
        return view('admin.show', compact('pengaduan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->route('admin.dashboard')->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data pengaduan berhasil dihapus.');
    }
}
