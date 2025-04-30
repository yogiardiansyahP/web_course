<head>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<div class="dashboard">
    <aside class="sidebar">
      <div class="profile">Admin</div>
      <nav>
        <ul>
          <li>Dashboard</li>
          <li>Course</li>
          <li>User</li>
          <li>Setting</li>
          <li>Transaksi</li>
        </ul>
      </nav>
    </aside>
  
    <main class="content">
      <h1>Selamat Datang, Admin</h1>
      <div class="stats">
        <div class="card">Total Course<br><strong>34</strong></div>
        <div class="card">Total Siswa<br><strong>100</strong></div>
        <div class="card">Total Pendaftaran<br><strong>127</strong></div>
      </div>
      <div class="main-section">
        <div class="chart">[Chart Placeholder]</div>
        <div class="activities">
          <h3>Aktivitas Terkini</h3>
          <ul>
            <li>Ismail mendaftar dalam pengembangan web (Today)</li>
            <!-- Tambahkan lainnya -->
          </ul>
        </div>
      </div>
      <table class="class-table">
        <thead>
          <tr><th>Course</th><th>Mentor</th><th>Siswa</th><th>Status</th></tr>
        </thead>
        <tbody>
          <tr><td>Web Development</td><td>Ali</td><td>350</td><td>Published</td></tr>
          <!-- Tambahkan lainnya -->
        </tbody>
      </table>
    </main>
  </div>
  