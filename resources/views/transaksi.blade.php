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
    <p><strong>Username: {{ Auth::user()->name }}</strong></p>

    <div class="filter-bar">
      <form method="GET" action="{{ route('transaksi') }}" class="filter-form">
        <input type="text" name="search" placeholder="Cari nama course..." value="{{ request('search') }}" class="search-input" />
        
        <select name="limit" class="limit-select" onchange="this.form.submit()">
          <option value="4" {{ request('limit') == 4 ? 'selected' : '' }}>4</option>
          <option value="8" {{ request('limit') == 8 ? 'selected' : '' }}>8</option>
          <option value="12" {{ request('limit') == 12 ? 'selected' : '' }}>12</option>
        </select>
      </form>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID Transaksi</th>
          <th>Nama Course</th>
          <th>Total Pembayaran</th>
          <th>Tanggal Transaksi</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($transactions as $transaction)
          <tr>
            <td>{{ $transaction->order_id }}</td>
            <td>{{ $transaction->course_name ?? '-' }}</td>
            <td>Rp {{ number_format($transaction->harga_diskon, 0, ',', '.') }}</td>
            <td>{{ $transaction->created_at->format('d-m-Y H:i:s') }}</td>
            <td>{{ Auth::user()->email }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="no-data">Tidak ada transaksi</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="pagination">
      {{ $transactions->appends(request()->query())->links() }}
    </div>

  </div>
</main>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('.search-input');
    
    searchInput.addEventListener('input', function() {
      const query = searchInput.value.toLowerCase();
      const rows = document.querySelectorAll('table tbody tr');

      rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const idTransaksi = cells[0].textContent.toLowerCase();
        const courseName = cells[1].textContent.toLowerCase();
        const totalPembayaran = cells[2].textContent.toLowerCase();
        const tanggalTransaksi = cells[3].textContent.toLowerCase();
        const email = cells[4].textContent.toLowerCase();

        if (
          idTransaksi.includes(query) ||
          courseName.includes(query) ||
          totalPembayaran.includes(query) ||
          tanggalTransaksi.includes(query) ||
          email.includes(query)
        ) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>


</body>
</html>
