<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sertifikat - Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/sertifikat.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

@if (!Auth::check())
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      Swal.fire({
        icon: 'warning',
        title: 'Akses Ditolak!',
        text: 'Silakan login terlebih dahulu.',
        confirmButtonText: 'OK'
      }).then(() => {
        window.location.href = "{{ route('login') }}";
      });
    });
  </script>
@endif

<aside class="sidebar">
  <img src="{{ asset('asset/dashboard_logo.png') }}" alt="Logo WPU Course" class="logo">
  <a href="{{ route('dashboard') }}" class="menu-item">Dashboard</a>
<<<<<<< HEAD
  <a href="{{ route('daftarcourse') }}" class="menu-item">Course</a>
  <a href="{{ route('sertifikat') }}" class="menu-item">Sertifikat</a>
  <a href="{{ route('transaksi') }}" class="menu-item active">Transaksi</a>
=======
  <a href="{{ route('kelas') }}" class="menu-item">Course</a>
  <a href="{{ route('sertifikat') }}" class="menu-item active">Sertifikat</a>
  <a href="{{ route('transaksi') }}" class="menu-item">Transaksi</a>
>>>>>>> 2a2737ae0e6bbb245f12d90c4aa77658e0926a40
  <a href="{{ route('pengaturan') }}" class="menu-item">Pengaturan</a>
  <hr style="margin: 20px 0;">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <a href="{{ route('login') }}">Contact Support</a>
</aside>

<main class="main">
  <h1>Sertifikat</h1>

  <div class="certificate-grid">
    <p><strong>Username: {{ Auth::user()->name }}</strong></p>

    @forelse ($certificates as $certificate)
      @if ($certificate->course)
        <div class="certificate-card">
          <div class="certificate-header">
            <h2>{{ $certificate->course->name }}</h2>
            <p>ID: {{ $certificate->id }}</p>
          </div>
          <div class="certificate-body">
            @if ($certificate->certificate_path)
              <a href="{{ asset($certificate->certificate_path) }}" target="_blank" class="btn-view">Lihat Sertifikat</a>
            @else
              <span class="no-data">Sertifikat belum tersedia</span>
            @endif
          </div>
        </div>
      @else
        <div class="no-data">Course tidak tersedia</div>
      @endif
    @empty
      <div class="no-data">Tidak ada sertifikat</div>
    @endforelse
  </div>

  <div class="limit-control">
    <label for="limit">Limit:</label>
    <select id="limit" name="limit">
      <option value="4">4</option>
      <option value="8">8</option>
      <option value="12">12</option>
    </select>
  </div>
</main>

</body>
</html>
