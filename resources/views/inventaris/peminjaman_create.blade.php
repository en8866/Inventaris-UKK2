@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<h1 class="mb-4">Tambah Peminjaman</h1>
<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Peminjam <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam" value="{{ old('nama_peminjam') }}" required>
                @error('nama_peminjam')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Barang <span class="text-danger">*</span></label>
                <select class="form-select @error('inventaris_id') is-invalid @enderror" name="inventaris_id" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($inventaris as $item)
                        <option value="{{ $item->id }}" @selected(old('inventaris_id') == $item->id)>{{ $item->nama }}</option>
                    @endforeach
                </select>
                @error('inventaris_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah', 1) }}" min="1" required>
                        @error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Pinjam <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>
                        @error('tanggal_pinjam')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
                @error('tanggal_kembali')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}">
                @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
