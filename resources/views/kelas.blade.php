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
      @foreach ($courses as $course)
          <div class="card" data-class="php-dasar">
              <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->name }}" />
              <div>
                  <h2>{{ $course->name }}</h2>
                  <p>{{ $course->materials->count() }} Pelajaran</p>
                  <a href="{{ route('kelas', $course->id) }}" class="view-detail">Lihat Detail</a>
              </div>
          </div>
      @endforeach
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
