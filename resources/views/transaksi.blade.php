<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Transaksi - Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/transaksi.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

@if (!Auth::check())
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      Swal.fire({
        icon: 'warning',
        title: 'Akses Ditolak!',
        text: 'Silakan login terlebih dahulu.',
        confirmButtonText: 'OK'
      }).then(() => {
        window.location.href = "{{ route('login') }}";
      });
    });
  </script>
@endif

<aside class="sidebar">
  <img src="{{ asset('asset/dashboard_logo.png') }}" alt="Logo" class="logo">
  <a href="{{ route('dashboard') }}" class="menu-item">Dashboard</a>
  <a href="{{ route('kelas') }}" class="menu-item">Course</a>
  <a href="{{ route('sertifikat') }}" class="menu-item">Sertifikat</a>
  <a href="{{ route('transaksi') }}" class="menu-item active">Transaksi</a>
  <a href="{{ route('pengaturan') }}" class="menu-item">Pengaturan</a>
  <hr style="margin: 20px 0;">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <a href="{{ route('login') }}">Contact Support</a>
</aside>

<main class="main">
  <h1>Transaksi</h1>

  <div class="transaction-card">
    <p><strong>Username:</strong> {{ Auth::user()->username }}</p>

    <table>
      <thead>
        <tr>
          <th>ID Transaksi</th>
          <th>Total Pembayaran</th>
          <th>Tanggal Transaksi</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($transactions as $transaction)
          <tr>
            <td>{{ $transaction->order_id }}</td>
            <td>Rp {{ number_format($transaction->harga_diskon, 0, ',', '.') }}</td>
            <td>{{ $transaction->created_at->format('d-m-Y H:i:s') }}</td>
            <td>{{ Auth::user()->email }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="no-data">Tidak ada transaksi</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="limit-control">
      <label for="limit">Limit:</label>
      <select id="limit" name="limit">
        <option value="4">4</option>
        <option value="8">8</option>
        <option value="12">12</option>
      </select>
    </div>
  </div>
</main>

</body>
</html>
