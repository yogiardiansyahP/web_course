<!DOCTYPE html>
<html lang="id">
@php use Illuminate\Support\Str; @endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Kursus - {{ $course->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
</head>
<body>
    <aside class="sidebar">
        <h2><div class="menu-item" onclick="window.location.href='{{ route('dashboard') }}'">&larr; Kembali</div></h2>
        <div class="menu-item">Pengenalan</div>
        <div class="menu-item">Install mysql workbench</div>
        <div class="menu-item">Quiz</div>
        <div class="menu-item">Pengenalan</div>
        <div class="menu-item">Data Manipulation Language (DML) Part I - 1</div>
        <div class="menu-item">Data Manipulation Language (DML) Part I - 1</div>
        <div class="menu-item">Data Manipulation Language (DML) Part I - 2</div>
        <div class="menu-item">Quiz</div>
        <div class="menu-item">Data Manipulation Language (DML) Part I - 1</div>
        <div class="menu-item">Pembuatan Relasi Antara Tabel</div>
        <div class="menu-item">Data Manipulation Language (DML) Part I - 1</div>
        <div class="menu-item">Course selesai</div>
    </aside>

    <main class="main">
        <div class="header">
            <h1>Materi untuk Kursus: {{ $course->name }}</h1>
        </div>

        @if ($transaction && in_array($transaction->status, ['settlement', 'capture', 'pending']))
            <div class="course-list">
                @foreach ($materials as $material)
                    <div class="course-item">
                        <div class="details">
                            <h3>{{ $material->title }}</h3>

                            @if (Str::contains($material->video_url, 'youtube.com') || Str::contains($material->video_url, 'youtu.be'))
                                @php
                                    parse_str(parse_url($material->video_url, PHP_URL_QUERY), $youtubeParams);
                                    $youtubeId = $youtubeParams['v'] ?? Str::afterLast($material->video_url, '/');
                                @endphp
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0" allowfullscreen></iframe>
                            @elseif (Str::contains($material->video_url, 'vimeo.com'))
                                @php
                                    $vimeoId = Str::afterLast($material->video_url, '/');
                                @endphp
                                <iframe src="https://player.vimeo.com/video/{{ $vimeoId }}" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            @else
                                <p><a href="{{ $material->video_url }}" target="_blank" rel="noopener noreferrer">Lihat Video</a></p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="not-enrolled">
                <p>Kamu belum menyelesaikan pembayaran atau belum mendaftar pada kursus ini.</p>
                <a href="{{ route('kelas') }}" class="btn-back">Kembali ke Daftar Kelas</a>
            </div>
        @endif

        <div class="report">
            Ada issue dengan konten ini? <span>Laporkan!</span>
        </div>

        <div class="navigation-buttons">
            <button>&larr; Kembali</button>
            <button>Selanjutnya &rarr;</button>
        </div>
    </main>
</body>
</html>
