@extends('layouts.app')

@section('title', 'Dashboard - Sistem Inventaris')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="stat-card">
                <h3>{{ $total_inventaris }}</h3>
                <p>Total Inventaris</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <h3>Rp {{ number_format($total_nilai ?? 0, 0, ',', '.') }}</h3>
                <p>Total Nilai</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <h3>{{ $kondisi_summary->firstWhere('kondisi', 'baik')->total ?? 0 }}</h3>
                <p>Kondisi Baik</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Status Kondisi Inventaris
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kondisi</th>
                                <th>Jumlah</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kondisi_summary as $item)
                            <tr>
                                <td>
                                    @if($item->kondisi === 'baik')
                                    <span class="badge bg-success">Baik</span>
                                    @elseif($item->kondisi === 'rusak')
                                    <span class="badge bg-warning">Rusak</span>
                                    @else
                                    <span class="badge bg-danger">Hilang</span>
                                    @endif
                                </td>
                                <td><strong>{{ $item->total }}</strong></td>
                                <td>{{ round(($item->total / $total_inventaris) * 100, 1) }}%</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Informasi Pengguna
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="40%">Nama</th>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>
                                @if(Auth::user()->role === 'admin')
                                <span class="badge bg-danger">Admin</span>
                                @else
                                <span class="badge bg-info">Staff</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Hak Akses</th>
                            <td>
                                @if(Auth::user()->role === 'admin')
                                <span class="text-muted">Lihat, Tambah, Edit, Hapus Inventaris</span>
                                @else
                                <span class="text-muted">Hanya Lihat Inventaris</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

