<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaris = Inventaris::latest()->paginate(10);
        return view('inventaris.index', compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Inventaris::class);
        return view('inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Inventaris::class);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kode_inventaris' => 'required|string|unique:inventaris',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'lokasi' => 'required|string',
            'kondisi' => 'required|in:baik,rusak,hilang',
            'tanggal_masuk' => 'required|date',
            'harga' => 'nullable|numeric|min:0',
        ]);

        Inventaris::create($validated);

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventaris $inventaris)
    {
        return view('inventaris.show', compact('inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventaris $inventaris)
    {
        $this->authorize('update', $inventaris);
        return view('inventaris.edit', compact('inventaris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        $this->authorize('update', $inventaris);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kode_inventaris' => 'required|string|unique:inventaris,kode_inventaris,' . $inventaris->id,
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'lokasi' => 'required|string',
            'kondisi' => 'required|in:baik,rusak,hilang',
            'tanggal_masuk' => 'required|date',
            'harga' => 'nullable|numeric|min:0',
        ]);

        $inventaris->update($validated);

        return redirect()->route('inventaris.show', $inventaris)
            ->with('success', 'Inventaris berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventaris $inventaris)
    {
        $this->authorize('delete', $inventaris);

        $inventaris->delete();

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris berhasil dihapus');
    }

    /**
     * Show dashboard.
     */
    public function dashboard()
    {
        $total_inventaris = Inventaris::count();
        $total_nilai = Inventaris::sum('harga');
        $kondisi_summary = Inventaris::selectRaw('kondisi, COUNT(*) as total')
            ->groupBy('kondisi')
            ->get();

        return view('dashboard', compact('total_inventaris', 'total_nilai', 'kondisi_summary'));
    }
}
