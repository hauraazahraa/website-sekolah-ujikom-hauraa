@extends('admin.layout')

@section('title', 'Manajemen Galeri')

@section('content')
  <div class="admin-page-head">
    <div>
      <h1>Manajemen Galeri</h1>
      <p class="admin-page-subtitle">Kelola foto dan dokumentasi kegiatan sekolah.</p>
    </div>
    <button type="button" class="admin-btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahFoto">
      <i class="bi bi-plus-lg"></i> Tambah Foto
    </button>
  </div>

  <div class="admin-filter-pills">
    <a href="{{ route('admin.galeri.index') }}" class="{{ !request('kategori') ? 'active' : '' }}">Semua</a>
    <a href="{{ route('admin.galeri.index', ['kategori' => 'kegiatan']) }}" class="{{ request('kategori') === 'kegiatan' ? 'active' : '' }}">Kegiatan</a>
    <a href="{{ route('admin.galeri.index', ['kategori' => 'prestasi']) }}" class="{{ request('kategori') === 'prestasi' ? 'active' : '' }}">Prestasi</a>
  </div>

  <div class="admin-gallery-grid">
    @forelse ($galeri as $item)
      <div class="admin-gallery-card">
        <div class="admin-gallery-thumb">
          <img src="{{ $item->fotoUrl() }}" alt="{{ $item->judul }}">
          <span class="admin-badge admin-badge--{{ $item->kategori === 'prestasi' ? 'blue' : 'green' }} admin-gallery-badge">{{ ucfirst($item->kategori) }}</span>
        </div>
        <div class="admin-gallery-body">
          <h3>{{ $item->judul }}</h3>
          <span class="admin-gallery-date"><i class="bi bi-calendar3"></i> {{ $item->tanggal->translatedFormat('d F Y') }}</span>
          <div class="admin-gallery-actions">
            <button type="button" class="admin-icon-btn" data-bs-toggle="modal" data-bs-target="#modalEditFoto{{ $item->id }}"><i class="bi bi-pencil"></i></button>
            <form method="POST" action="{{ route('admin.galeri.destroy', $item) }}" onsubmit="return confirm('Hapus foto ini?');">
              @csrf @method('DELETE')
              <button type="submit" class="admin-icon-btn admin-icon-btn--danger"><i class="bi bi-trash"></i></button>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal Edit Foto -->
      <div class="modal fade" id="modalEditFoto{{ $item->id }}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content admin-modal">
            <form method="POST" action="{{ route('admin.galeri.update', $item) }}" enctype="multipart/form-data">
              @csrf @method('PUT')
              <div class="modal-header">
                <h5 class="modal-title">Edit Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="admin-form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" value="{{ $item->judul }}" required>
                </div>
                <div class="admin-form-group">
                  <label>Caption (opsional)</label>
                  <textarea name="caption" rows="3" maxlength="500">{{ $item->caption }}</textarea>
                </div>
                <div class="admin-form-row">
                  <div class="admin-form-group">
                    <label>Kategori</label>
                    <select name="kategori" required>
                      <option value="kegiatan" {{ $item->kategori === 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                      <option value="prestasi" {{ $item->kategori === 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                    </select>
                  </div>
                  <div class="admin-form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $item->tanggal->format('Y-m-d') }}" required>
                  </div>
                </div>
                <div class="admin-form-group">
                  <label>Ganti Foto (opsional)</label>
                  <input type="file" name="foto" accept="image/*">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="admin-btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="admin-btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @empty
      <p class="admin-empty">Belum ada foto galeri. Klik "Tambah Foto" untuk menambahkan.</p>
    @endforelse
  </div>

  <!-- Modal Tambah Foto -->
  <div class="modal fade" id="modalTambahFoto" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content admin-modal">
        <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Tambah Foto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="admin-form-group">
              <label>Judul</label>
              <input type="text" name="judul" required>
            </div>
            <div class="admin-form-group">
              <label>Caption (opsional)</label>
              <textarea name="caption" rows="3" maxlength="500"></textarea>
            </div>
            <div class="admin-form-row">
              <div class="admin-form-group">
                <label>Kategori</label>
                <select name="kategori" required>
                  <option value="kegiatan">Kegiatan</option>
                  <option value="prestasi">Prestasi</option>
                </select>
              </div>
              <div class="admin-form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" required>
              </div>
            </div>
            <div class="admin-form-group">
              <label>Foto</label>
              <input type="file" name="foto" accept="image/*" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="admin-btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="admin-btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endsection
