<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Transaksi - Dashboard</title>
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
  <img src="{{ asset('asset/dashboard_logo.png') }}" alt="Logo WPU Course" class="logo">
  <a href="{{ route('dashboard') }}" class="menu-item">Dashboard</a>
  <a href="{{ route('kelas') }}" class="menu-item">Course</a>
  <a href="{{ route('sertifikat') }}" class="menu-item">Sertifikat</a>
  <a href="{{ route('transaksi') }}" class="menu-item active">Transaksi</a>
  <a href="{{ route('pengaturan') }}" class="menu-item">Pengaturan</a>
  <hr style="margin: 20px 0;">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <a href="{{ route('login') }}">Contact Support</a>
</aside>

<main class="main">
  <h1>Detail Transaksi</h1>

  <div class="transaction-detail-card">
    <div class="transaction-info">
      <h2>ID Transaksi: {{ $transaction->id }}</h2>
      <p><strong>Course:</strong> {{ $transaction->course_name }}</p>
      <p><strong>Status:</strong> {{ $transaction->status }}</p>
      <p><strong>Total Pembayaran:</strong> Rp {{ number_format($transaction->price, 0, ',', '.') }}</p>
      @if($transaction->discount)
        <p><strong>Diskon:</strong> Rp {{ number_format($transaction->discount, 0, ',', '.') }}</p>
      @endif
      <p><strong>Tanggal:</strong> {{ $transaction->transaction_date->format('d-m-Y H:i:s') }}</p>
    </div>

    <div class="transaction-actions">
      @if($transaction->status == 'pending')
        <button onclick="refreshTransaction()">Refresh Status</button>
      @endif
      <a href="{{ route('transaksi') }}" class="btn-back">Kembali</a>
    </div>
  </div>
</main>

<script>
  function refreshTransaction() {
    Swal.fire({
      title: 'Refresh Status?',
      text: 'Apakah Anda yakin ingin merefresh status transaksi?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, refresh',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.reload();
      }
    });
  }
</script>

</body>
</html>
