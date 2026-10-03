<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Console') - SMK NEGERI 4 BOGOR</title>

  <link href="{{ asset('assets/img/Desain tanpa judul.png') }}" rel="icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
</head>
<body class="admin-body">

  <div class="admin-shell">
    <div class="admin-overlay" id="adminOverlay"></div>
    <aside class="admin-sidebar">
      <div class="admin-brand">
        <img src="{{ asset('assets/img/Desain tanpa judul.png') }}" alt="Logo">
        <span>SMKN 4 BOGOR</span>
      </div>

      <p class="admin-menu-label">Main Menu</p>
      <nav class="admin-menu">
        <a href="{{ route('admin.dashboard') }}" class="admin-menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <i class="bi bi-grid"></i> Dashboard
        </a>

        <div class="admin-menu-group {{ request()->routeIs('admin.pengumuman.*') || request()->routeIs('admin.galeri.*') || request()->routeIs('admin.merchandise.*') ? 'open' : '' }}">
          <span class="admin-menu-item admin-menu-parent {{ request()->routeIs('admin.pengumuman.*') || request()->routeIs('admin.galeri.*') || request()->routeIs('admin.merchandise.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i> Konten Website
          </span>
          <div class="admin-submenu">
            <a href="{{ route('admin.pengumuman.index') }}" class="{{ request()->routeIs('admin.pengumuman.*') ? 'active' : '' }}">Pengumuman</a>
            <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">Galeri Sekolah</a>
            <a href="{{ route('admin.merchandise.index') }}" class="{{ request()->routeIs('admin.merchandise.*') ? 'active' : '' }}">Merchandise</a>
          </div>
        </div>

        <a href="{{ route('admin.data-sekolah.edit') }}" class="admin-menu-item {{ request()->routeIs('admin.data-sekolah.*') ? 'active' : '' }}">
          <i class="bi bi-building"></i> Data Sekolah
        </a>
        <a href="{{ route('admin.pengaturan.edit') }}" class="admin-menu-item {{ request()->routeIs('admin.pengaturan.*') ? 'active' : '' }}">
          <i class="bi bi-gear"></i> Pengaturan
        </a>
      </nav>

      <div class="admin-sidebar-footer">
        <a href="{{ route('admin.help-center.index') }}" class="admin-menu-item {{ request()->routeIs('admin.help-center.*') ? 'active' : '' }}"><i class="bi bi-question-circle"></i> Help Center</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="admin-menu-item admin-logout">
            <i class="bi bi-box-arrow-right"></i> Logout
          </button>
        </form>
      </div>
    </aside>

    <div class="admin-main">
      <header class="admin-topbar">
        <button type="button" id="sidebarToggle" class="admin-sidebar-toggle" aria-label="Buka menu">
  <i class="bi bi-list"></i>
</button>

        <div class="admin-topbar-search">
          <i class="bi bi-search"></i>
          <input type="text" placeholder="Cari...">
        </div>
        <div class="admin-topbar-right">
          <i class="bi bi-bell"></i>

          <div class="admin-profile-menu" id="adminProfileMenu">
            <button type="button" class="admin-avatar-btn" id="adminProfileToggle" aria-label="Menu profil">
              <span class="admin-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
            </button>

            <div class="admin-profile-dropdown" id="adminProfileDropdown">
              <div class="admin-profile-info">
                <strong>{{ auth()->user()->name }}</strong>
                <span>{{ auth()->user()->username }}</span>
              </div>
              <a href="{{ route('admin.profil.edit') }}"><i class="bi bi-person"></i> Edit Profil</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="admin-profile-logout"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </div>
          </div>
        </div>
      </header>

      <main class="admin-content">
        @if (session('success'))
          <div class="admin-alert admin-alert--success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
          <div class="admin-alert admin-alert--danger">
            <strong>Gagal menyimpan, periksa lagi:</strong>
            <ul style="margin: 6px 0 0; padding-left: 18px;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @yield('content')
      </main>
    </div>

  </div>

  <script>
  (function () {
    var menu = document.getElementById('adminProfileMenu');
    var toggle = document.getElementById('adminProfileToggle');
    var dropdown = document.getElementById('adminProfileDropdown');

    toggle.addEventListener('click', function (e) {
      e.stopPropagation();
      dropdown.classList.toggle('show');
    });

    document.addEventListener('click', function (e) {
      if (!menu.contains(e.target)) dropdown.classList.remove('show');
    });

    var shell = document.querySelector('.admin-shell');
    var sidebarToggle = document.getElementById('sidebarToggle');
    var overlay = document.getElementById('adminOverlay');

    if (sidebarToggle && overlay && shell) {
      sidebarToggle.addEventListener('click', function () {
        shell.classList.toggle('sidebar-open');
      });
      overlay.addEventListener('click', function () {
        shell.classList.remove('sidebar-open');
      });
    }
  })();
</script>

@yield('scripts')
</body>
</html>
