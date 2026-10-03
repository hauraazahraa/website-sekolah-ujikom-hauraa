@extends('admin.layout')

@section('title', 'Edit Profil')

@section('content')
  <div class="admin-page-head">
    <div>
      <h1>Edit Profil</h1>
      <p class="admin-page-subtitle">Perbarui informasi akun dan password kamu.</p>
    </div>
  </div>

  <form method="POST" action="{{ route('admin.profil.update') }}">
    @csrf
    @method('PUT')

    <div class="admin-card" style="padding: 24px; margin-bottom: 18px;">
      <h3 class="admin-section-heading">Informasi Akun</h3>

      <div class="admin-form-group">
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
      </div>

      <div class="admin-form-row">
        <div class="admin-form-group">
          <label>Username</label>
          <input type="text" name="username" value="{{ old('username', $user->username) }}" required>
        </div>
        <div class="admin-form-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
      </div>
    </div>

    <div class="admin-card" style="padding: 24px; margin-bottom: 18px;">
      <h3 class="admin-section-heading">Ubah Password <span class="admin-optional">(opsional, kosongkan jika tidak ingin mengganti)</span></h3>

      <div class="admin-form-group">
        <label>Password Saat Ini</label>
        <input type="password" name="current_password" autocomplete="current-password">
      </div>

      <div class="admin-form-row">
        <div class="admin-form-group">
          <label>Password Baru</label>
          <input type="password" name="password" autocomplete="new-password">
        </div>
        <div class="admin-form-group">
          <label>Konfirmasi Password Baru</label>
          <input type="password" name="password_confirmation" autocomplete="new-password">
        </div>
      </div>
    </div>

    <button type="submit" class="admin-btn-primary">Simpan Perubahan</button>
  </form>
@endsection
