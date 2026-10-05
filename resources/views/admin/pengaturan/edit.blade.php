@extends('admin.layout')

@section('title', 'Pengaturan')

@section('content')
  <div class="admin-page-head">
    <div>
      <h1>Pengaturan</h1>
      <p class="admin-page-subtitle">Atur kontak WhatsApp dan angka statistik yang tampil di website.</p>
    </div>
  </div>

  <form method="POST" action="{{ route('admin.pengaturan.update') }}">
    @csrf
    @method('PUT')

    <div class="admin-card" style="padding: 24px; margin-bottom: 18px;">
      <h3 style="font-family: var(--heading-font); font-size: 15px; font-weight: 700; margin: 0 0 4px;">Kontak WhatsApp &amp; Bantuan</h3>
      <p style="font-size: 12.5px; color: var(--sm-ink-soft); margin: 0 0 18px;">Nomor ini dipakai di tombol "Pesan via WhatsApp" (Merchandise) dan popup "Lupa Password" di halaman login.</p>

      <div class="admin-form-row">
        <div class="admin-form-group">
          <label>WhatsApp Pemesanan Merchandise</label>
          <input type="text" name="wa_merchandise" value="{{ old('wa_merchandise', $pengaturan->wa_merchandise) }}" placeholder="0812 3456 7890" required>
        </div>
        <div class="admin-form-group">
          <label>WhatsApp IT Support (Lupa Password)</label>
          <input type="text" name="wa_it" value="{{ old('wa_it', $pengaturan->wa_it) }}" placeholder="0812 3456 7890" required>
        </div>
      </div>

      <div class="admin-form-group">
        <label>Email IT Support</label>
        <input type="email" name="email_it" value="{{ old('email_it', $pengaturan->email_it) }}" placeholder="admin@smkn4bogor.sch.id" required>
      </div>

      <small style="color: var(--sm-ink-soft); font-size: 12px;">Boleh ditulis dengan awalan 0 atau spasi/strip, nanti otomatis dirapikan ke format 62xxxxxxxxxx.</small>
    </div>

    <div class="admin-card" style="padding: 24px; margin-bottom: 18px;">
      <h3 style="font-family: var(--heading-font); font-size: 15px; font-weight: 700; margin: 0 0 4px;">Statistik Beranda</h3>
      <p style="font-size: 12.5px; color: var(--sm-ink-soft); margin: 0 0 18px;">Angka yang tampil di strip statistik di bawah bagian atas halaman Beranda.</p>

      <div class="admin-form-row">
        <div class="admin-form-group">
          <label>Siswa Aktif</label>
          <input type="number" name="stat_siswa" min="0" value="{{ old('stat_siswa', $pengaturan->stat_siswa) }}" required>
        </div>
        <div class="admin-form-group">
          <label>Guru dan Staff</label>
          <input type="number" name="stat_guru" min="0" value="{{ old('stat_guru', $pengaturan->stat_guru) }}" required>
        </div>
      </div>

      <div class="admin-form-row">
        <div class="admin-form-group">
          <label>Ruang Kelas</label>
          <input type="number" name="stat_kelas" min="0" value="{{ old('stat_kelas', $pengaturan->stat_kelas) }}" required>
        </div>
        <div class="admin-form-group">
          <label>Prestasi Nasional</label>
          <input type="number" name="stat_prestasi" min="0" value="{{ old('stat_prestasi', $pengaturan->stat_prestasi) }}" required>
        </div>
      </div>
    </div>

    <button type="submit" class="admin-btn-primary">Simpan Pengaturan</button>
  </form>
@endsection
