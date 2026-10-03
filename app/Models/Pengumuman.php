<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara spesifik di database
    protected $table = 'pengumumans';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
