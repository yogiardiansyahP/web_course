<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kursus Yang Kamu Ikuti</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/course.css') }}">
  <style> .course-card {
      background-color: white;
      border-radius: 12px;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 16px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .course-info {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .course-info img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 8px;
      background-color: #f3f4f6;
    }

    .course-info h3 {
      font-size: 16px;
      font-weight: 700;
      color: #111827;
    }

    .course-info p {
      font-size: 14px;
      color: #6b7280;
    }

    .course-action {
      color: #3b82f6;
      font-weight: 600;
      font-size: 14px;
    }</style>
  

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const tabs = document.querySelectorAll('.tab');
      const ongoingCoursesList = document.querySelector('#ongoing-courses');
      const completedCoursesList = document.querySelector('#completed-courses');

      tabs.forEach(tab => {
        tab.addEventListener('click', function() {
          tabs.forEach(t => t.classList.remove('active'));
          this.classList.add('active');

          if (this.innerText === 'Kursus yang sudah selesai') {
            // Show completed courses and hide ongoing courses
            completedCoursesList.style.display = 'block';
            ongoingCoursesList.style.display = 'none';
          } else {
            // Show ongoing courses and hide completed courses
            completedCoursesList.style.display = 'none';
            ongoingCoursesList.style.display = 'block';
          }
        });
      });
    });
  </script>
</head>
<body>
  <aside class="sidebar">
    <a href="{{ route('dashboard') }}" style="color: #3B82F6; margin-bottom: 20px;">←</a>
    <a href="{{ route('daftarcourse') }}">
      <img src="{{ asset('asset/kursus.png') }}" alt="Kursus" width="20" />
      Kursus Saya
    </a>
    <a href="{{ route('kelas') }}">
      <img src="{{ asset('asset/tersedia.png') }}" alt="Kursus" width="20" />
      Kelas Yang Tersedia
    </a>
    <a href="{{route('logout')}}" class="logout">
      <img src="{{ asset('asset/logout.png') }}" alt="Kursus" width="20" />
      Keluar
    </a>
  </aside>

      <main class="main">
              <div class="header">
                <h1>Kursus Yang Kamu Ikuti</h1>
              </div>
              <div class="tabs">
                <a href="{{ route('daftarcourse') }}" style="
              display: inline-block;
              background-color: #dcdcdc;
              color: #3B82F6;
              font-size: 14px;
              font-weight: 600;
              border-radius: 10px;
              padding: 8px 12px;
              text-decoration: none;
              border: none;
              outline: none;
          ">
            Kursus yang sedang dipelajari
          </a>

      
        
      <div class="tab active" onclick="window.location.href='{{ route('kursus_selesai') }}'">
      Kursus yang sudah selesai
      </div>

      

    </div>

    

    <div class="course-card">
      <div class="course-info">
        <img src="asset/laravel.png" alt="Course Image">
        <div>
          <p><strong>Username: {{ Auth::user()->name }}</strong></p>
          <div class="certificate-grid">
    @forelse ($certificates as $certificate)
      @if ($certificate->course)
        <div class="certificate-card">
          <div class="certificate-header">
            <h2>{{ $certificate->course->name }}</h2>
            <p>ID Course: {{ $certificate->id }}</p>
            <p>Selesai Pada: {{ \Carbon\Carbon::parse($certificate->issued_at)->translatedFormat('d F Y') }}</p>
          </div>
          <div class="certificate-body">
            @if ($certificate->certificate_path)
              <a href="{{ asset($certificate->certificate_path) }}" target="_blank" class="btn-view">Lihat Course</a>
            @else
              <span class="no-data">Belum ada course yang selesai</span>
            @endif
          </div>
        </div>
      @else
        <div class="no-data">Course tidak tersedia</div>
      @endif
    @empty
      <div class="no-data">Belum Ada yang selesai</div>
    @endforelse
  </div>
        </div>
      </div>
      
    </div>


  </main>
</body>
</html>
