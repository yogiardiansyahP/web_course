<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kursus Yang Kamu Ikuti</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/course.css') }}">
</head>
<body>
<aside class="sidebar">
  <a href="{{ route('dashboard') }}" style="font-size: 18px; color: #3B82F6; text-decoration: none; margin-bottom: 20px;">
    ←
  </a>
  <a href="#"><img src="{{ asset('asset/kursus.png') }}" alt="Kursus Saya"> Kursus Saya</a>
  <a href="#"><img src="{{ asset('asset/tersedia.png') }}" alt="Kelas Yang Tersedia"> Kelas Yang Tersedia</a>
  <a href="#" class="logout"><img src="{{ asset('asset/logout.png') }}" alt="Keluar"> Keluar</a>
</aside>

<main class="main">
  <div class="header">
    <h1>Kursus Yang Kamu Ikuti</h1>
  </div>
  <div class="tabs">
    <div class="tab active">Kursus yang sedang di pelajari</div>
    <div class="tab">Kursus yang sudah selesai</div>
  </div>

  <div class="course-list">
    @forelse ($courses as $course)
      <div class="course-item">
        <img src="{{ asset('storage/' . $course->thumbnail) }}" width="100" alt="Course Image">
        <div class="details">
          <h3>{{ $course->name }}</h3>
          <p>{{ $course->description }}</p>
        </div>
        <button>Lanjutkan Belajar</button>
      </div>
    @empty
      <p style="margin: 20px;">Kamu belum mengikuti kursus apapun.</p>
    @endforelse
  </div>
</main>
</body>
</html>
