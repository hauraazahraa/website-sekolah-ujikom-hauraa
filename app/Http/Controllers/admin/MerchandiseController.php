<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchandiseController extends Controller
{
    public function index()
    {
        $merchandise = Merchandise::orderByDesc('created_at')->get();

        return view('admin.merchandise.index', compact('merchandise'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'status' => ['required', 'in:aktif,nonaktif'],
            'foto' => ['required', 'image', 'max:10240'], // maks 10MB
        ]);

        $data['foto'] = $request->file('foto')->store('merchandise', 'public');

        Merchandise::create($data);

        return back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, Merchandise $merchandise)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'status' => ['required', 'in:aktif,nonaktif'],
            'foto' => ['nullable', 'image', 'max:10240'], // maks 10MB
        ]);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($merchandise->foto);
            $data['foto'] = $request->file('foto')->store('merchandise', 'public');
        }

        $merchandise->update($data);

        return back()->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Merchandise $merchandise)
    {
        Storage::disk('public')->delete($merchandise->foto);
        $merchandise->delete();

        return back()->with('success', 'Produk berhasil dihapus.');
    }
}
