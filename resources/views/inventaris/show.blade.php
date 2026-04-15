@extends('layouts.app')

@section('title', 'Detail Inventaris - ' . $inventaris->nama)

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>👁️ Detail Inventaris</h1>
        <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">
            ← Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th width="35%">Nama Inventaris</th>
                            <td><strong>{{ $inventaris->nama }}</strong></td>
                        </tr>
                        <tr>
                            <th>Kode Inventaris</th>
                            <td><code class="bg-light p-2">{{ $inventaris->kode_inventaris }}</code></td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>
                                @if($inventaris->deskripsi)
                                {{ $inventaris->deskripsi }}
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td><strong>{{ $inventaris->jumlah }} unit</strong></td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $inventaris->lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td>
                                @if($inventaris->kondisi === 'baik')
                                <span class="badge bg-success fs-6">✓ Baik</span>
                                @elseif($inventaris->kondisi === 'rusak')
                                <span class="badge bg-warning fs-6">⚠️ Rusak</span>
                                @else
                                <span class="badge bg-danger fs-6">✗ Hilang</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td>{{ $inventaris->tanggal_masuk->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>
                                @if($inventaris->harga)
                                <strong>Rp {{ number_format($inventaris->harga, 0, ',', '.') }}</strong>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $inventaris->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diperbarui Pada</th>
                            <td>{{ $inventaris->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        @if(Auth::user()->role === 'admin')
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    ⚙️ Aksi Admin
                </div>
                <div class="card-body">
                    <a href="{{ route('inventaris.edit', $inventaris) }}" class="btn btn-warning w-100 mb-2">
                        ✏️ Edit Inventaris
                    </a>
                    <form action="{{ route('inventaris.destroy', $inventaris) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus inventaris ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            🗑️ Hapus Inventaris
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
