<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Inventaris')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
        }
        .navbar {
            background: linear-gradient(135deg, #e0a906 0%, #6e4e05 100%);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.1rem;
        }
        .sidebar {
            background-color: #2c3e50;
            min-height: calc(120vh - 60px);
            padding: 20px 0;
            color: white;
        }
        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #34495e;
            color: white;
        }
        .sidebar a.active {
            background-color: #e7ab06;
            color: white;
        }
        .main-content {
            padding: 30px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .card-header {
            background: linear-gradient(135deg, #de9e09 0%);
            color: white;
            border: none;
            border-radius: 8px 8px 0 0;
            font-weight: 600;
        }
        .btn-primary {
            background: linear-gradient(135deg, #cc8d04 0%, #4e3e17 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #d3b655 0%, #e1cb84 100%);
        }
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .stat-card h3 {
            color: #667eea;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .stat-card p {
            color: #7f8c8d;
            margin: 0;
        }
        .alert {
            border-radius: 8px;
            border: none;
        }
    </style>
    @yield('extra-css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}"> Inventaris</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                           👤  {{ Auth::user()->name }} <span class="badge bg-info ms-2">{{ Auth::user()->role }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="row g-0">
        @auth
        <div class="col-md-2" style="border-right: 1px solid #ddd;">
            <div class="sidebar">
                <div style="padding: 15px 20px; border-bottom: 1px solid #34495e;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 40px; height: 40px; background: #667eea; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <p style="margin: 0; font-size: 0.9rem; color: #ecf0f1;">{{ Auth::user()->name }}</p>
                            <p style="margin: 0; font-size: 0.75rem; color: #f3f3f3;">
                                @if(Auth::user()->role === 'admin')
                                <span style="background: #e74c3c; padding: 2px 8px; border-radius: 3px; display: inline-block;">Admin</span>
                                @elseif(Auth::user()->role === 'staff')
                                <span style="background: #3498db; padding: 2px 8px; border-radius: 3px; display: inline-block;">Staff</span>
                                @else
                                <span style="background: #95a5a6; padding: 2px 8px; border-radius: 3px; display: inline-block;">Guest</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="@if(Route::currentRouteName() == 'dashboard') active @endif">
                    Dashboard
                </a>
                <a href="{{ route('inventaris.index') }}" class="@if(Route::currentRouteName() == 'inventaris.index') active @endif">
                    Daftar Inventaris
                </a>
                <a href="{{ route('peminjaman.index') }}" class="@if(Route::currentRouteName() == 'peminjaman.index') active @endif">
                    Peminjaman
                </a>
                @if(Auth::user()->role === 'admin' || Auth::user()->role === 'guest')
                <a href="{{ route('peminjaman.create') }}" class="@if(Route::currentRouteName() == 'peminjaman.create') active @endif">
                    Tambah Peminjaman
                </a>
                @endif
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('inventaris.create') }}" class="@if(Route::currentRouteName() == 'inventaris.create') active @endif">
                    Tambah Inventaris
                </a>
                <a href="{{ route('users.index') }}" class="@if(Str::startsWith(Route::currentRouteName(), 'users.')) active @endif">
                    Manajemen User
                </a>
                @endif
            </div>
        </div>
        <div class="col-md-10">
            <div class="main-content">  
                @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @yield('content')
            </div>
        </div>
        @else
        <div class="col-12">
            <div class="main-content">
                @yield('content')
            </div>
        </div>
        @endauth
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('extra-js')
</body>
</html>
