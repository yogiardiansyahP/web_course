<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css']) {{-- Jika menggunakan Laravel Vite --}}
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user">
                <i class="fas fa-user-circle" style="font-size: 50px;"></i>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
            <a href="{{ route('admin') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="{{ route('datacourse') }}"><i class="fas fa-book"></i> Course</a>
            <a href="{{ route('datauser') }}"><i class="fas fa-users"></i> User</a>
            <a href="{{ route('pengaturan') }}"><i class="fas fa-cogs"></i> Setting</a>
            <a href="{{ route('datatransaksi') }}"><i class="fas fa-credit-card"></i> Transaksi</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>User</h1>
            <div class="certificate-table" style="background: #f9f9f9; padding: 20px; border-radius: 8px;">
                <form method="GET" action="{{ route('datauser') }}" style="margin-bottom: 10px;">
                    <label for="limit">Tampilkan:
                        <select name="limit" id="limit" onchange="this.form.submit()">
                            <option value="4" {{ request('limit') == 4 ? 'selected' : '' }}>4</option>
                            <option value="8" {{ request('limit') == 8 ? 'selected' : '' }}>8</option>
                            <option value="12" {{ request('limit') == 12 ? 'selected' : '' }}>12</option>
                        </select>
                        user
                    </label>
                </form>

                <table style="width: 100%; border-collapse: collapse;">
                    <thead style="background-color: #f3f4f6;">
                        <tr>
                            <th style="padding: 10px; text-align: left;">ID</th>
                            <th style="padding: 10px; text-align: left;">Username</th>
                            <th style="padding: 10px; text-align: left;">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td style="padding: 10px;">{{ $user->id }}</td>
                                <td style="padding: 10px;">{{ $user->name }}</td>
                                <td style="padding: 10px;">{{ $user->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align: center; padding: 20px; color: #6c757d;">Tidak ada user</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div style="margin-top: 20px;">
                    {{ $users->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
