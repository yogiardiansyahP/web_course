<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrasi - Codein Course</title>
  <link rel="stylesheet" href="css/register.css">
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2>Registrasi</h2>
      <p>Buat akun untuk menggunakan platform Codein Course</p>
      <form action="#" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama Lengkap" required />
        <input type="text" name="username" placeholder="Username" required />
        <input type="email" name="email" placeholder="Email" required />
        <div class="password-input">
          <input type="password" name="password" placeholder="Password" required />
          <span class="toggle-password"></span>
        </div>
        <div class="password-input">
          <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required />
          <span class="toggle-password"></span>
        </div>
        <button type="submit" class="btn-filled">Buat Akun</button>
      </form>
      <p class="footer-text">Kamu sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></p>
      <div class="logo-icon">
        <img src="{{ asset('asset/logo.png') }}" alt="Logo Icon" />
      </div>
    </div>
    <div class="image-container">
      <img src="{{ asset('asset/logo login.png') }}" alt="Ilustrasi Register" />
    </div>
  </div>
</body>
</html>
