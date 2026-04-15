@extends('layouts.app')

@section('title', 'Akses Ditolak - Sistem Inventaris')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
        <div class="col-md-8 text-center">
            <!-- Error Illustration -->
            <div style="margin-bottom: 30px;">
                <svg width="300" height="300" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Simple error icon -->
                    <circle cx="150" cy="120" r="50" fill="#667eea" opacity="0.1"/>
                    <text x="150" y="140" font-size="60" font-weight="bold" text-anchor="middle" fill="#667eea">⚠</text>
                </svg>
            </div>

            <!-- Error Message -->
            <h1 class="mb-3" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">
                Akses Ditolak
            </h1>

            <p class="mb-4" style="font-size: 1.2rem; color: #7f8c8d;">
                Anda tidak memiliki izin untuk mengakses halaman ini.
            </p>

            <p class="mb-5" style="color: #95a5a6;">
                Role Anda: <strong class="text-primary">{{ Auth::user()?->role === 'admin' ? 'Admin' : 'Staff' }}</strong>
            </p>

            <!-- Back Button -->
            <div>
                <a href="javascript:history.back()" class="btn btn-primary btn-lg">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-lg ms-2">
                    <i class="bi bi-house"></i> Ke Dashboard
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-5 p-4 bg-light rounded" style="text-align: left;">
                <h5 class="mb-3">ℹ️ Informasi Akses</h5>
                <p class="mb-0 text-muted">
                    @if(Auth::user()?->role === 'admin')
                        <strong>Admin</strong> memiliki akses penuh ke semua fitur sistem.
                        Jika merasa ada masalah, silakan hubungi administrator.
                    @else
                        <strong>Staff</strong> hanya dapat melihat daftar inventaris.
                        Untuk melakukan perubahan data, hubungi administrator.
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
