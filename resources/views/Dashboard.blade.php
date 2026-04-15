@extends('layouts.app')

@section('title', 'Dashboard - Sistem Inventaris')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-2">Welcome Back, {{ Auth::user()->name }} </h2>
                    <p class="text-muted mb-0">Check daftar inventaris di sidebar</p>
                </div>
                <div class="text-end">
                    <h5 class="text-muted">{{ now()->format('d F, Y') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Stats Section -->
    <div class="row g-4 mb-5">
        @if(Auth::user()->role === 'admin')
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Total Inventaris</p>
                            <h3 class="mb-0">{{ \App\Models\Inventaris::count() }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="bi bi-box-seam text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Total Pengguna</p>
                            <h3 class="mb-0">{{ \App\Models\User::count() }}</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="bi bi-people-fill text-success" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Admin</p>
                            <h3 class="mb-0">{{ \App\Models\User::where('role', 'admin')->count() }}</h3>
                        </div>
                        <div class="bg-danger bg-opacity-10 p-3 rounded">
                            <i class="bi bi-shield-check text-danger" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Staff</p>
                            <h3 class="mb-0">{{ \App\Models\User::where('role', 'staff')->count() }}</h3>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="bi bi-person-check-fill text-info" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- User Information Section -->
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0"><i class="bi bi-person-circle"></i> Informasi Pengguna</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="40%" class="text-muted">Nama</th>
                            <td><strong>{{ Auth::user()->name }}</strong></td>
                        </tr>
                        <tr>
                            <th class="text-muted">Email</th>
                            <td><strong>{{ Auth::user()->email }}</strong></td>
                        </tr>
                        <tr>
                            <th class="text-muted">Role</th>
                            <td>
                                @if(Auth::user()->role === 'admin')
                                <span class="badge bg-danger">Admin</span>
                                @else
                                <span class="badge bg-info">Staff</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="text-muted">Hak Akses</th>
                            <td>
                                @if(Auth::user()->role === 'admin')
                                <small class="text-muted">Lihat, Tambah, Edit, Hapus Inventaris</small>
                                @else
                                <small class="text-muted">Hanya Lihat Inventaris</small>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        @if(Auth::user()->role === 'admin')
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0"><i class="bi bi-graph-up"></i> Ringkasan Inventaris</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Inventaris Terbaru</span>
                            <strong>{{ \App\Models\Inventaris::latest()->first()?->nama ?? 'Tidak ada' }}</strong>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Total Quantity</span>
                            <strong>{{ \App\Models\Inventaris::sum('jumlah') }} unit</strong>
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('inventaris.index') }}" class="btn btn-primary btn-sm w-100">
                        <i class="bi bi-arrow-right"></i> Lihat Semua Inventaris
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
