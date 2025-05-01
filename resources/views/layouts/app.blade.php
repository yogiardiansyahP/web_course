<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/course-management.css') }}">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user">
                <i class="fas fa-user-circle" style="font-size: 50px;"></i>
                <h2>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</h2>
            </div>
            <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="{{ route('datacourse') }}"><i class="fas fa-book"></i> Course</a>
            <a href="{{ route('datauser') }}"><i class="fas fa-users"></i> User</a>
            <a href="{{ route('pengaturan') }}"><i class="fas fa-cogs"></i> Setting</a>
            <a href="{{ route('datatransaksi') }}"><i class="fas fa-credit-card"></i> Transaksi</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Selamat Datang{{ Auth::check() ? ', ' . Auth::user()->name : '' }}</h1>
            </div>
            @yield('content')
        </div>
    </div>
</body>
</html>