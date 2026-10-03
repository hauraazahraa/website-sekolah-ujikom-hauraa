<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    public function edit()
    {
        $profil = ProfilSekolah::firstOrCreate(['id' => 1]);

        return view('admin.data-sekolah.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'alamat' => ['nullable', 'string', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'akreditasi' => ['nullable', 'string', 'max:10'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'facebook' => ['nullable', 'url', 'max:255'],
            'twitter' => ['nullable', 'url', 'max:255'],
            'youtube' => ['nullable', 'url', 'max:255'],
            'tiktok' => ['nullable', 'url', 'max:255'],
        ], [
            'instagram.url' => 'Link Instagram harus berupa URL yang valid (diawali https://).',
            'facebook.url' => 'Link Facebook harus berupa URL yang valid (diawali https://).',
            'twitter.url' => 'Link Twitter/X harus berupa URL yang valid (diawali https://).',
            'youtube.url' => 'Link YouTube harus berupa URL yang valid (diawali https://).',
            'tiktok.url' => 'Link TikTok harus berupa URL yang valid (diawali https://).',
        ]);

        $profil = ProfilSekolah::firstOrCreate(['id' => 1]);
        $profil->update($data);

        return back()->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
