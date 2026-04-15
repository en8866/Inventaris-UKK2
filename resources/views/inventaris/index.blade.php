<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.1rem;
        }

        .sidebar {
            background-color: #2c3e50;
            min-height: calc(100vh - 60px);
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
            background-color: #667eea;
            color: white;
        }

        .main-content {
            padding: 30px;
        }

        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px 8px 0 0;
            font-weight: 600;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5568d3 0%, #653a8a 100%);
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost:8000/dashboard">📦 Inventaris</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown">
                            👤 Administrator <span class="badge bg-info ms-2">admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="http://localhost:8000/dashboard">Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="http://localhost:8000/logout" style="display:inline;">
                                    <input type="hidden" name="_token"
                                        value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr" autocomplete="off">
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row g-0">
        <div class="col-md-2" style="border-right: 1px solid #ddd;">
            <div class="sidebar">
                <a href="http://localhost:8000/dashboard" class="">
                    📊 Dashboard
                </a>
                <a href="http://localhost:8000/inventaris" class=" active ">
                    📋 Daftar Inventaris
                </a>
                <a href="http://localhost:8000/inventaris/create" class="">
                    ➕ Tambah Inventaris
                </a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="main-content">


                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1>📋 Daftar Inventaris</h1>
                        <a href="http://localhost:8000/inventaris/create" class="btn btn-primary">
                            ➕ Tambah Inventaris
                        </a>
                    </div>

                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Kode Inventaris</th>
                                            <th>Lokasi</th>
                                            <th>Kondisi</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <strong>tas</strong>
                                            </td>
                                            <td>
                                                <code>inv-939</code>
                                            </td>
                                            <td>Rumah Griya</td>
                                            <td>
                                                <span class="badge bg-success">Baik</span>
                                            </td>
                                            <td>1 unit</td>
                                            <td>15/04/2026</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/31"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/31/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal31"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <strong>dolores</strong>
                                            </td>
                                            <td>
                                                <code>INV-5827</code>
                                            </td>
                                            <td>Felicityside</td>
                                            <td>
                                                <span class="badge bg-danger">Hilang</span>
                                            </td>
                                            <td>33 unit</td>
                                            <td>05/08/2003</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/16"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/16/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal16"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <strong>consequatur</strong>
                                            </td>
                                            <td>
                                                <code>INV-1221</code>
                                            </td>
                                            <td>Mrazstad</td>
                                            <td>
                                                <span class="badge bg-danger">Hilang</span>
                                            </td>
                                            <td>20 unit</td>
                                            <td>01/07/1983</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/17"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/17/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal17"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <strong>occaecati</strong>
                                            </td>
                                            <td>
                                                <code>INV-8569</code>
                                            </td>
                                            <td>West Sarah</td>
                                            <td>
                                                <span class="badge bg-warning">Rusak</span>
                                            </td>
                                            <td>12 unit</td>
                                            <td>06/06/2016</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/18"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/18/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal18"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>
                                                <strong>debitis</strong>
                                            </td>
                                            <td>
                                                <code>INV-8213</code>
                                            </td>
                                            <td>New Monserrat</td>
                                            <td>
                                                <span class="badge bg-success">Baik</span>
                                            </td>
                                            <td>20 unit</td>
                                            <td>09/12/1980</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/19"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/19/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal19"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>
                                                <strong>rerum</strong>
                                            </td>
                                            <td>
                                                <code>INV-0780</code>
                                            </td>
                                            <td>Thadport</td>
                                            <td>
                                                <span class="badge bg-success">Baik</span>
                                            </td>
                                            <td>6 unit</td>
                                            <td>18/06/2024</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/20"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/20/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal20"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>
                                                <strong>et</strong>
                                            </td>
                                            <td>
                                                <code>INV-6407</code>
                                            </td>
                                            <td>North Maximilian</td>
                                            <td>
                                                <span class="badge bg-success">Baik</span>
                                            </td>
                                            <td>16 unit</td>
                                            <td>27/05/1998</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/21"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/21/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal21"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>
                                                <strong>ut</strong>
                                            </td>
                                            <td>
                                                <code>INV-3710</code>
                                            </td>
                                            <td>Krajcikland</td>
                                            <td>
                                                <span class="badge bg-success">Baik</span>
                                            </td>
                                            <td>16 unit</td>
                                            <td>20/01/1980</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/22"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/22/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal22"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>
                                                <strong>nostrum</strong>
                                            </td>
                                            <td>
                                                <code>INV-1064</code>
                                            </td>
                                            <td>East Nikkoland</td>
                                            <td>
                                                <span class="badge bg-warning">Rusak</span>
                                            </td>
                                            <td>24 unit</td>
                                            <td>28/04/1971</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/23"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/23/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal23"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>
                                                <strong>ullam</strong>
                                            </td>
                                            <td>
                                                <code>INV-9174</code>
                                            </td>
                                            <td>East Mollychester</td>
                                            <td>
                                                <span class="badge bg-success">Baik</span>
                                            </td>
                                            <td>29 unit</td>
                                            <td>21/04/1974</td>
                                            <td>
                                                <a href="http://localhost:8000/inventaris/24"
                                                    class="btn btn-sm btn-info" title="Lihat">
                                                    lihat
                                                </a>
                                                <a href="http://localhost:8000/inventaris/24/edit"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal24"
                                                    title="Hapus">
                                                    hapus
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Delete Modals -->
                            <div class="modal fade" id="deleteModal31" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>tas</strong> (inv-939)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/31" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal16" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>dolores</strong> (INV-5827)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/16" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal17" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>consequatur</strong> (INV-1221)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/17" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal18" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>occaecati</strong> (INV-8569)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/18" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal19" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>debitis</strong> (INV-8213)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/19" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal20" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>rerum</strong> (INV-0780)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/20" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal21" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>et</strong> (INV-6407)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/21" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal22" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>ut</strong> (INV-3710)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/22" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal23" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>nostrum</strong> (INV-1064)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/23" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal24" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Inventaris</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong>ullam</strong> (INV-9174)?</p>
                                            <p class="text-danger small">Aksi ini tidak dapat dibatalkan!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="http://localhost:8000/inventaris/24" method="POST"
                                                style="display:inline;">
                                                <input type="hidden" name="_token"
                                                    value="f2yVZkKrrPMUFpJgDC6O4QJwj1WQin4hRjpShmmr"
                                                    autocomplete="off"> <input type="hidden" name="_method"
                                                    value="DELETE"> <button type="submit"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <nav class="mt-3 p-3 bg-light border-top">
                                <nav role="navigation" aria-label="Pagination Navigation">

                                    <div class="flex gap-2 items-center justify-between sm:hidden">

                                        <span
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 cursor-not-allowed leading-5 rounded-md dark:text-gray-300 dark:bg-gray-700 dark:border-gray-600">
                                            &laquo; Previous
                                        </span>

                                        <a href="http://localhost:8000/inventaris?page=2" rel="next"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-700 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-800 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-900 dark:hover:text-gray-200">
                                            Next &raquo;
                                        </a>

                                    </div>

                                    <div class="hidden sm:flex-1 sm:flex sm:gap-2 sm:items-center sm:justify-between">

                                        <div>
                                            <p class="text-sm text-gray-700 leading-5 dark:text-gray-600">
                                                Showing
                                                <span class="font-medium">1</span>
                                                to
                                                <span class="font-medium">10</span>
                                                of
                                                <span class="font-medium">31</span>
                                                results
                                            </p>
                                        </div>

                                        <div>
                                            <span class="inline-flex rtl:flex-row-reverse shadow-sm rounded-md">


                                                <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                                                    <span
                                                        class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed rounded-l-md leading-5 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400"
                                                        aria-hidden="true">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </span>





                                                <span aria-current="page">
                                                    <span
                                                        class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-gray-200 border border-gray-300 cursor-default leading-5 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">1</span>
                                                </span>
                                                <a href="http://localhost:8000/inventaris?page=2"
                                                    class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-700 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800 hover:bg-gray-100 dark:hover:bg-gray-900"
                                                    aria-label="Go to page 2">
                                                    2
                                                </a>
                                                <a href="http://localhost:8000/inventaris?page=3"
                                                    class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-700 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800 hover:bg-gray-100 dark:hover:bg-gray-900"
                                                    aria-label="Go to page 3">
                                                    3
                                                </a>
                                                <a href="http://localhost:8000/inventaris?page=4"
                                                    class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-700 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800 hover:bg-gray-100 dark:hover:bg-gray-900"
                                                    aria-label="Go to page 4">
                                                    4
                                                </a>


                                                <a href="http://localhost:8000/inventaris?page=2" rel="next"
                                                    class="inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800 dark:text-gray-300 dark:hover:bg-gray-900 dark:hover:text-gray-300"
                                                    aria-label="Next &amp;raquo;">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>_

