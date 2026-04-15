@extends('layouts.app')

@section('title', 'Login - Sistem Inventaris')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-7 col-lg-5 col-xl-4 mx-auto">
            <div class="card shadow-lg">
                <div class="card-header text-center py-4">
                    <h2 class="mb-0"> Login Sistem Inventaris</h2>
                </div>
                <div class="card-body p-6">
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                        </div>

                        <hr>
                        <p class="text-muted text-center mb-0 small">
                            <strong>Demo Login:</strong><br>
                             Staff: staff@staff.com<br>
                            Password: password
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-css')
<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
</style>
@endsection
