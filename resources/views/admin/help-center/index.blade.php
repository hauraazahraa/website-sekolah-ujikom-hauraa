@extends('admin.layout')

@section('title', 'Help Center')

@section('content')
  <div class="admin-page-head">
    <div>
      <h1>Help Center</h1>
      <p class="admin-page-subtitle">Panduan singkat menggunakan halaman admin, dan cara menghubungi IT Support.</p>
    </div>
  </div>

  <div class="help-contact-card">
    <div class="help-contact-icon"><i class="bi bi-headset"></i></div>
    <div class="help-contact-text">
      <h3>Butuh bantuan langsung?</h3>
      <p>Kalau panduan di bawah belum menjawab, hubungi IT Support sekolah.</p>
    </div>
    <div class="help-contact-actions">
      <a href="https://wa.me/{{ $pengaturan->wa_it }}?text={{ rawurlencode('Halo, saya butuh bantuan terkait admin website SMKN 4 Bogor.') }}" target="_blank" rel="noopener" class="help-contact-btn help-contact-btn--wa">
        <i class="bi bi-whatsapp"></i> WhatsApp
      </a>
      <a href="mailto:{{ $pengaturan->email_it }}" class="help-contact-btn help-contact-btn--email">
        <i class="bi bi-envelope"></i> Email
      </a>
    </div>
  </div>

  <div class="help-faq-wrap">

    <p class="help-faq-label">Konten Website</p>

    <div class="help-faq-item">
      <button type="button" class="help-faq-q">
        <span>Bagaimana cara menambahkan pengumuman baru?</span>
        <i class="bi bi-chevron-down"></i>
      </button>
      <div class="help-faq-a">
        <p>Buka menu <strong>Konten Website &rarr; Pengumuman</strong>, klik tombol <strong>"+ Tambah Pengumuman"</strong> di kanan atas. Isi judul, isi (opsional), tanggal, dan status (Aktif/Arsip), lalu klik Simpan. Pengumuman berstatus <strong>Aktif</strong> otomatis tampil di halaman Beranda dan pada 2 papan info di bagian Hero.</p>
      </div>
    </div>

    <div class="help-faq-item">
      <button type="button" class="help-faq-q">
        <span>Kenapa pengumuman yang saya arsipkan masih terasa ada datanya?</span>
        <i class="bi bi-chevron-down"></i>
      </button>
      <div class="help-faq-a">
        <p>Pengumuman berstatus <strong>Arsip</strong> tidak dihapus, hanya disembunyikan dari halaman publik. Datanya tetap ada di tabel Pengumuman dan bisa diaktifkan lagi kapan saja lewat tombol edit (ikon pensil).</p>
      </div>
    </div>

    <div class="help-faq-item">
      <button type="button" class="help-faq-q">
        <span>Bagaimana cara menambah foto ke Galeri Sekolah?</span>
        <i class="bi bi-chevron-down"></i>
      </button>
      <div class="help-faq-a">
        <p>Buka menu <strong>Konten Website &rarr; Galeri Sekolah</strong>, klik <strong>"+ Tambah Foto"</strong>. Isi judul, pilih kategori (Kegiatan/Prestasi), tanggal, lalu upload foto (maksimal 10MB, format gambar). Foto langsung tampil di halaman Beranda begitu disimpan.</p>
      </div>
    </div>

    <div class="help-faq-item">
      <button type="button" class="help-faq-q">
        <span>Saya sudah upload foto tapi tiba-tiba hilang, kenapa?</span>
        <i class="bi bi-chevron-down"></i>
      </button>
      <div class="help-faq-a">
        <p>Foto hanya hilang kalau ikon tempat sampah (🗑️) di card foto itu diklik dan konfirmasi hapus di-OK. Tindakan ini permanen (file dan data terhapus bersamaan) dan tidak bisa dibatalkan. Selalu klik Batal kalau ragu.</p>
      </div>
    </div>

    <div class="help-faq-item">
      <button type="button" class="help-faq-q">
        <span>Bagaimana cara menambah produk Merchandise?</span>
        <i class="bi bi-chevron-down"></i>
      </button>
      <div class="help-faq-a">
        <p>Buka menu <strong>Konten Website &rarr; Merchandise</strong>, klik <strong>"+ Tambah Produk"</strong>. Isi nama produk, harga, deskripsi (opsional), status (Aktif/Nonaktif), dan foto produk. Produk berstatus <strong>Aktif</strong> akan tampil di section "Produk Merchandise" pada halaman Beranda dengan tombol "Pesan via WhatsApp".</p>
      </div>
    </div>

    <p class="help-faq-label">Data Sekolah &amp; Pengaturan</p>

    <div class="help-faq-item">
      <button type="button" class="help-faq-q">
        <span>Di mana saya mengubah alamat, telepon, dan email sekolah?</span>
        <i class="bi bi-chevron-down"></i>
      </button>
      <div class="help-faq-a">
        <p>Buka menu <strong>Data Sekolah</strong> di sidebar. Isi Alamat, Telepon, Email, Akreditasi, Visi, dan Misi, lalu Simpan. Alamat, Telepon, dan Email otomatis tampil di section "Kontak Kami" pada halaman Beranda.</p>
      </div>
    </div>

    <div class="help-faq-item">
      <button type="button" class="help-faq-q">
        <span>Bagaimana cara mengubah nomor WhatsApp pemesanan atau angka statistik di Beranda?</span>
        <i class="bi bi-chevron-down"></i>
      </button>
      <div class="help-faq-a">
        <p>Buka menu <strong>Pengaturan</strong> di sidebar. Di situ ada nomor WhatsApp pemesanan Merchandise, nomor WhatsApp IT Support (dipakai di popup Lupa Password), email IT Support, dan angka statistik (Siswa Aktif, Guru, Ruang Kelas, Prestasi Nasional) yang tampil di halaman Beranda.</p>
      </div>
    </div>

    <p class="help-faq-label">Akun &amp; Login</p>

    <div class="help-faq-item">
      <button type="button" class="help-faq-q">
        <span>Bagaimana cara mengubah nama, username, atau password saya?</span>
        <i class="bi bi-chevron-down"></i>
      </button>
      <div class="help-faq-a">
        <p>Klik avatar di pojok kanan atas, pilih <strong>"Edit Profil"</strong>. Nama, username, dan email bisa diubah langsung. Untuk mengganti password, isi password saat ini terlebih dahulu, lalu password baru dan konfirmasinya (minimal 8 karakter).</p>
      </div>
    </div>

    <div class="help-faq-item">
      <button type="button" class="help-faq-q">
        <span>Saya lupa password, apa yang harus dilakukan?</span>
        <i class="bi bi-chevron-down"></i>
      </button>
      <div class="help-faq-a">
        <p>Reset password tidak dilakukan otomatis demi keamanan. Di halaman Login, klik <strong>"Lupa Password?"</strong>, lalu hubungi IT Support lewat WhatsApp atau email yang muncul di situ untuk dibantu proses reset.</p>
      </div>
    </div>

  </div>
@endsection

@section('scripts')
  <script>
    document.querySelectorAll('.help-faq-q').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var item = btn.closest('.help-faq-item');
        item.classList.toggle('open');
      });
    });
  </script>
@endsection


