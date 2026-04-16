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
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'guest') {
            abort(403, 'Akses ditolak.');
        }
        $inventaris = Inventaris::all();
        return view('inventaris.peminjaman_create', compact('inventaris'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'guest') {
            abort(403, 'Akses ditolak.');
        }

        $validated = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'inventaris_id' => 'required|exists:inventaris,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $inventaris = Inventaris::find($validated['inventaris_id']);
        if ($inventaris->jumlah < $validated['jumlah']) {
            return back()->withErrors(['jumlah' => 'Stok inventaris tidak cukup. Stok tersedia: ' . $inventaris->jumlah]);
        }

        Peminjaman::create($validated);
        $inventaris->decrement('jumlah', $validated['jumlah']);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan');
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'staff') {
            abort(403, 'Akses ditolak.');
        }
        $peminjaman->update(['status' => 'dikembalikan']);
        $peminjaman->inventaris->increment('jumlah', $peminjaman->jumlah);
        return redirect()->route('peminjaman.index')->with('success', 'Status peminjaman berhasil diubah menjadi dikembalikan');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang dapat mengakses fitur ini.');
        }
        $peminjaman->inventaris->increment('jumlah', $peminjaman->jumlah);
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus dan unit dikembalikan');
    }

    public function exportExcel(Request $request)
    {
        $fileName = 'peminjaman_export_' . date('Y-m-d') . '.csv';
        
        $query = Peminjaman::with('inventaris')->latest();
        
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_pinjam', [$request->tanggal_awal, $request->tanggal_akhir]);
        } elseif ($request->filled('tanggal_awal')) {
            $query->whereDate('tanggal_pinjam', '>=', $request->tanggal_awal);
        } elseif ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal_pinjam', '<=', $request->tanggal_akhir);
        }

        $peminjaman = $query->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = ['No', 'Nama Peminjam', 'Barang', 'Jumlah', 'Tanggal Pinjam', 'Tanggal Kembali', 'Status', 'Keterangan'];

        $callback = function() use($peminjaman, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            $no = 1;
            foreach ($peminjaman as $item) {
                $row = [
                    $no++,
                    $item->nama_peminjam,
                    $item->inventaris->nama ?? '-',
                    $item->jumlah,
                    $item->tanggal_pinjam->format('Y-m-d'),
                    $item->tanggal_kembali ? $item->tanggal_kembali->format('Y-m-d') : '-',
                    $item->status,
                    $item->keterangan ?? '-'
                ];
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
