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
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',

        ]);

        Inventaris::create($validated);

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris berhasil ditambahkan');
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
        return view('dashboard');
    }
}
