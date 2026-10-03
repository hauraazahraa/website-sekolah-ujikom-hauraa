<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $pengumuman = Pengumuman::when($request->search, function ($query, $search) {
                $query->where('judul', 'like', "%{$search}%");
            })
            ->orderByDesc('tanggal')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['nullable', 'string'],
            'tanggal' => ['required', 'date'],
            'status' => ['required', 'in:aktif,arsip'],
        ]);

        Pengumuman::create($data);

        return back()->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['nullable', 'string'],
            'tanggal' => ['required', 'date'],
            'status' => ['required', 'in:aktif,arsip'],
        ]);

        $pengumuman->update($data);

        return back()->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return back()->with('success', 'Pengumuman berhasil dihapus.');
    }
}
