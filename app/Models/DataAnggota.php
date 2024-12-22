<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str; 

class DataAnggota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'avatar',
        'nama',
        'slug',
        'nim',
        'kelas',
        'program_studi',
        'jurusan',
        'instansi',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    // Mutator untuk nama dan slug
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value); // Menggunakan Str
        $this->attributes['slug'] = Str::slug($value);
    }
}