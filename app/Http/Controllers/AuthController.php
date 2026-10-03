<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Merchandise;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username / NIS / NIP wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();

            /** @var \App\Models\User $user */
            $user = Auth::user();

            if (! $user->isAdmin()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'username' => 'Akun ini tidak memiliki akses admin.',
                ])->onlyInput('username');
            }

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function dashboard()
    {
        $stats = [
            'pengumuman_aktif' => Pengumuman::where('status', 'aktif')->count(),
            'pengumuman_total' => Pengumuman::count(),
            'galeri_total' => Galeri::count(),
            'merchandise_aktif' => Merchandise::where('status', 'aktif')->count(),
        ];

        $pengumumanTerbaru = Pengumuman::orderByDesc('tanggal')->take(5)->get();
        $galeriTerbaru = Galeri::orderByDesc('created_at')->take(4)->get();

        return view('admin.dashboard', compact('stats', 'pengumumanTerbaru', 'galeriTerbaru'));
    }
}