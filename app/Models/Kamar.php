<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kamar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_kamar',
        'deskripsi_kamar',
        'fasilitas',
        'harga_kamar',
        'status_kamar',
    ];
    
    public function pemesanans(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'id_kamar', 'id');
    }
}