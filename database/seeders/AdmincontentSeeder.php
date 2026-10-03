<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Seeder;

class AdminContentSeeder extends Seeder
{
    public function run(): void
    {
        Pengumuman::create([
            'judul' => 'Jadwal Ujian Akhir Semester Genap 2024',
            'tanggal' => '2024-05-12',
            'status' => 'aktif',
        ]);

        Pengumuman::create([
            'judul' => 'Pemberitahuan Libur Hari Raya Idul Fitri',
            'tanggal' => '2024-04-05',
            'status' => 'arsip',
        ]);

        Pengumuman::create([
            'judul' => 'Informasi Pendaftaran Peserta Didik Baru (PPDB) 2024/2025',
            'tanggal' => '2024-03-20',
            'status' => 'aktif',
        ]);

        // Galeri butuh file foto asli, jadi tidak di-seed otomatis di sini.
        // Tambahkan foto pertama lewat form "+ Tambah Foto" di halaman admin.
    }
}
