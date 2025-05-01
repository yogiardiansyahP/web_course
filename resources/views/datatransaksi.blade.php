<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user">
                <i class="fas fa-user-circle" style="font-size: 50px;"></i>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
            <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="{{ url('/datacourse') }}">
                <i class="fas fa-users"></i>
                Course
            </a>
            <a href="{{ url('/datauser') }}">
                <i class="fas fa-users"></i>
                User
            </a>
            <a href="#"><i class="fas fa-cogs"></i> Setting</a>
            <a href="{{ url('/datatransaksi') }}">
                <i class="fas fa-users"></i>
                Transaksi
            </a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Transaksi</h1>
            <div class="certificate-table" style="background: #f9f9f9; padding: 20px; border-radius: 8px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead style="background-color: #f3f4f6;">
                        <tr>
                            <th style="padding: 10px; text-align: left;">User</th>
                            <th style="padding: 10px; text-align: left;">Email</th>
                            <th style="padding: 10px; text-align: left;">Nama Course</th>
                            <th style="padding: 10px; text-align: left;">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" style="text-align: center; padding: 20px; color: #6c757d;">Tidak ada transaksi</td>
                        </tr>
                    </tbody>
                </table>
                <label for="limit">Limit:
                    <select id="limit" name="limit">
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="12">12</option>
                    </select>
                </label>
            </div>
        </div>
    </div>
</body>
</html>
