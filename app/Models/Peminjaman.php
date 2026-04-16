<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'nama_peminjam',
        'inventaris_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah',
        'keterangan',
        'status',
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
    ];

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }
}
