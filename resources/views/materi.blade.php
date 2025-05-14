<!DOCTYPE html>
<html lang="id">
@php use Illuminate\Support\Str; @endphp
@php
    $currentMaterial = $materials->firstWhere('slug', $currentSlug) ?? null;
    $slugs = $materis->pluck('slug')->values();
    $currentIndex = $slugs->search($currentSlug);
    $prevSlug = $currentIndex > 0 ? $slugs[$currentIndex - 1] : null;
    $nextSlug = $currentIndex < $slugs->count() - 1 ? $slugs[$currentIndex + 1] : null;
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Kursus - {{ $course->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/course2.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <aside class="sidebar">
        <h2><div class="menu-item" onclick="window.location.href='{{ route('dashboard') }}'">&larr; Kembali</div></h2>
        @foreach ($materis as $materi)
            <div class="menu-item" onclick="window.location.href='{{ route('materi.show', $materi->slug) }}'">{{ $materi->nama_materi }}</div>
        @endforeach
    </aside>

    <main class="main">
        <div class="header">
            <h1>Materi untuk Kursus: {{ $course->name }}</h1>
        </div>

        @if ($transaction && in_array($transaction->status, ['settlement', 'capture', 'pending']))
            <div class="course-list">
                @php
                    // Filter the materials based on the current slug
                    $currentMaterial = $materials->firstWhere('slug', $currentSlug); // Assuming you have $currentSlug passed to the view
                @endphp

                @if ($currentMaterial)
                    <div class="course-item">
                        <div class="details">
                            <h3>{{ $currentMaterial->title }}</h3>

                            @if (Str::contains($currentMaterial->video_url, 'youtube.com') || Str::contains($currentMaterial->video_url, 'youtu.be'))
                                @php
                                    parse_str(parse_url($currentMaterial->video_url, PHP_URL_QUERY), $youtubeParams);
                                    $youtubeId = $youtubeParams['v'] ?? Str::afterLast($currentMaterial->video_url, '/');
                                @endphp
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1&start=0" frameborder="0" allowfullscreen></iframe>
                            @elseif (Str::contains($currentMaterial->video_url, 'vimeo.com'))
                                @php
                                    $vimeoId = Str::afterLast($currentMaterial->video_url, '/');
                                @endphp
                                <iframe src="https://player.vimeo.com/video/{{ $vimeoId }}?autoplay=1" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            @else
                                <p><a href="{{ $currentMaterial->video_url }}" target="_blank" rel="noopener noreferrer">Lihat Video</a></p>
                            @endif
                        </div>
                    </div>
                @else
                    <p>Materi tidak ditemukan.</p>
                @endif
            </div>
        @else
            <div class="not-enrolled">
                <p>Kamu belum menyelesaikan pembayaran atau belum mendaftar pada kursus ini.</p>
                <a href="{{ route('kelas') }}" class="btn-back">Kembali ke Daftar Kelas</a>
            </div>
        @endif

        <div class="report">
            Ada issue dengan konten ini? <a href="{{ route('kontak') }}">Laporkan!</a>
        </div>

    @php
        $slugs = $materis->pluck('slug')->values();
        $currentIndex = $slugs->search($currentSlug);
        $prevSlug = $currentIndex > 0 ? $slugs[$currentIndex - 1] : null;
        $nextSlug = $currentIndex < $slugs->count() - 1 ? $slugs[$currentIndex + 1] : null;
    @endphp

        @if ($currentMaterial)
            <div class="course-item">...</div>
        @endif
        @if ($transaction && in_array($transaction->status, ['settlement', 'capture', 'pending']))
            <div class="navigation-buttons">
                @if ($prevSlug)
                    <a href="{{ route('materi.show', $prevSlug) }}"><button>&larr; Kembali</button></a>
                @else
                    <button disabled>&larr; Kembali</button>
                @endif

                @if ($nextSlug)
                    <a href="{{ route('materi.lanjut', $nextSlug) }}"><button>Selanjutnya &rarr;</button></a>
                @else
                    <form action="{{ route('certificate.complete', $course->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" onclick="return confirm('Kamu yakin ingin menyelesaikan kursus dan membuat sertifikat?')">Selesai</button>
                    </form>
                @endif
            </div>
        @endif
    @if (session('message'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('message') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    </main>
</body>
</html>
