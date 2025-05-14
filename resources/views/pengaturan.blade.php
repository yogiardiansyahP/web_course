<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pengaturan Profil</title>
  <link rel="stylesheet" href="{{ asset('css/pengaturan.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
  <img src="{{ asset('asset/dashboard_logo.png') }}" alt="Codein Course" class="logo">
  <a href="{{ route('dashboard') }}"  class="">Dashboard</a>
  <a href="{{ route('daftarcourse') }}">Course</a>
  <a href="{{ route('sertifikat') }}">Sertifikat</a>
  <a href="{{ route('transaksi') }}">Transaksi</a>
  <a href="{{ route('pengaturan') }}" class="active">Pengaturan</a>
  <hr style="margin: 20px 0;">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <a href="{{ route('login') }}">Contact Support</a>
</aside>

    <main class="main">
      <header>
        <h1>Pengaturan Profil</h1>
      </header>

      <section class="tabs">
        <button class="tab active">Profile</button>
        
      </section>

      <section class="profile-form">
        <h2>Profile</h2>
        <p>Kelola data profil kamu</p>

        <form action="{{ route('pengaturan.update') }}" method="POST">
          @csrf
          @method('PUT')

          <label for="email">Email</label>
          <input type="email" id="email" value="{{ $user->email }}" name="email" readonly />

          <label for="name">Username</label>
          <input type="text" id="name" value="{{ $user->name }}" name="name" required />

          <button type="submit" class="save-btn">Simpan Perubahan</button>
        </form>
      </section>
    </main>
  </div>
</body>
</html>
