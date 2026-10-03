<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SMK NEGERI 4 BOGOR</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Desain tanpa judul.png" rel="icon">
  <link href="assets/img/Desain tanpa judul.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="topbar-header">
    <div class="topbar-inner container-fluid">

      <a href="{{ url('/') }}" class="topbar-brand">
        <img src="{{ asset('assets/img/Desain tanpa judul.png') }}" alt="Logo SMKN 4 Bogor" class="topbar-logo">
        <span class="sitename">SMK NEGERI 4 BOGOR</span>
      </a>

      <form class="topbar-search" role="search">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Mencari...">
      </form>

      <i class="header-toggle topbar-toggle d-lg-none bi bi-list"></i>

      <nav id="navmenu" class="topbar-nav">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#program-keahlian">Jurusan</a></li>
          <li><a href="#galeri-preview">Galeri</a></li>
          <li><a href="#berita">Informasi</a></li>
          <li><a href="#merchandise">Merchandise</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
      </nav>

      <a href="{{ route('login') }}" class="topbar-login">Login</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero-cover section">

      <img src="assets/img/DJI_0145.JPG" alt="" class="hero-cover-img">
      <div class="hero-cover-overlay"></div>

      <div class="container hero-cover-content" data-aos="fade-up" data-aos-delay="100">
        <div class="hero-split-text">
          <span class="hero-eyebrow">Terakreditasi A</span>
          <h1>Mewujudkan Generasi Unggul, Siap Kerja, Siap Kuliah, Siap Berkarya</h1>
          <p>SMK Negeri 4 Bogor berkomitmen mencetak lulusan yang kompeten, berkarakter, dan siap menghadapi dunia kerja maupun pendidikan tinggi melalui pembelajaran berbasis teknologi dan kebutuhan industri.</p>
          <div class="hero-split-actions">
            <a href="#berita" class="btn-primary-pill">Informasi Selanjutnya</a>
            <a href="#program-keahlian" class="btn-text-link">Lihat Jurusan</a>
          </div>
        </div>
      </div>

      @php
        $pengumumanHero = ($pengumumanAktif ?? collect())->take(2);
      @endphp

      @if ($pengumumanHero->count() > 0)
        <div class="hero-float-card hero-cover-card--top" data-aos="fade-left" data-aos-delay="150">
          <span class="hero-float-label">Informasi Terbaru</span>
          <strong>{{ $pengumumanHero[0]->judul }}</strong>
          <p>{{ Str::limit($pengumumanHero[0]->isi ?? 'Segera lengkapi persyaratan dan jadwal terkait.', 90) }}</p>
          <a href="#pengumuman-list">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
        </div>
      @endif

      @if ($pengumumanHero->count() > 1)
        <div class="hero-float-card hero-cover-card--bottom" data-aos="fade-left" data-aos-delay="250">
          <span class="hero-float-label">Informasi Terbaru</span>
          <strong>{{ $pengumumanHero[1]->judul }}</strong>
          <p>{{ Str::limit($pengumumanHero[1]->isi ?? 'Pastikan seluruh persyaratan telah dipenuhi.', 90) }}</p>
          <a href="#pengumuman-list">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
        </div>
      @endif

    </section><!-- /Hero Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats-strip">
      <div class="container">
        <div class="stats-strip-row">
          <div class="stat-item">
            <span class="stat-number" data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="1" class="purecounter">1200</span><span class="stat-plus">+</span>
            <span class="stat-label">Siswa Aktif</span>
          </div>
          <div class="stat-item">
            <span class="stat-number" data-purecounter-start="0" data-purecounter-end="80" data-purecounter-duration="1" class="purecounter">80</span>
            <span class="stat-label">Guru Profesional</span>
          </div>
          <div class="stat-item">
            <span class="stat-number" data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1" class="purecounter">30</span>
            <span class="stat-label">Ruang Kelas</span>
          </div>
          <div class="stat-item">
            <span class="stat-number" data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter">15</span>
            <span class="stat-label">Prestasi Nasional</span>
          </div>
        </div>
      </div>
    </section><!-- /Stats Section -->

    <!-- Program Keahlian Section -->
    <section id="program-keahlian" class="program-keahlian section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Program Keahlian Unggulan</h2>
        <p>Kurikulum berbasis industri yang dirancang untuk menghasilkan talenta digital dan teknisi handal di masa depan.</p>
      </div>

      <div class="container">
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3 col-md-6">
            <div class="program-card">
              <div class="program-icon"><i class="bi bi-code-slash"></i></div>
              <h3>PPLG</h3>
              <p>Pengembangan Perangkat Lunak dan Gim berfokus pada software development dan game design.</p>
              <a href="#program-keahlian">Detail Jurusan <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="program-card">
              <div class="program-icon"><i class="bi bi-diagram-3"></i></div>
              <h3>TJKT</h3>
              <p>Teknik Jaringan Komputer dan Telekomunikasi menguasai infrastruktur IT dan cloud computing.</p>
              <a href="#program-keahlian">Detail Jurusan <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="program-card">
              <div class="program-icon"><i class="bi bi-car-front"></i></div>
              <h3>TO</h3>
              <p>Teknik Otomotif membekali siswa dengan keahlian pemeliharaan dan perbaikan kendaraan modern.</p>
              <a href="#program-keahlian">Detail Jurusan <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="program-card">
              <div class="program-icon"><i class="bi bi-tools"></i></div>
              <h3>TPFL</h3>
              <p>Teknik Pengelasan dan Fabrikasi Logam untuk manufaktur dan konstruksi alat berat.</p>
              <a href="#program-keahlian">Detail Jurusan <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>
      </div>
    </section><!-- /Program Keahlian Section -->

    <!-- Galeri Sekolah Section -->
    <section id="galeri-preview" class="galeri-preview section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Galeri Sekolah</h2>
        <p>Dokumentasi perjalanan akademik, kreativitas siswa, dan momen-momen penting di lingkungan SMK Negeri 4 Bogor.</p>
      </div>

      <div class="container">
        <ul class="gallery-pills" data-aos="fade-up" data-aos-delay="100">
          <li class="active" data-filter="semua">Semua</li>
          <li data-filter="kegiatan">Kegiatan</li>
          <li data-filter="prestasi">Prestasi</li>
        </ul>

        <div class="row g-4" data-aos="fade-up" data-aos-delay="150">
          @forelse ($galeriFotos ?? [] as $foto)
            <div class="col-md-4 gallery-item" data-category="{{ $foto->kategori }}">
              <div class="gallery-preview-img">
                <img src="{{ $foto->fotoUrl() }}" alt="{{ $foto->judul }}">
              </div>
            </div>
          @empty
            <div class="col-12">
              <p class="text-center" style="color: var(--sm-ink-soft);">Belum ada foto galeri. Tambahkan lewat halaman admin.</p>
            </div>
          @endforelse
        </div>
      </div>
    </section><!-- /Galeri Sekolah Section -->


    <!-- Berita Terbaru Section -->
<section id="berita" class="berita section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Berita Terbaru</h2>
    <p>Informasi terkini dan liputan acara seputar aktivitas di SMK Negeri 4 Bogor.</p>
  </div>

  <div class="container" id="pengumuman-list">
    <div class="pengumuman-list-wrap" data-aos="fade-up" data-aos-delay="80">
      @forelse ($pengumumanAktif ?? [] as $p)
        <div class="pengumuman-item"
             role="button"
             tabindex="0"
             onclick="openPengumumanModal(this)"
             data-title="{{ $p->judul }}"
             data-date="{{ $p->tanggal->translatedFormat('d F Y') }}"
             data-content="{{ $p->isi ?? 'Tidak ada detail tambahan.' }}">
          <div class="pengumuman-item-left">
            <i class="bi bi-megaphone"></i>
            <div>
              <h4>{{ $p->judul }}</h4>
              @if ($p->isi)
                <p>{{ Str::limit($p->isi, 120) }}</p>
              @endif
            </div>
          </div>
          <div class="pengumuman-item-right">
            <span class="pengumuman-date">{{ $p->tanggal->translatedFormat('d F Y') }}</span>
          </div>
        </div>
      @empty
        <p class="text-center" style="color: var(--sm-ink-soft); margin: 0;">Belum ada pengumuman aktif saat ini.</p>
      @endforelse
    </div>
  </div>
</section><!-- /Berita Terbaru Section -->

    <!-- Merchandise Section -->
    <section id="merchandise" class="merchandise section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Produk Merchandise</h2>
        <p>Merchandise Kustom resmi SMK Negeri 4 Bogor. Pesan langsung lewat WhatsApp, mudah dan cepat.</p>
      </div>

      <div class="container">
        <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
          @forelse ($merchandise ?? [] as $item)
            <div class="col-lg-3 col-md-6">
              <div class="merch-card">
                <div class="merch-thumb">
                  <img src="{{ $item->fotoUrl() }}" alt="{{ $item->nama }}">
                </div>
                <div class="merch-body">
                  <h3>{{ $item->nama }}</h3>
                  <span class="merch-price">{{ $item->hargaFormatted() }}</span>
                  @php
                    // GANTI nomor ini dengan nomor WhatsApp sekolah/admin.
                    // Format: 62 + nomor tanpa angka 0 di depan, tanpa spasi/strip.
                    $waNumber = '6281234567890';
                    $waMessage = rawurlencode("Halo, saya mau pesan produk \"{$item->nama}\" ({$item->hargaFormatted()}) dari SMK Negeri 4 Bogor.");
                  @endphp
                  <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}" target="_blank" rel="noopener" class="merch-order-btn">
                    <i class="bi bi-whatsapp"></i> Pesan via WhatsApp
                  </a>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12">
              <p class="merch-empty">Belum ada produk merchandise yang tersedia saat ini.</p>
            </div>
          @endforelse
        </div>
      </div>
    </section><!-- /Merchandise Section -->

    @if (($profilSekolah->visi ?? null) || ($profilSekolah->misi ?? null))
      <!-- Visi Misi Section -->
      <section id="visi-misi" class="visi-misi section light-background">
        <div class="container section-title" data-aos="fade-up">
          <h2>Visi &amp; Misi</h2>
          <p>Arah dan tujuan SMK Negeri 4 Bogor dalam mencetak lulusan unggul.</p>
        </div>

        <div class="container">
          <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
            @if ($profilSekolah->visi ?? null)
              <div class="col-md-6">
                <div class="visi-misi-card">
                  <div class="visi-misi-icon"><i class="bi bi-eye"></i></div>
                  <h3>Visi</h3>
                  <p>{{ $profilSekolah->visi }}</p>
                </div>
              </div>
            @endif

            @if ($profilSekolah->misi ?? null)
              <div class="col-md-6">
                <div class="visi-misi-card">
                  <div class="visi-misi-icon"><i class="bi bi-flag"></i></div>
                  <h3>Misi</h3>
                  <p style="white-space: pre-line;">{{ $profilSekolah->misi }}</p>
                </div>
              </div>
            @endif
          </div>
        </div>
      </section><!-- /Visi Misi Section -->
    @endif

    <!-- Contact Section -->
<section id="contact" class="contact section light-background">

  <!-- Section Title -->
  <div class="container section-title contact-title" data-aos="fade-up">
    <h2>Kontak Kami</h2>
    <p>Silakan hubungi kami untuk informasi lebih lanjut mengenai pendaftaran, kerja sama industri, atau pertanyaan umum lainnya.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-5">

        <div class="info-wrap">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Alamat</h3>
              <p>{{ $profilSekolah->alamat ?? 'Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel. Muarasari, Kec. Bogor Selatan, Kota Bogor, Jawa Barat 16137' }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Telepon</h3>
              <p>{{ $profilSekolah->telepon ?? '+62 251 7547381' }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email</h3>
              <p>{{ $profilSekolah->email ?? 'info@smkn4bogor.sch.id' }}</p>
            </div>
          </div><!-- End Info Item -->

          <!-- Google Maps SMKN 4 Bogor -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.049839612438!2d106.8221189745371!3d-6.640733364911477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267dfbc!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="sosmed-wrap">
          <h4 class="mb-1">Ikuti Kami di Sosial Media</h4>
          <p class="text-muted mb-4">Dapatkan info terbaru seputar kegiatan, pengumuman, dan prestasi SMK Negeri 4 Bogor.</p>

          @php
            // Nomor telepon sekolah dirapikan jadi format wa.me (62xxxxxxxxxx)
            $waDigits = preg_replace('/\D+/', '', $profilSekolah->telepon ?? '');
            if (str_starts_with($waDigits, '0')) {
                $waDigits = '62' . substr($waDigits, 1);
            }
          @endphp

          <div class="row g-3">

            @if ($profilSekolah->instagram ?? null)
              <div class="col-md-6">
                <a href="{{ $profilSekolah->instagram }}" target="_blank" rel="noopener" class="sosmed-card">
                  <span class="sosmed-icon" style="background:#fde8f1; color:#e1306c;"><i class="bi bi-instagram"></i></span>
                  <span class="sosmed-text">
                    <strong>Instagram</strong>
                    <small>Kunjungi profil kami</small>
                  </span>
                  <i class="bi bi-arrow-up-right sosmed-arrow"></i>
                </a>
              </div>
            @endif

            @if ($profilSekolah->youtube ?? null)
              <div class="col-md-6">
                <a href="{{ $profilSekolah->youtube }}" target="_blank" rel="noopener" class="sosmed-card">
                  <span class="sosmed-icon" style="background:#fde8e8; color:#ff0000;"><i class="bi bi-youtube"></i></span>
                  <span class="sosmed-text">
                    <strong>YouTube</strong>
                    <small>SMK Negeri 4 Bogor</small>
                  </span>
                  <i class="bi bi-arrow-up-right sosmed-arrow"></i>
                </a>
              </div>
            @endif

            @if ($profilSekolah->tiktok ?? null)
              <div class="col-md-6">
                <a href="{{ $profilSekolah->tiktok }}" target="_blank" rel="noopener" class="sosmed-card">
                  <span class="sosmed-icon" style="background:#e8f7f8; color:#000;"><i class="bi bi-tiktok"></i></span>
                  <span class="sosmed-text">
                    <strong>TikTok</strong>
                    <small>Kunjungi profil kami</small>
                  </span>
                  <i class="bi bi-arrow-up-right sosmed-arrow"></i>
                </a>
              </div>
            @endif

            @if ($profilSekolah->facebook ?? null)
              <div class="col-md-6">
                <a href="{{ $profilSekolah->facebook }}" target="_blank" rel="noopener" class="sosmed-card">
                  <span class="sosmed-icon" style="background:#e7effd; color:#1877f2;"><i class="bi bi-facebook"></i></span>
                  <span class="sosmed-text">
                    <strong>Facebook</strong>
                    <small>SMK Negeri 4 Bogor</small>
                  </span>
                  <i class="bi bi-arrow-up-right sosmed-arrow"></i>
                </a>
              </div>
            @endif

            @if ($waDigits)
              <div class="col-md-6">
                <a href="https://wa.me/{{ $waDigits }}" target="_blank" rel="noopener" class="sosmed-card">
                  <span class="sosmed-icon" style="background:#e6f7ec; color:#25d366;"><i class="bi bi-whatsapp"></i></span>
                  <span class="sosmed-text">
                    <strong>WhatsApp</strong>
                    <small>Chat langsung dengan kami</small>
                  </span>
                  <i class="bi bi-arrow-up-right sosmed-arrow"></i>
                </a>
              </div>
            @endif

            @if ($profilSekolah->email ?? null)
              <div class="col-md-6">
                <a href="mailto:{{ $profilSekolah->email }}" class="sosmed-card">
                  <span class="sosmed-icon" style="background:#e8f1fb; color:#0d6efd;"><i class="bi bi-envelope"></i></span>
                  <span class="sosmed-text">
                    <strong>Email</strong>
                    <small>{{ $profilSekolah->email }}</small>
                  </span>
                  <i class="bi bi-arrow-up-right sosmed-arrow"></i>
                </a>
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>
      </div><!-- End Contact Form -->

    </div>

  </div>

</section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">SMK Negeri 4 Bogor</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | <a href="https://bootstrapmade.com/tools/">DevTools</a>
      </div>
    </div>

  </footer>

  <!-- Modal Detail Pengumuman -->
  <div id="pengumumanModal" class="pengumuman-modal-overlay">
    <div class="pengumuman-modal-card">
      <button type="button" class="pengumuman-modal-close" onclick="closePengumumanModal()" aria-label="Tutup">&times;</button>
      <span class="pengumuman-modal-date" id="pengumumanModalDate"></span>
      <h3 class="pengumuman-modal-title" id="pengumumanModalTitle"></h3>
      <p class="pengumuman-modal-content" id="pengumumanModalContent"></p>
    </div>
  </div>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
document.querySelectorAll('#navmenu a').forEach(function (link) {
  link.addEventListener('click', function () {
    var header = document.getElementById('header');
    var toggle = document.querySelector('.header-toggle');
    if (header.classList.contains('header-show')) {
      header.classList.remove('header-show');
      toggle.classList.remove('bi-x');
      toggle.classList.add('bi-list');
    }
  });
});
</script>

  <!-- Fail-safe: always clear the preloader even if a template script errors out -->
  <script>
    window.addEventListener('load', function () {
      var pre = document.getElementById('preloader');
      if (pre) { pre.remove(); }
    });
  </script>

  <!-- Topbar nav: toggle active (blue + underline) state on click, and auto-highlight on scroll -->
  <script>
    (function () {
      var navLinks = document.querySelectorAll('.topbar-nav a');
      var sections = [];

      navLinks.forEach(function (link) {
        var id = link.getAttribute('href');
        if (id && id.charAt(0) === '#') {
          var target = document.querySelector(id);
          if (target) sections.push({ link: link, target: target });
        }
      });

      function setActive(activeLink) {
        navLinks.forEach(function (l) { l.classList.remove('active'); });
        activeLink.classList.add('active');
      }

      // Click: set active immediately (smooth scroll handled by CSS scroll-behavior)
      navLinks.forEach(function (link) {
        link.addEventListener('click', function () { setActive(link); });
      });

      // Scroll: auto-highlight whichever section is currently in view
      var navbarOffset = 100;
      function onScroll() {
        var scrollPos = window.scrollY + navbarOffset;
        var current = sections[0];
        sections.forEach(function (s) {
          if (s.target.offsetTop <= scrollPos) current = s;
        });
        if (current) setActive(current.link);
      }

      window.addEventListener('scroll', onScroll, { passive: true });
      window.addEventListener('load', onScroll);
    })();
  </script>

  <!-- Galeri Sekolah: pill filter click handler -->
  <script>
    document.querySelectorAll('.gallery-pills li').forEach(function (pill) {
      pill.addEventListener('click', function () {
        document.querySelectorAll('.gallery-pills li').forEach(function (p) {
          p.classList.remove('active');
        });
        pill.classList.add('active');

        var filter = pill.getAttribute('data-filter');
        document.querySelectorAll('.gallery-item').forEach(function (item) {
          var match = filter === 'semua' || item.getAttribute('data-category') === filter;
          item.style.display = match ? '' : 'none';
        });
      });
    });
  </script>

  <!-- Berita Terbaru: popup modal detail -->
  <script>
    function openPengumumanModal(el) {
      document.getElementById('pengumumanModalTitle').innerText = el.dataset.title;
      document.getElementById('pengumumanModalDate').innerText = el.dataset.date;
      document.getElementById('pengumumanModalContent').innerText = el.dataset.content;
      document.getElementById('pengumumanModal').classList.add('show');
      document.body.style.overflow = 'hidden';
    }

    function closePengumumanModal() {
      document.getElementById('pengumumanModal').classList.remove('show');
      document.body.style.overflow = '';
    }

    document.getElementById('pengumumanModal').addEventListener('click', function (e) {
      if (e.target === this) closePengumumanModal();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closePengumumanModal();
    });
  </script>

</body>

</html>
