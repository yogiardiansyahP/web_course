<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kelas Yang Tersedia</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/classes.css') }}" />
  
  <!-- Add SweetAlert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="container">
    <a href="{{ route('dashboard') }}" class="back">Kembali</a>
    <h1>Kelas Yang Tersedia</h1>
    <p class="subtitle">Jelajahi berbagai pilihan kelas dan tingkatkan keterampilan anda</p>

    <div class="grid">
     @foreach ($courses as $course)
    <a href="{{ route('checkout', $course->id) }}" style="text-decoration: none; color: inherit;">
        <div class="card" data-class="php-dasar">
            <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->name }}" />
            <div>
                <h2>{{ $course->name }}</h2>
                <p>{{ $course->materials->count() }} Pelajaran</p>
                <td>Rp {{ number_format($course->price, 0, ',', '.') }}</td>
            </div>
        </div>
    </a>
@endforeach


    </div>
  </div>
</body>
</html>
