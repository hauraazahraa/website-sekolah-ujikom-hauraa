<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login Admin - SMK NEGERI 4 BOGOR</title>

  <link href="{{ asset('assets/img/Desain tanpa judul.png') }}" rel="icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="login-page">

  <div class="login-wrap">
    <div class="login-card">

      <div class="login-brand">
        <img src="{{ asset('assets/img/Desain tanpa judul.png') }}" alt="Logo SMK Negeri 4 Bogor">
        <h1>Sistem Informasi Akademik<br>SMK Negeri 4 Bogor</h1>
        <p>Silakan login menggunakan akun Anda.</p>
      </div>

      @if ($errors->any())
        <div class="login-alert">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('login.submit') }}" class="login-form">
        @csrf

        <div class="login-field">
          <label for="username">Username / NIS / NIP</label>
          <div class="login-input">
            <i class="bi bi-person"></i>
            <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username Anda" required autofocus>
          </div>
        </div>

        <div class="login-field">
          <label for="password">Password</label>
          <div class="login-input">
            <i class="bi bi-lock"></i>
            <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
            <i class="bi bi-eye login-toggle-password" data-target="password"></i>
          </div>
        </div>

        <div class="login-row">
          <label class="login-remember">
            <input type="checkbox" name="remember">
            <span>Ingat saya</span>
          </label>
          <a href="#" id="linkLupaPassword" class="login-forgot">Lupa Password?</a>
        </div>

        <button type="submit" class="login-submit">Login</button>
      </form>

      <a href="{{ url('/') }}" class="login-back">
        <i class="bi bi-arrow-left"></i> Kembali ke Beranda
      </a>

    </div>
  </div>

  <!-- Popup Lupa Password -->
  <div id="lupaPasswordOverlay" class="lupa-overlay">
    <div class="lupa-card">
      <button type="button" id="closeLupaPassword" class="lupa-close" aria-label="Tutup">
        <i class="bi bi-x-lg"></i>
      </button>

      <div class="lupa-icon"><i class="bi bi-headset"></i></div>
      <h3>Lupa Password?</h3>
      <p>Untuk keamanan, reset password tidak dilakukan otomatis. Silakan hubungi Admin/IT Support sekolah untuk dibantu proses login.</p>

      <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20lupa%20password%20untuk%20login%20admin%20website%20SMKN%204%20Bogor.%20Mohon%20bantuannya." target="_blank" rel="noopener" class="lupa-contact-btn">
        <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
      </a>
      <p class="lupa-alt-contact">atau email ke <strong>admin@smkn4bogor.sch.id</strong></p>
    </div>
  </div>

  <script>
    document.querySelectorAll('.login-toggle-password').forEach(function (icon) {
      icon.addEventListener('click', function () {
        var input = document.getElementById(icon.getAttribute('data-target'));
        var isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';
        icon.classList.toggle('bi-eye', !isHidden);
        icon.classList.toggle('bi-eye-slash', isHidden);
      });
    });

    var overlay = document.getElementById('lupaPasswordOverlay');
    document.getElementById('linkLupaPassword').addEventListener('click', function (e) {
      e.preventDefault();
      overlay.classList.add('show');
    });
    document.getElementById('closeLupaPassword').addEventListener('click', function () {
      overlay.classList.remove('show');
    });
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) overlay.classList.remove('show');
    });
  </script>

</body>

</html>
