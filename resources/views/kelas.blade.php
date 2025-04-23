<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kelas Yang Tersedia</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background-color: #fff;
      color: #333;
    }

    .container {
      max-width: 700px;
      margin: 50px auto;
      padding: 0 20px;
    }

    .back {
      font-size: 14px;
      color: #333;
      text-decoration: none;
      display: flex;
      align-items: center;
      margin-bottom: 30px;
    }

    .back::before {
      content: '←';
      margin-right: 8px;
      font-size: 16px;
    }

    h1 {
      text-align: center;
      font-size: 36px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .subtitle {
      text-align: center;
      color: #777;
      font-size: 16px;
      margin-bottom: 40px;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 24px;
    }

    .card {
      background-color: #fff;
      border: 1px solid #e5e5e5;
      border-radius: 16px;
      padding: 24px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.08);
    }

    .card img {
      width: 80px;
      height: 80px;
      object-fit: contain;
      margin-bottom: 16px;
    }

    .card h2 {
      font-size: 18px;
      font-weight: 700;
      margin: 0 0 6px;
    }

    .card p {
      font-size: 14px;
      color: #666;
      margin-bottom: 16px;
    }

    .card a {
      display: inline-block;
      padding: 10px 20px;
      font-size: 14px;
      background-color: #2563eb;
      color: white;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 600;
      transition: background-color 0.2s ease;
    }

    .card a:hover {
      background-color: #1d4ed8;
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{ route('kembali') }}" class="back">Kembali</a>
    <h1>Kelas Yang Tersedia</h1>
    <p class="subtitle">Jelajahi berbagai pilihan kelas dan tingkatkan keterampilan anda</p>

    <div class="grid">
      <div class="card">
        <img src="{{ asset('asset/logo_php.png') }}" alt="PHP Dasar" />
        <div>
          <h2>Php Dasar</h2>
          <p>12 Pelajaran</p>
          <a href="#">Lihat Detail</a>
        </div>
      </div>

      <div class="card">
        <img src="{{ asset('asset/logo_figma.png') }}" alt="Figma Dasar" />
        <div>
          <h2>Figma Dasar</h2>
          <p>8 Pelajaran</p>
          <a href="#">Lihat Detail</a>
        </div>
      </div>

      <div class="card">
        <img src="{{ asset('asset/logo_laravel.png') }}" alt="Laravel" />
        <div>
          <h2>Laravel Untuk Pemula</h2>
          <p>10 Pelajaran</p>
          <a href="#">Lihat Detail</a>
        </div>
      </div>

      <div class="card">
        <img src="{{ asset('asset/logo_python.png') }}" alt="Python" />
        <div>
          <h2>Python Untuk Pemula</h2>
          <p>14 Pelajaran</p>
          <a href="#">Lihat Detail</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
