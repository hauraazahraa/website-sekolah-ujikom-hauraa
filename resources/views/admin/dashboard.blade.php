@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
  <div class="admin-page-head">
    <div>
      <h1>Selamat datang, {{ auth()->user()->name }} 👋</h1>
      <p class="admin-page-subtitle">Ringkasan konten website SMK Negeri 4 Bogor.</p>
    </div>
  </div>

  <!-- Stat cards -->
  <div class="dash-stats-row">
    <div class="dash-stat-card">
      <div class="dash-stat-icon dash-stat-icon--blue"><i class="bi bi-megaphone"></i></div>
      <div>
        <span class="dash-stat-number">{{ $stats['pengumuman_aktif'] }}</span>
        <span class="dash-stat-label">Pengumuman Aktif</span>
      </div>
    </div>

    <div class="dash-stat-card">
      <div class="dash-stat-icon dash-stat-icon--gray"><i class="bi bi-file-earmark-text"></i></div>
      <div>
        <span class="dash-stat-number">{{ $stats['pengumuman_total'] }}</span>
        <span class="dash-stat-label">Total Pengumuman</span>
      </div>
    </div>

    <div class="dash-stat-card">
      <div class="dash-stat-icon dash-stat-icon--green"><i class="bi bi-images"></i></div>
      <div>
        <span class="dash-stat-number">{{ $stats['galeri_total'] }}</span>
        <span class="dash-stat-label">Foto Galeri</span>
      </div>
    </div>

    <div class="dash-stat-card">
      <div class="dash-stat-icon dash-stat-icon--orange"><i class="bi bi-bag"></i></div>
      <div>
        <span class="dash-stat-number">{{ $stats['merchandise_aktif'] }}</span>
        <span class="dash-stat-label">Produk Aktif</span>
      </div>
    </div>
  </div>

  <!-- Quick access -->
  <div class="dash-quick-row">
    <a href="{{ route('admin.pengumuman.index') }}" class="dash-quick-card">
      <i class="bi bi-megaphone"></i>
      <span>Kelola Pengumuman</span>
      <i class="bi bi-arrow-right dash-quick-arrow"></i>
    </a>
    <a href="{{ route('admin.galeri.index') }}" class="dash-quick-card">
      <i class="bi bi-images"></i>
      <span>Kelola Galeri Sekolah</span>
      <i class="bi bi-arrow-right dash-quick-arrow"></i>
    </a>
    <a href="{{ route('admin.merchandise.index') }}" class="dash-quick-card">
      <i class="bi bi-bag"></i>
      <span>Kelola Merchandise</span>
      <i class="bi bi-arrow-right dash-quick-arrow"></i>
    </a>
    <a href="{{ route('admin.data-sekolah.edit') }}" class="dash-quick-card">
      <i class="bi bi-building"></i>
      <span>Data Sekolah</span>
      <i class="bi bi-arrow-right dash-quick-arrow"></i>
    </a>
  </div>

  <!-- Recent activity -->
  <div class="dash-recent-row">
    <div class="admin-card dash-recent-card">
      <div class="dash-recent-head">
        <h3>Pengumuman Terbaru</h3>
        <a href="{{ route('admin.pengumuman.index') }}">Lihat semua</a>
      </div>
      @forelse ($pengumumanTerbaru as $p)
        <div class="dash-recent-item">
          <div>
            <strong>{{ $p->judul }}</strong>
            <span>{{ $p->tanggal->translatedFormat('d M Y') }}</span>
          </div>
          <span class="admin-badge admin-badge--{{ $p->status === 'aktif' ? 'green' : 'gray' }}">{{ ucfirst($p->status) }}</span>
        </div>
      @empty
        <p class="admin-empty" style="padding: 16px 0;">Belum ada pengumuman.</p>
      @endforelse
    </div>

    <div class="admin-card dash-recent-card">
      <div class="dash-recent-head">
        <h3>Foto Terbaru</h3>
        <a href="{{ route('admin.galeri.index') }}">Lihat semua</a>
      </div>
      @if ($galeriTerbaru->count() > 0)
        <div class="dash-recent-thumbs">
          @foreach ($galeriTerbaru as $g)
            <img src="{{ $g->fotoUrl() }}" alt="{{ $g->judul }}">
          @endforeach
        </div>
      @else
        <p class="admin-empty" style="padding: 16px 0;">Belum ada foto galeri.</p>
      @endif
    </div>
  </div>
@endsection