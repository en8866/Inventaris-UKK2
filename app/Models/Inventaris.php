<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';

    protected $fillable = [
        'nama',
        'kode_inventaris',
        'deskripsi',
        'jumlah',
        'lokasi',
        'kondisi',
        'tanggal_masuk',
        'harga',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_masuk' => 'date',
            'harga' => 'decimal:2',
        ];
    }
}
