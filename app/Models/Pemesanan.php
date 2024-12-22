<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_kamar',
        'nama_penyewa',
        'kontak_penyewa',
        'tanggal_mulai',
        'tanggal_selesai',
        'total_harga',
        'status_pemesanan',
    ];

    public function kamars(): BelongsTo
    {
        return $this->belongsTo(kamar::class, 'id_kamar', 'id');
    }
}