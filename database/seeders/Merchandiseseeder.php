<?php

namespace Database\Seeders;

use App\Models\Merchandise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MerchandiseSeeder extends Seeder
{
    /**
     * NOTE: seeder ini pakai foto PLACEHOLDER (diambil dari foto galeri
     * yang sudah ada di project) supaya produk langsung tampil tanpa
     * perlu upload dulu. Ganti fotonya lewat tombol "Edit" di halaman
     * admin Merchandise begitu ada foto produk asli.
     */
    public function run(): void
    {
        $items = [
            [
                'nama' => 'Mug SMKN 4 Bogor',
                'harga' => 35000,
                'deskripsi' => 'Mug keramik dengan logo resmi SMK Negeri 4 Bogor. Cocok untuk kebutuhan sehari-hari maupun kenang-kenangan.',
                'sumber_foto' => 'assets/img/portfolio/IMG_0819.JPG',
            ],
            [
                'nama' => 'Gantungan Kunci SMKN 4 Bogor',
                'harga' => 15000,
                'deskripsi' => 'Gantungan kunci akrilik dengan desain logo dan identitas SMK Negeri 4 Bogor.',
                'sumber_foto' => 'assets/img/portfolio/IMG_0742.JPG',
            ],
            [
                'nama' => 'Totebag SMKN 4 Bogor',
                'harga' => 45000,
                'deskripsi' => 'Totebag kanvas berkualitas dengan sablon logo SMK Negeri 4 Bogor, muat banyak dan ramah lingkungan.',
                'sumber_foto' => 'assets/img/portfolio/IMG_1579.JPG',
            ],
        ];

        foreach ($items as $item) {
            $sourcePath = public_path($item['sumber_foto']);
            $filename = 'merchandise/' . uniqid() . '.jpg';
            $destPath = storage_path('app/public/' . $filename);

            if (File::exists($sourcePath)) {
                File::ensureDirectoryExists(dirname($destPath));
                File::copy($sourcePath, $destPath);
            }

            Merchandise::create([
                'nama' => $item['nama'],
                'harga' => $item['harga'],
                'deskripsi' => $item['deskripsi'],
                'foto' => $filename,
                'status' => 'aktif',
            ]);
        }
    }
}
