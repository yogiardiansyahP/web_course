<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kursus Yang Kamu Ikuti</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/course.css') }}">
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

  </main>
</body>
</html>
