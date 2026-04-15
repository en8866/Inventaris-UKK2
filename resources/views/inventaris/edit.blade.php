@extends('layouts.app')

@section('title', 'Edit Inventaris')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-4">✏️ Edit Inventaris</h1>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('inventaris.update', $inventaris) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Inventaris <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                   id="nama" name="nama" value="{{ old('nama', $inventaris->nama) }}" required>
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kode_inventaris" class="form-label">Kode Inventaris <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kode_inventaris') is-invalid @enderror"
                                   id="kode_inventaris" name="kode_inventaris"
                                   value="{{ old('kode_inventaris', $inventaris->kode_inventaris) }}" required>
                            @error('kode_inventaris')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $inventaris->deskripsi) }}</textarea>
                            @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                           id="jumlah" name="jumlah" value="{{ old('jumlah', $inventaris->jumlah) }}"
                                           min="1" required>
                                    @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                           id="lokasi" name="lokasi" value="{{ old('lokasi', $inventaris->lokasi) }}" required>
                                    @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kondisi" class="form-label">Kondisi <span class="text-danger">*</span></label>
                                    <select class="form-select @error('kondisi') is-invalid @enderror"
                                            id="kondisi" name="kondisi" required>
                                        <option value="">-- Pilih Kondisi --</option>
                                        <option value="baik" @selected(old('kondisi', $inventaris->kondisi) === 'baik')>Baik</option>
                                        <option value="rusak" @selected(old('kondisi', $inventaris->kondisi) === 'rusak')>Rusak</option>
                                        <option value="hilang" @selected(old('kondisi', $inventaris->kondisi) === 'hilang')>Hilang</option>
                                    </select>
                                    @error('kondisi')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                           id="tanggal_masuk" name="tanggal_masuk"
                                           value="{{ old('tanggal_masuk', $inventaris->tanggal_masuk->format('Y-m-d')) }}" required>
                                    @error('tanggal_masuk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                   id="harga" name="harga" value="{{ old('harga', $inventaris->harga) }}"
                                   min="0" step="0.01">
                            @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                💾 Perbarui Inventaris
                            </button>
                            <a href="{{ route('inventaris.show', $inventaris) }}" class="btn btn-secondary">
                                ← Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
