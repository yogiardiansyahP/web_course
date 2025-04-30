<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pengaturan Profil</title>
  <link rel="stylesheet" href="{{ asset('css/pengaturan.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('kelas') }}">Bootcamp</a></li>
          <li><a href="{{ route('kelas') }}">Course</a></li>
          <li><a href="{{ route('sertifikat') }}">Sertifikat</a></li>
          <li><a href="{{ route('transaksi') }}">Transaksi</a></li>
          <li class="active"><a href="{{ route('pengaturan') }}">Pengaturan</a></li>
        </ul>
        </nav>
      </div>
      <div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="logout">Logout</button>
        </form>
        <a class="support" href="#"><img src="{{ asset('asset/wa-icon.png') }}" alt=""> Contact Support</a>
      </div>
    </aside>

    <main class="main-content">
      <header>
        <h1>Pengaturan</h1>
        <img class="user-avatar" src="{{ asset('asset/avatar.png') }}" alt="User Avatar" />
      </header>

      <section class="tabs">
        <button class="tab active">Profile</button>
        <button class="tab">Keamanan</button>
      </section>

      <section class="profile-form">
        <h2>Profile</h2>
        <p>Kelola avatar dan data profile kamu</p>
        <div class="avatar-section">
          <img src="{{ asset('asset/avatar.png') }}" alt="Avatar" class="avatar" />
          <button class="edit-avatar">✏️</button>
        </div>

        <form action="{{ route('pengaturan.update') }}" method="POST">
          @csrf
          @method('PUT')

          <label>Username</label>
          <input type="text" value="{{ $user->username ?? 'user123' }}" name="username" readonly />

          <label>Email</label>
          <input type="email" value="{{ $user->email }}" name="email" readonly />

          <label>Full Name</label>
          <input type="text" value="{{ $user->name }}" name="name" />

          <button type="submit" class="save-btn">Simpan Perubahan</button>
        </form>
      </section>
    </main>
  </div>
</body>
</html>
