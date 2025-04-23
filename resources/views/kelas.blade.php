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
    <a href="{{ route('kembali') }}" class="back">Kembali</a>
    <h1>Kelas Yang Tersedia</h1>
    <p class="subtitle">Jelajahi berbagai pilihan kelas dan tingkatkan keterampilan anda</p>

    <div class="grid">
      <div class="card" data-class="php-dasar">
        <img src="{{ asset('asset/logo_php.png') }}" alt="PHP Dasar" />
        <div>
          <h2>Php Dasar</h2>
          <p>12 Pelajaran</p>
          <a href="#" class="view-detail">Lihat Detail</a>
        </div>
      </div>

      <div class="card" data-class="figma-dasar">
        <img src="{{ asset('asset/logo_figma.png') }}" alt="Figma Dasar" />
        <div>
          <h2>Figma Dasar</h2>
          <p>8 Pelajaran</p>
          <a href="#" class="view-detail">Lihat Detail</a>
        </div>
      </div>

      <div class="card" data-class="laravel-pemula">
        <img src="{{ asset('asset/logo_laravel.png') }}" alt="Laravel" />
        <div>
          <h2>Laravel Untuk Pemula</h2>
          <p>10 Pelajaran</p>
          <a href="#" class="view-detail">Lihat Detail</a>
        </div>
      </div>

      <div class="card" data-class="python-pemula">
        <img src="{{ asset('asset/logo_python.png') }}" alt="Python" />
        <div>
          <h2>Python Untuk Pemula</h2>
          <p>14 Pelajaran</p>
          <a href="#" class="view-detail">Lihat Detail</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    const userLoggedIn = @json(auth()->check());

    function checkLogin(classType) {
      if (userLoggedIn) {
        window.location.href = "/kelas/" + classType;
      } else {
        Swal.fire({
          title: 'Anda belum login!',
          text: 'Silakan login terlebih dahulu untuk mengakses detail kelas.',
          icon: 'warning',
          confirmButtonText: 'Login',
          showCancelButton: true,
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "{{ route('login') }}";
          }
        });
      }
    }

    document.querySelectorAll('.view-detail').forEach(detailDiv => {
      detailDiv.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default link behavior
        const classType = this.closest('.card').getAttribute('data-class');
        checkLogin(classType);
      });
    });
  </script>
</body>
</html>
