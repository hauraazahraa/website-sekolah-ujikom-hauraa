<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanSitus extends Model
{
    protected $table = 'pengaturan_situs';

    protected $fillable = [
        'wa_merchandise',
        'wa_it',
        'email_it',
        'stat_siswa',
        'stat_guru',
        'stat_kelas',
        'stat_prestasi',
    ];

    /**
     * Nilai awal saat pengaturan belum pernah disimpan.
     * GANTI nomor WA di halaman admin Pengaturan (bukan di sini).
     */
    public static function defaults(): array
    {
        return [
            'wa_merchandise' => '6281234567890',
            'wa_it' => '6281234567890',
            'email_it' => 'admin@smkn4bogor.sch.id',
            'stat_siswa' => 1200,
            'stat_guru' => 80,
            'stat_kelas' => 30,
            'stat_prestasi' => 15,
        ];
    }

    /**
     * Ambil satu-satunya baris pengaturan (dibuat otomatis kalau belum ada).
     */
    public static function current(): self
    {
        return static::first() ?? static::create(static::defaults());
    }
}
