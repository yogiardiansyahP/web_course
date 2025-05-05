<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - Codein Course</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
  <img src="{{ asset('asset/dashboard_logo.png') }}" alt="Codein Course" class="logo">
  <a href="#" class="active">Dashboard</a>
  <a href="{{ route('kelas') }}">Course</a>
  <a href="{{ route('sertifikat') }}">Sertifikat</a>
  <a href="{{ route('transaksi') }}">Transaksi</a>
  <a href="{{ route('pengaturan') }}">Pengaturan</a>
  <hr style="margin: 20px 0;">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <a href="{{ route('login') }}">Contact Support</a>
</aside>

<main class="main">
  <h1>Dashboard</h1>

  <div class="announcement">
    <strong>📢 PENGUMUMAN</strong><br/>
    Untuk peserta CodeIn silahkan klik Course yang ada di bagian lanjutan belajar...
  </div>

  <div class="stats">
    <div class="stat-box">
      <strong>{{ Auth::user()->name ?? 'Tamu' }}</strong><br/>
      {{ Auth::user()->email ?? 'Silakan login' }}
    </div>
    <div class="stat-box">
      <strong>Total Kelas</strong><br/>{{ $courses->count() }}
    </div>
    <div class="stat-box">
      <strong>Sedang Berjalan</strong><br/>0
    </div>
    <div class="stat-box">
      <strong>Sertifikat</strong><br/>0
    </div>
  </div>

  <div class="progress-section">
    <h3>Progress Belajar</h3>
    <canvas id="progressChart" width="400" height="200"></canvas>
  </div>

  <h3 style="margin-bottom: 30px">Rekomendasi Course</h3>
  <div class="cards">
    @foreach ($courses as $course)
      <a href="{{ route('checkout', ['courseId' => $course->id]) }}" style="text-decoration: none; color: inherit;">
        <div class="course-card">
          <img src="{{ $course->thumbnail ? asset('storage/' . $course->thumbnail) : asset('asset/dashboard_course.png') }}" alt="{{ $course->name }}">
          <div class="content">
            <p>{{ $course->name }}</p>
            <p class="price">Rp.250.000: {{ $course->mentor }}</p>
            <p class="discount">Rp.{{ \Illuminate\Support\Str::limit($course->price, 50) }}</p>
          </div>
        </div>
      </a>
    @endforeach
  </div>
</main>

<script>
  window.progressData = @json($progressDataFilled ?? []);
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
