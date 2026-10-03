@extends('admin.layout')

@section('title', 'Manajemen Merchandise')

@section('content')
  <div class="admin-page-head">
    <div>
      <h1>Manajemen Merchandise</h1>
      <p class="admin-page-subtitle">Kelola produk merchandise sekolah yang tampil di halaman Beranda.</p>
    </div>
    <button type="button" class="admin-btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">
      <i class="bi bi-plus-lg"></i> Tambah Produk
    </button>
  </div>

  <div class="admin-gallery-grid">
    @forelse ($merchandise as $item)
      <div class="admin-gallery-card">
        <div class="admin-gallery-thumb">
          <img src="{{ $item->fotoUrl() }}" alt="{{ $item->nama }}">
          <span class="admin-badge admin-badge--{{ $item->status === 'aktif' ? 'green' : 'gray' }} admin-gallery-badge">{{ ucfirst($item->status) }}</span>
        </div>
        <div class="admin-gallery-body">
          <h3>{{ $item->nama }}</h3>
          <span class="admin-gallery-date">{{ $item->hargaFormatted() }}</span>
          <div class="admin-gallery-actions">
            <button type="button" class="admin-icon-btn" data-bs-toggle="modal" data-bs-target="#modalEditProduk{{ $item->id }}"><i class="bi bi-pencil"></i></button>
            <form method="POST" action="{{ route('admin.merchandise.destroy', $item) }}" onsubmit="return confirm('Hapus produk ini?');">
              @csrf @method('DELETE')
              <button type="submit" class="admin-icon-btn admin-icon-btn--danger"><i class="bi bi-trash"></i></button>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal Edit Produk -->
      <div class="modal fade" id="modalEditProduk{{ $item->id }}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content admin-modal">
            <form method="POST" action="{{ route('admin.merchandise.update', $item) }}" enctype="multipart/form-data">
              @csrf @method('PUT')
              <div class="modal-header">
                <h5 class="modal-title">Edit Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="admin-form-group">
                  <label>Nama Produk</label>
                  <input type="text" name="nama" value="{{ $item->nama }}" required>
                </div>
                <div class="admin-form-row">
                  <div class="admin-form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ $item->harga }}" min="0" required>
                  </div>
                  <div class="admin-form-group">
                    <label>Status</label>
                    <select name="status" required>
                      <option value="aktif" {{ $item->status === 'aktif' ? 'selected' : '' }}>Aktif</option>
                      <option value="nonaktif" {{ $item->status === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                  </div>
                </div>
                <div class="admin-form-group">
                  <label>Deskripsi (opsional)</label>
                  <textarea name="deskripsi" rows="3">{{ $item->deskripsi }}</textarea>
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
      <p class="admin-empty">Belum ada produk merchandise. Klik "Tambah Produk" untuk menambahkan.</p>
    @endforelse
  </div>

  <!-- Modal Tambah Produk -->
  <div class="modal fade" id="modalTambahProduk" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content admin-modal">
        <form method="POST" action="{{ route('admin.merchandise.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Tambah Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="admin-form-group">
              <label>Nama Produk</label>
              <input type="text" name="nama" required>
            </div>
            <div class="admin-form-row">
              <div class="admin-form-group">
                <label>Harga (Rp)</label>
                <input type="number" name="harga" min="0" required>
              </div>
              <div class="admin-form-group">
                <label>Status</label>
                <select name="status" required>
                  <option value="aktif">Aktif</option>
                  <option value="nonaktif">Nonaktif</option>
                </select>
              </div>
            </div>
            <div class="admin-form-group">
              <label>Deskripsi (opsional)</label>
              <textarea name="deskripsi" rows="3"></textarea>
            </div>
            <div class="admin-form-group">
              <label>Foto Produk</label>
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
