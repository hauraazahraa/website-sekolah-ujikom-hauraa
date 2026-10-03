<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'foto',
        'kategori',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function fotoUrl(): string
    {
        return asset('storage/' . $this->foto);
    }
}
