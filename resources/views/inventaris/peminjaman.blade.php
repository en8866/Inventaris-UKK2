@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Peminjaman</h1>
    <div>
        <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exportPeminjamanModal">Export Excel</button>
        @if(in_array(auth()->user()->role, ['admin', 'guest']))
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
        @endif
    </div>
</div>

<!-- Modal Export Peminjaman -->
<div class="modal fade" id="exportPeminjamanModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Data Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('peminjaman.export') }}" method="GET">
                <div class="modal-body">
                    <p class="text-muted small">Biarkan kosong untuk meng-export seluruh data.</p>
                    <div class="mb-3">
                        <label class="form-label">Dari Tanggal (Tanggal Pinjam)</label>
                        <input type="date" name="tanggal_awal" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sampai Tanggal</label>
                        <input type="date" name="tanggal_akhir" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Download Excel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 5%;">No.</th>
                    <th style="width: 20%;">Nama Peminjam</th>
                    <th style="width: 20%;">Barang</th>
                    <th style="width: 10%;">Jumlah</th>
                    <th style="width: 15%;">Tanggal Pinjam</th>
                    <th style="width: 15%;">Tanggal Kembali</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 15%;">Keterangan</th>
                    <th style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjaman as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama_peminjam }}</td>
                    <td>{{ $item->inventaris->nama ?? '-' }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->tanggal_pinjam->format('d/m/Y') }}</td>
                    <td>{{ $item->tanggal_kembali ? $item->tanggal_kembali->format('d/m/Y') : '-' }}</td>
                    <td>
                        @if($item->status === 'dikembalikan')
                            <span class="badge bg-success">Dikembalikan</span>
                        @else
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        @endif
                    </td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        @if($item->status === 'dipinjam' && (auth()->user()->role === 'admin' || auth()->user()->role === 'staff'))
                            <form action="{{ route('peminjaman.kembalikan', $item) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Apakah barang ini sudah dikembalikan?')">Kembalikan</button>
                            </form>
                        @endif
                        @if(auth()->user()->role === 'admin')
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}">Hapus</button>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Peminjaman</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin hapus peminjaman <strong>{{ $item->nama_peminjam }}</strong> untuk barang <strong>{{ $item->inventaris->nama ?? '-' }}</strong>?</p>
                                            <p class="text-info small">ℹ️ Unit barang akan dikembalikan secara otomatis.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('peminjaman.destroy', $item) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-4">Belum ada data peminjam</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
