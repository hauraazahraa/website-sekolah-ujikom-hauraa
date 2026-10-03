@extends('admin.layout')

@section('title', 'Manajemen Pengumuman')

@section('content')
  <div class="admin-page-head">
    <h1>Manajemen Pengumuman</h1>
    <div class="admin-page-actions">
      <form method="GET" class="admin-search">
        <i class="bi bi-search"></i>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pengumuman...">
      </form>
      <button type="button" class="admin-btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPengumuman">
        <i class="bi bi-plus-lg"></i> Tambah Pengumuman
      </button>
    </div>
  </div>

  <div class="admin-card">
    <table class="admin-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Pengumuman</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($pengumuman as $item)
          <tr>
            <td>{{ $loop->iteration + ($pengumuman->currentPage() - 1) * $pengumuman->perPage() }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->tanggal->format('d M Y') }}</td>
            <td>
              <span class="admin-badge admin-badge--{{ $item->status === 'aktif' ? 'green' : 'gray' }}">{{ $item->status }}</span>
            </td>
            <td class="admin-table-actions">
              <button type="button" class="admin-icon-btn" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                <i class="bi bi-pencil"></i>
              </button>
              <form method="POST" action="{{ route('admin.pengumuman.destroy', $item) }}" onsubmit="return confirm('Hapus pengumuman ini?');">
                @csrf @method('DELETE')
                <button type="submit" class="admin-icon-btn admin-icon-btn--danger"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>

          <!-- Modal Edit -->
          <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content admin-modal">
                <form method="POST" action="{{ route('admin.pengumuman.update', $item) }}">
                  @csrf @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="admin-form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" value="{{ $item->judul }}" required>
                    </div>
                    <div class="admin-form-group">
                      <label>Isi (opsional)</label>
                      <textarea name="isi" rows="3">{{ $item->isi }}</textarea>
                    </div>
                    <div class="admin-form-row">
                      <div class="admin-form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="{{ $item->tanggal->format('Y-m-d') }}" required>
                      </div>
                      <div class="admin-form-group">
                        <label>Status</label>
                        <select name="status" required>
                          <option value="aktif" {{ $item->status === 'aktif' ? 'selected' : '' }}>Aktif</option>
                          <option value="arsip" {{ $item->status === 'arsip' ? 'selected' : '' }}>Arsip</option>
                        </select>
                      </div>
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
          <tr><td colspan="5" class="admin-empty">Belum ada pengumuman.</td></tr>
        @endforelse
      </tbody>
    </table>

    @if ($pengumuman->total() > 0)
      <div class="admin-table-footer">
        <span>Menampilkan {{ $pengumuman->firstItem() }} - {{ $pengumuman->lastItem() }} dari {{ $pengumuman->total() }} data</span>
        {{ $pengumuman->links() }}
      </div>
    @endif
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="modalTambahPengumuman" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content admin-modal">
        <form method="POST" action="{{ route('admin.pengumuman.store') }}">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Tambah Pengumuman</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="admin-form-group">
              <label>Judul</label>
              <input type="text" name="judul" required>
            </div>
            <div class="admin-form-group">
              <label>Isi (opsional)</label>
              <textarea name="isi" rows="3"></textarea>
            </div>
            <div class="admin-form-row">
              <div class="admin-form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" required>
              </div>
              <div class="admin-form-group">
                <label>Status</label>
                <select name="status" required>
                  <option value="aktif">Aktif</option>
                  <option value="arsip">Arsip</option>
                </select>
              </div>
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
