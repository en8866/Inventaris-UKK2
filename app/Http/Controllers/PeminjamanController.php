<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('inventaris')->latest()->get();
        return view('inventaris.peminjaman', compact('peminjaman'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang dapat mengakses halaman ini.');
        }
        $inventaris = Inventaris::all();
        return view('inventaris.peminjaman_create', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'inventaris_id' => 'required|exists:inventaris,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);
        Peminjaman::create($validated);
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan');
    }
}
