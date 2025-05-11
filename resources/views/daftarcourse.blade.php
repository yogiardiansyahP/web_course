<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kursus Yang Kamu Ikuti</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<<<<<<< HEAD
  <style>
    * {
      box-sizing: border-box;
    }

    .learn-button {
    display: inline-block;
    background-color: #346D9CFF; /* Hijau */
    color: white;
    padding: 12px 24px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    border-radius: 6px;
    transition: background-color 0.3s ease;
}

.learn-button:hover {
    background-color: #05345AFF;
}


    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #F9FAFB;
      color: #111827;
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background-color: #fff;
      border-right: 1px solid #e5e7eb;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 30px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #374151;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.2s;
    }

    .sidebar a:hover {
      color: #3B82F6;
    }

    .sidebar .logout {
      margin-top: auto;
      color: #ef4444;
    }

    /* Main content */
    .main {
      flex: 1;
      padding: 40px 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
    }

    .header h1 {
      font-size: 28px;
      color: #1E3A8A;
      font-weight: 600;
    }

    .tabs {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 30px;
    }

    .tab {
      padding: 10px 20px;
      border-radius: 8px;
      background-color: #E5E7EB;
      cursor: pointer;
      font-weight: 500;
      color: #374151;
      transition: background 0.3s;
    }

    .tab:hover {
      background-color: #D1D5DB;
    }

    .tab.active {
      background-color: #3B82F6;
      color: white;
    }

    .course-list {
      display: grid;
      gap: 20px;
    }

    .course-item {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      display: flex;
      align-items: center;
      padding: 20px;
      gap: 20px;
      transition: transform 0.2s;
    }

    .course-item:hover {
      transform: translateY(-2px);
    }

    .course-item img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 10px;
    }

    .details {
      flex: 1;
    }

    .details h3 {
      margin: 0 0 8px;
      font-size: 18px;
      color: #111827;
    }

    .details p {
      margin: 0;
      font-size: 14px;
      color: #6B7280;
    }

    .course-item button {
      padding: 10px 16px;
      border: 2px solid #3B82F6;
      background-color: white;
      color: #3B82F6;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .course-item button:hover {
      background-color: #3B82F6;
      color: white;
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        flex-direction: row;
        justify-content: space-around;
        border-right: none;
        border-bottom: 1px solid #e5e7eb;
      }

      .main {
        padding: 20px;
      }

      .course-item {
        flex-direction: column;
        align-items: flex-start;
      }

      .course-item img {
        width: 100%;
        height: auto;
      }

      .course-item button {
        width: 100%;
        margin-top: 10px;
      }
    }
  </style>
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
      
      </div>
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
=======
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
>>>>>>> 2a2737ae0e6bbb245f12d90c4aa77658e0926a40
</body>
</html>
