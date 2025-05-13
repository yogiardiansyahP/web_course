<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Codein Course</title>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

  <header>
    <nav class="navbar">
      <div class="logo">
        <img src="{{ asset('asset/logo.png') }}" alt="Codein Course" />
      </div>
      <ul class="nav-links">
        <li><a href="{{ route('home') }}" class="active">Beranda</a></li>
        <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
        <li><a href="{{ route('kontak') }}">Kontak</a></li>
      </ul>
      <div class="auth-buttons">
        @if(Auth::check())
          <a href="{{ route('logout') }}" class="btn-filled" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        @else
          <a href="{{ route('register') }}" class="btn-outline">Daftar</a>
<a href="{{ route('login') }}" class="btn-filled">Masuk</a>

        @endif
      </div>
    </nav>
  </header>

  <main class="hero-section">
    <div class="hero-text">
      <h1>
        Raih <span class="highlight-green">Masa</span>
        <span class="highlight-yellow">Depan</span>
        <span class="highlight-lightgreen">Cerah</span>
      </h1>
      <h2>Lewat Pembelajaran <br> Yang Terarah</h2>
      <p>Pembelajaran online yang interaktif, praktis, dan dibimbing oleh mentor ahli</p>
      <div class="rating">
        <img src="https://i.pinimg.com/736x/c8/af/16/c8af163a520cd24175ba9f68205e8a52.jpg" alt="users" />
        <img src="https://i.pinimg.com/736x/fd/51/88/fd5188098f19524c7b772c34fd19caa7.jpg" alt="stars" />
        <span>500+ orang telah ikut serta</span>
      </div>
      <a href="{{ route('kelas') }}" class="btn-main">Belajar Sekarang</a>
    </div>
    <div class="hero-image">
      <img src="{{ asset('asset/home.png') }}" alt="Hero Image" />
    </div>
  </main>

</body>
</html>
