@extends('admin.layout')

@section('title', 'Data Sekolah')

@section('content')
  <div class="admin-page-head">
    <div>
      <h1>Data Sekolah</h1>
      <p class="admin-page-subtitle">Kelola profil sekolah yang tampil di halaman Beranda (section Kontak).</p>
    </div>
  </div>

  <div class="admin-card" style="padding: 24px;">
    <form method="POST" action="{{ route('admin.data-sekolah.update') }}">
      @csrf
      @method('PUT')

      <div class="admin-form-row">
        <div class="admin-form-group">
          <label>Telepon</label>
          <input type="text" name="telepon" value="{{ old('telepon', $profil->telepon) }}" placeholder="+62 251 7547381">
        </div>
        <div class="admin-form-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email', $profil->email) }}" placeholder="info@smkn4bogor.sch.id">
        </div>
      </div>

      <div class="admin-form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="{{ old('alamat', $profil->alamat) }}" placeholder="Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, ...">
      </div>

      <div class="admin-form-row">
        <div class="admin-form-group">
          <label>Akreditasi</label>
          <input type="text" name="akreditasi" value="{{ old('akreditasi', $profil->akreditasi) }}" placeholder="A">
        </div>
      </div>

      <div class="admin-form-group">
        <label>Visi</label>
        <textarea name="visi" rows="3" placeholder="Visi sekolah...">{{ old('visi', $profil->visi) }}</textarea>
      </div>

      <div class="admin-form-group">
        <label>Misi</label>
        <textarea name="misi" rows="4" placeholder="Misi sekolah...">{{ old('misi', $profil->misi) }}</textarea>
      </div>

      <hr style="border: none; border-top: 1px solid var(--sm-card-border); margin: 22px 0;">

      <h3 style="font-family: var(--heading-font); font-size: 15px; font-weight: 700; margin: 0 0 4px;">Sosial Media</h3>
      <p style="font-size: 12.5px; color: var(--sm-ink-soft); margin: 0 0 16px;">Kosongkan kalau sekolah belum punya akun tersebut &mdash; ikonnya otomatis tidak ditampilkan di Beranda.</p>

      <div class="admin-form-row">
        <div class="admin-form-group">
          <label><i class="bi bi-instagram"></i> Instagram</label>
          <input type="url" name="instagram" value="{{ old('instagram', $profil->instagram) }}" placeholder="https://instagram.com/smkn4bogor">
        </div>
        <div class="admin-form-group">
          <label><i class="bi bi-facebook"></i> Facebook</label>
          <input type="url" name="facebook" value="{{ old('facebook', $profil->facebook) }}" placeholder="https://facebook.com/smkn4bogor">
        </div>
      </div>

      <div class="admin-form-row">
        <div class="admin-form-group">
          <label><i class="bi bi-twitter-x"></i> Twitter / X</label>
          <input type="url" name="twitter" value="{{ old('twitter', $profil->twitter) }}" placeholder="https://x.com/smkn4bogor">
        </div>
        <div class="admin-form-group">
          <label><i class="bi bi-youtube"></i> YouTube</label>
          <input type="url" name="youtube" value="{{ old('youtube', $profil->youtube) }}" placeholder="https://youtube.com/@smkn4bogor">
        </div>
      </div>

      <div class="admin-form-group">
        <label><i class="bi bi-tiktok"></i> TikTok</label>
        <input type="url" name="tiktok" value="{{ old('tiktok', $profil->tiktok) }}" placeholder="https://tiktok.com/@smkn4bogor">
      </div>

      <button type="submit" class="admin-btn-primary" style="margin-top: 8px;">Simpan Perubahan</button>
    </form>
  </div>
@endsection
