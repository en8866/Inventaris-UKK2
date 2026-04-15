@extends('layouts.app')

@section('title', 'Daftar Inventaris')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1> Daftar Inventaris</h1>
    @if(Auth::user()->role === 'admin')
    <a href="{{ route('inventaris.create') }}" class="btn btn-primary"> Tambah</a>
    @endif
</div>

<div class="card">
    <div class="table-responsive" style="max-height: 600px; overflow-y: auto; border-top: 2px solid #667eea;">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 5%;">No.</th>
                    <th style="width: 35%;">Nama</th>
                    <th style="width: 15%;">Jumlah</th>
                    <th style="width: 18%;">Tanggal Masuk</th>
                    <th style="width: 27%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inventaris as $key => $item)
                <tr>
                    <td>{{ ($inventaris->currentPage() - 1) * $inventaris->perPage() + $key + 1 }}</td>
                    <td><strong>{{ $item->nama }}</strong></td>
                    <td>{{ $item->jumlah }} unit</td>
                    <td>{{ $item->tanggal_masuk->format('d/m/Y') }}</td>
                    <td>

                        @if(Auth::user()->role === 'admin')
                        <a href="{{ route('inventaris.edit', $item) }}" class="btn btn-sm btn-warning"> Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}"> Hapus</button>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Inventaris</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin hapus <strong>{{ $item->nama }}</strong>?</p>
                                        <p class="text-danger small">⚠️ Aksi tidak dapat dibatalkan!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('inventaris.destroy', $inventaris) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</div>
@endsection
