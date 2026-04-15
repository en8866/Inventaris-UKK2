@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan - Sistem Inventaris')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
        <div class="col-md-8 text-center">
            <!-- Error Illustration -->
            <div style="margin-bottom: 30px;">
                <h1 style="font-size: 5rem; font-weight: 700; color: #667eea; margin: 0;">404</h1>
            </div>

            <!-- Error Message -->
            <h2 class="mb-3" style="font-size: 2rem; font-weight: 700; color: #2c3e50;">
                Halaman Tidak Ditemukan
            </h2>

            <p class="mb-5" style="font-size: 1.1rem; color: #7f8c8d;">
                Maaf, halaman yang Anda cari tidak ada atau telah dihapus.
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
        </div>
    </div>
</div>
@endsection
