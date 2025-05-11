<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Kursus - {{ $course->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
</head>
<body>
    <aside class="sidebar">
        <a href="{{ route('dashboard') }}" style="color: #3B82F6; margin-bottom: 20px;">←</a>
        <a href="{{ route('daftarcourse') }}"><img src="{{ asset('asset/kursus.png') }}" alt="Kursus" width="20" /> Kursus Saya</a>
        <a href="{{route('kelas')}}"><img src="{{ asset('asset/tersedia.png') }}" alt="Kursus" width="20" /> Kelas Yang Tersedia</a>
        <a href="#" class="logout"><img src="{{ asset('asset/logout.png') }}" alt="Kursus" width="20" /> Keluar</a>
    </aside>

    <main class="main">
        <div class="header">
            <h1>Materi untuk Kursus: {{ $course->name }}</h1>
        </div>
        <div class="course-list">
            @foreach ($materials as $material)
                <div class="course-item">
                    <div class="details">
                        <h3>{{ $material->title }}</h3>
                        
                        @if (Str::contains($material->video_url, 'youtube.com'))
                            <!-- For YouTube videos -->
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ parse_url($material->video_url, PHP_URL_QUERY) }}" frameborder="0" allowfullscreen></iframe>
                        @elseif (Str::contains($material->video_url, 'vimeo.com'))
                            <!-- For Vimeo videos -->
                            <iframe src="https://player.vimeo.com/video/{{ last(explode('/', $material->video_url)) }}" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        @else
                            <!-- For other video URLs, you can fallback to a regular link -->
                            <p><a href="{{ $material->video_url }}" target="_blank">Lihat Video</a></p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
