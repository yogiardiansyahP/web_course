    <!DOCTYPE html>
    <html lang="id">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Code in Course</title>
    <style>
        body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #f9f9f9;
        display: flex;
        }

        /* Sidebar */
        .sidebar {
        width: 220px;
        background-color: #3366cc;
        color: white;
        height: 100vh;
        padding: 20px;
        box-sizing: border-box;
        }

        .sidebar h2 {
        margin-top: 0;
        font-size: 18px;
        }

        .menu-item {
        margin: 10px 0;
        font-size: 14px;
        cursor: pointer;
        }

        .menu-item:hover {
        text-decoration: underline;
        }

        /* Content Area */
        .main {
        flex: 1;
        padding: 20px 40px;
        }

        .top-button {
        text-align: right;
        margin-bottom: 20px;
        }

        .top-button button {
        background-color: #4a90e2;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        }

        h1 {
        color: #2a4ed4;
        font-size: 20px;
        }

        iframe {
        width: 100%;
        height: 400px;
        border: none;
        margin: 20px 0;
        }

        .download-link {
        margin-top: 10px;
        }

        .download-link a {
        color: #0077cc;
        text-decoration: none;
        }

        .report {
        font-size: 12px;
        margin-top: 10px;
        }

        .report span {
        color: red;
        cursor: pointer;
        }

        .navigation-buttons {
        margin-top: 30px;
        text-align: right;
        }

        .navigation-buttons button {
        background-color: #6c8df5;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        margin-left: 10px;
        cursor: pointer;
        }
    </style>
    </head>
    <body>
    <div class="sidebar">
        <h2>&larr; Kembali</h2>
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
    </div>

    <div class="main">
        <div class="top-button">
            <button>Belajar javascript dari nol</button>
        </div>

        <h1>Data Manipulation Language (DML) Part I - 1</h1>

        @php
        function getYoutubeId($url) {
            if (preg_match('/youtu\.be\/([^\?]+)/', $url, $matches)) {
                return $matches[1];
            } elseif (preg_match('/v=([^&]+)/', $url, $matches)) {
                return $matches[1];
            }
            return null;
        }
        @endphp

        <h2>Materi Video</h2>

        @foreach($course->materials as $material)
            <div style="margin-bottom: 30px;">
                <strong>{{ $material->title }}</strong>
                <br>
                @php $videoId = getYoutubeId($material->video_url); @endphp
                @if($videoId)
                    <iframe width="560" height="315" 
                        src="https://www.youtube.com/embed/{{ $videoId }}" 
                        frameborder="0" allowfullscreen>
                    </iframe>
                @else
                    <p>Link video tidak valid</p>
                @endif
            </div>
        @endforeach

        <div class="report">
            Ada issue dengan konten ini? <span>Laporkan!</span>
        </div>

        <div class="navigation-buttons">
            <button>&larr; Kembali</button>
            <button>Selanjutnya &rarr;</button>
        </div>
    </div>
</body>
</html>
