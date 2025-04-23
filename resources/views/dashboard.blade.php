<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - Codein Course</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }
    body {
      display: flex;
      background-color: #f9f9fb;
    }
    .sidebar {
      width: 240px;
      background-color: #fff;
      padding: 20px;
      border-right: 1px solid #e0e0e0;
      height: 100vh;
      position: fixed;
    }
    .sidebar img.logo {
      width: 150px;
      margin-bottom: 30px;
    }
    .sidebar a {
      display: flex;
      align-items: center;
      padding: 12px;
      color: #333;
      text-decoration: none;
      margin-bottom: 10px;
      border-radius: 10px;
    }
    .sidebar a:hover,
    .sidebar a.active {
      background-color: #e0edff;
      color: #2563eb;
      font-weight: bold;
    }
    .sidebar a svg {
      margin-right: 10px;
    }
    .main {
      margin-left: 260px;
      padding: 30px;
      width: 100%;
    }
    .main h1 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 20px;
    }
    .announcement {
      background-color: #e0edff;
      padding: 16px;
      border-radius: 12px;
      margin-bottom: 24px;
    }
    .stats {
      display: flex;
      gap: 16px;
      margin-bottom: 24px;
    }
    .stat-box {
      background: white;
      border-radius: 12px;
      padding: 20px;
      flex: 1;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .progress-section {
      background: white;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 24px;
    }
    .cards {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }
    .course-card {
      background: white;
      width: 260px;
      border-radius: 12px;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
      overflow: hidden;
    }
    .course-card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }
    .course-card .content {
      padding: 16px;
    }
    .course-card .price {
      text-decoration: line-through;
      color: red;
      font-size: 14px;
    }
    .course-card .discount {
      font-weight: 700;
      color: #111;
      font-size: 16px;
    }
  </style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

  <aside class="sidebar">
    <img src="{{ asset('asset/dashboard_logo.png') }}" alt="Codein Course" class="logo">
    <a href="#" class="active">Dashboard</a>
    <a href="#">Bootcamp</a>
    <a href="#">Course</a>
    <a href="#">Sertifikat</a>
    <a href="#">Transaksi</a>
    <a href="#">Pengaturan</a>
    <hr style="margin: 20px 0;">
    <a href="#">Logout</a>
    <a href="#">Contact Support</a>
  </aside>

  <main class="main">
    <h1>Dashboard</h1>

    <div class="announcement">
      <strong>📢 PENGUMUMAN</strong><br/>
      Untuk peserta CodeIn silahkan klik Course yang ada di bagian lanjutan belajar...
    </div>

    <div class="stats">
      <div class="stat-box">
        <strong>Miftah</strong><br/>
        Miftah
      </div>
      <div class="stat-box">
        <strong>Total Kelas</strong><br/>0
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

      <!-- Tempat grafik -->
    </div>

    <h3 style="margin-bottom: 30px">Gabung Kelas Unggulan CodeIn Course</h3>
    <div class="cards">
      <div class="course-card">
        <img src="{{ asset('asset/dashboard_course.png') }}" alt="Course 1">
        <div class="content">
          <p>Belajar JavaScript Dari Nol</p>
          <p class="price">Rp. 2.500.000</p>
          <p class="discount">Rp. 250.000</p>
        </div>
      </div>
      <div class="course-card">
        <img src="{{ asset('asset/dashboard_course.png') }}" alt="Course 2">
        <div class="content">
          <p>Belajar JavaScript Dari Nol</p>
          <p class="price">Rp. 2.500.000</p>
          <p class="discount">Rp. 250.000</p>
        </div>
      </div>
    </div>

  </main>
  <script>
    const ctx = document.getElementById('progressChart').getContext('2d');
    const progressChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov'],
        datasets: [{
          label: 'Progress Belajar',
          data: [5, 45, 70, 45, 58, 68, 80, 90, 25, 0, 65],
          borderColor: '#2563eb',
          backgroundColor: 'rgba(37, 99, 235, 0.2)',
          tension: 0.3,
          pointRadius: 5,
          pointHoverRadius: 7,
          fill: false
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            max: 110
          }
        }
      }
    });
  </script>
  
</body>
</html>
