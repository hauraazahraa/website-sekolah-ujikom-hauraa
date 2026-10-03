<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengaturanSitus;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function edit()
    {
        $pengaturan = PengaturanSitus::current();

        return view('admin.pengaturan.edit', compact('pengaturan'));
    }

    public function update(Request $request)
    {
        // Rapikan nomor WA dulu: 0812-3456-7890 -> 6281234567890
        $request->merge([
            'wa_merchandise' => $this->normalizeWa($request->input('wa_merchandise')),
            'wa_it' => $this->normalizeWa($request->input('wa_it')),
        ]);

        $data = $request->validate([
            'wa_merchandise' => ['required', 'regex:/^62\d{8,13}$/'],
            'wa_it' => ['required', 'regex:/^62\d{8,13}$/'],
            'email_it' => ['required', 'email', 'max:255'],
            'stat_siswa' => ['required', 'integer', 'min:0', 'max:1000000'],
            'stat_guru' => ['required', 'integer', 'min:0', 'max:1000000'],
            'stat_kelas' => ['required', 'integer', 'min:0', 'max:1000000'],
            'stat_prestasi' => ['required', 'integer', 'min:0', 'max:1000000'],
        ], [
            'wa_merchandise.required' => 'Nomor WhatsApp pemesanan wajib diisi.',
            'wa_merchandise.regex' => 'Nomor WhatsApp pemesanan tidak valid. Contoh: 0812 3456 7890.',
            'wa_it.required' => 'Nomor WhatsApp IT Support wajib diisi.',
            'wa_it.regex' => 'Nomor WhatsApp IT Support tidak valid. Contoh: 0812 3456 7890.',
            'email_it.required' => 'Email IT Support wajib diisi.',
            'email_it.email' => 'Format email IT Support tidak valid.',
            'stat_siswa.required' => 'Jumlah siswa aktif wajib diisi.',
            'stat_guru.required' => 'Jumlah guru wajib diisi.',
            'stat_kelas.required' => 'Jumlah ruang kelas wajib diisi.',
            'stat_prestasi.required' => 'Jumlah prestasi wajib diisi.',
            '*.integer' => 'Angka statistik harus berupa bilangan bulat.',
        ]);

        PengaturanSitus::current()->update($data);

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }

    private function normalizeWa(?string $number): ?string
    {
        if ($number === null) {
            return null;
        }

        $digits = preg_replace('/\D+/', '', $number);

        if ($digits === '') {
            return null;
        }

        if (str_starts_with($digits, '0')) {
            return '62' . substr($digits, 1);
        }

        if (str_starts_with($digits, '8')) {
            return '62' . $digits;
        }

        return $digits;
    }
}
