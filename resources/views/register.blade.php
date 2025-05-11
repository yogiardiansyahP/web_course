<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrasi - Codein Course</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2>Registrasi</h2>
      <p>Buat akun untuk menggunakan platform Codein Course</p>

      <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required />
        @error('name') 
          <small style="color:red">{{ $message }}</small> 
        @enderror

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
        @error('email') 
          <small style="color:red">{{ $message }}</small> 
        @enderror

        <div class="password-input">
          <input type="password" name="password" placeholder="Password" required />
        </div>
        @error('password') 
          <small style="color:red">{{ $message }}</small> 
        @enderror

        <div class="password-input">
          <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required />
        </div>
        @error('password_confirmation') 
          <small style="color:red">{{ $message }}</small> 
        @enderror

        <button type="submit" class="btn-filled">Buat Akun</button>
      </form>

      <p class="footer-text">
        Kamu sudah memiliki akun? <a href="{{ route('login.post') }}">Masuk</a>
      </p>
    </div>

    <div class="image-container">
      <img src="{{ asset('asset/logo login.png') }}" alt="Ilustrasi Register" />
    </div>
  </div>
</body>
</html>
