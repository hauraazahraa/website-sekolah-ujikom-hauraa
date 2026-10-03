<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'foto',
        'deskripsi',
        'status',
    ];

    public function fotoUrl(): string
    {
        return asset('storage/' . $this->foto);
    }

    public function hargaFormatted(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}
