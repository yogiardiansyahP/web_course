<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Codein Course</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container">
    <div class="login-left">
      <h2>Masuk</h2>
      <p>Selamat datang di platform Codein Course</p>
      <form action="#">
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Password" required>
        <div class="forgot-password">
          <a href="#">Lupa kata sandi?</a>
        </div>
        <button type="submit">Masuk</button>
        <p class="register-text">Kamu belum memiliki akun? <a href="#">Registrasi</a></p>
      </form>
    </div>
    <div class="login-right">
      <img src="{{ asset('asset/logo login.png') }}" alt="Code Book Logo">
    </div>
  </div>
</body>
</html>
