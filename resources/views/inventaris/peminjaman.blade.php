@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Peminjaman</h1>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
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
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">Belum ada data peminjam</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
