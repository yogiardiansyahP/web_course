<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="user">
                <i class="fas fa-user-circle" style="font-size: 50px;"></i>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
            <a href="#">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="#">
                <i class="fas fa-book"></i>
                Course
            </a>
            <a href="#">
                <i class="fas fa-users"></i>
                User
            </a>
            <a href="#">
                <i class="fas fa-cogs"></i>
                Setting
            </a>
            <a href="#">
                <i class="fas fa-credit-card"></i>
                Transaksi
            </a>
        </div>

        <div class="main-content">
            <div class="header">
                <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
            </div>

            <div class="stats">
                <div class="card">
                    <div class="card-item">
                        Total Course
                        <span>{{ $totalCourses }}</span>
                    </div>
                    <div class="card-item">
                        Total Siswa
                        <span>{{ $totalUsers }}</span>
                    </div>
                    <div class="card-item">
                        Total Pendaftaran
                        <span>{{ $totalTransactions }}</span>
                    </div>
                </div>
            </div>
<div class="chart">
    <h2>Daftar Peserta Kelas</h2>
    <canvas id="courseChart" width="300" height="300" style="display: block;box-sizing: border-box;height: 150px;width: 150px;"></canvas>
</div>

<script>
    const ctx = document.getElementById('courseChart').getContext('2d');
    const courseChart = new Chart(ctx, {
        type: 'pie', // Pie chart
        data: {
            labels: {!! json_encode($courses->pluck('name')) !!},
            datasets: [{
                data: {!! json_encode($courses->pluck('students_count')) !!},
                backgroundColor: ['#3498db', '#2ecc71', '#e74c3c', '#9b59b6', '#f1c40f'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: { enabled: true },
                labels: {
                    font: { size: 14 }
                }
            }
        }
    });
</script>

            <div class="activities">
                <h2>Aktivitas Terkini</h2>
                <ul>
                    @foreach ($activities as $activity)
                        <li>{{ $activity->user->name }} mendaftar pada <span>{{ $activity->created_at->diffForHumans() }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="courses">
                <h2>Daftar Kelas</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Mentor</th>
                            <th>Siswa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->mentor }}</td>
                                <td>{{ $course->students_count }}</td>
                                <td class="status">{{ $course->status }}</td>
                                <td>🔒 ➤</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
