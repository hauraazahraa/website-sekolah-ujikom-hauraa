<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $galeri = Galeri::when($request->kategori, function ($query, $kategori) {
                $query->where('kategori', $kategori);
            })
            ->orderByDesc('tanggal')
            ->get();

        return view('admin.galeri.index', compact('galeri'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'in:kegiatan,prestasi'],
            'tanggal' => ['required', 'date'],
            'foto' => ['required', 'image', 'max:10240'],
            'caption' => 'nullable|string|max:500',// maks 10MB
        ]);

        $data['foto'] = $request->file('foto')->store('galeri', 'public');

        Galeri::create($data);

        return back()->with('success', 'Foto berhasil ditambahkan.');
    }

    public function update(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'in:kegiatan,prestasi'],
            'tanggal' => ['required', 'date'],
            'foto' => ['nullable', 'image', 'max:10240'],
            'caption' => 'nullable|string|max:500', // maks 10MB
        ]);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($galeri->foto);
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->update($data);

        return back()->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::disk('public')->delete($galeri->foto);
        $galeri->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
