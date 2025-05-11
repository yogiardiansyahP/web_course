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
    <a href="{{ route('dashboard') }}" style="color: #3B82F6;  margin-bottom: 20px;">
        ←
      </a>
    <a href="{{ route('daftarcourse') }}"><img src="{{ asset('asset/kursus.png') }}" alt="Kursus" width="20" />
 Kursus Saya</a>
    <a href="{{route('kelas')}}"><img src="{{ asset('asset/tersedia.png') }}" alt="Kursus" width="20" />
 Kelas Yang Tersedia</a>
    <a href="#" class="logout"><img src="{{ asset('asset/logout.png') }}" alt="Kursus" width="20" />
 Keluar</a>
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
      @foreach ($courses as $course)
  <div class="course-item">
    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Course Image">
    <div class="details">
      <h3>{{ $course->name }}</h3>
      <p>{{ $course->description }}</p>
    </div>
    <a href="{{ route('materi', $course->id) }}" class="learn-button">Lanjutkan Belajar</a>
  </div>
@endforeach
    </div>
  </main>
</body>
</html>