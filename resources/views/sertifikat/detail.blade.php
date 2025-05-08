<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Sertifikat</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/sertifikat.css') }}">
</head>
<body>

<aside class="sidebar">
  <img src="{{ asset('asset/dashboard_logo.png') }}" alt="Logo WPU Course" class="logo">
  <a href="{{ route('dashboard') }}" class="menu-item">Dashboard</a>
  <a href="{{ route('kelas') }}" class="menu-item">Course</a>
  <a href="{{ route('sertifikat') }}" class="menu-item">Sertifikat</a>
  <a href="{{ route('transaksi') }}" class="menu-item">Transaksi</a>
  <a href="{{ route('pengaturan') }}" class="menu-item">Pengaturan</a>
  <hr style="margin: 20px 0;">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <a href="{{ route('login') }}">Contact Support</a>
</aside>

<main class="main">
  <h1>Detail Sertifikat</h1>

  <div class="certificate-detail-card">
    <p><strong>Username: {{ $certificate->user->name }}</strong></p>
    <p><strong>Nama Course:</strong> {{ $certificate->course->title }}</p>
    <p><strong>ID Sertifikat:</strong> {{ $certificate->id }}</p>
    <p><strong>Tanggal Pembuatan:</strong> {{ $certificate->generated_at }}</p>

    <a href="{{ route('sertifikat.download', $certificate->id) }}" class="btn-download">Download Sertifikat</a>
  </div>
</main>
</body>
</html>
