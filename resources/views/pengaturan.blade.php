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
      <div>
        <div class="logo">
          <img src="{{ asset('asset/logo.png') }}" alt="Logo WPU Course" />
        </div>
        <nav>
        <ul>
        <a href="{{ route('dashboard') }}" class="menu-item">Dashboard</a>
        <a href="{{ route('daftarcourse') }}" class="menu-item">Course</a>
        <a href="{{ route('sertifikat') }}" class="menu-item">Sertifikat</a>
        <a href="{{ route('transaksi') }}" class="menu-item active">Transaksi</a>
        <a href="{{ route('pengaturan') }}" class="menu-item">Pengaturan</a>
        </ul>
        </nav>
      </div>
      <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="logout-btn">Logout</button>
        </form>
        <a class="support" href="#"><img src="{{ asset('asset/wa-icon.png') }}" alt="Support"> Contact Support</a>
      </div>
    </aside>

    <main class="main">
      <header>
        <h1>Pengaturan Profil</h1>
      </header>

      <section class="tabs">
        <button class="tab active">Profile</button>
        <button class="tab">Keamanan</button>
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
