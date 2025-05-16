<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tentang Kami | CodeIn Course</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      color: #333;
      background: #fff;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Header */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 5%;
      border-bottom: 1px solid #eee;
      background: #fff;
    }

    .logo img {
      height: 40px;
    }

    nav {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    nav a {
      font-weight: 500;
      color: #333;
      position: relative;
    }

    nav a:hover {
      color: #0066ff;
    }

    nav a.active {
      color: #0066ff;
    }

    .btn-daftar {
      padding: 0.5rem 1.2rem;
      background-color: #007bff;
      color: white;
      border-radius: 20px;
      font-weight: bold;
      transition: 0.3s;
    }

    .btn-masuk img {
      height: 38px;
    }

    /* Main Content */
    main {
      padding: 3rem 5%;
      text-align: center;
    }

    h1, h2 {
      color: #0066ff;
      margin-bottom: 1rem;
    }

    h1 {
      font-size: 2.5rem;
    }

    h2 {
      font-size: 2rem;
      margin-top: 3rem;
    }

    p {
      max-width: 700px;
      margin: 0.5rem auto 1.5rem;
      line-height: 1.7;
      font-size: 1rem;
      color: #555;
    }

    .skills-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
      justify-items: center;
    }

    .skills-grid img {
      width: 80px;
      height: auto;
    }

    /* Footer */
    footer {
      background: #1c1c1c;
      color: #ccc;
      padding: 3rem 5%;
      margin-top: 4rem;
    }

    .footer-top {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 2rem;
    }

    .footer-brand {
      max-width: 250px;
    }

    .footer-brand img {
      height: 40px;
      margin-bottom: 1rem;
    }

    .footer-brand p {
      font-size: 0.9rem;
      margin-bottom: 1.2rem;
      color: #bbb;
    }

    .footer-links {
      display: flex;
      gap: 3rem;
    }

    .footer-links div {
      min-width: 150px;
    }

    .footer-links h4 {
      font-size: 1rem;
      color: #fff;
      margin-bottom: 1rem;
    }

    .footer-links ul {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 0.8rem;
    }

    .footer-links a {
      color: #ccc;
      font-size: 0.9rem;
      transition: 0.3s;
    }

    .footer-links a:hover {
      color: #fff;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 2rem;
      font-size: 0.8rem;
      color: #777;
      border-top: 1px solid #333;
      padding-top: 1rem;
    }
  </style>
</head>

<body>

<header>
  <div class="logo">
    <img src="{{ asset('asset/logo.png') }}" alt="CodeIn Course Logo">
  </div>
  <nav>
    <a href="{{ route('home') }}">Beranda</a>
    <a href="{{ route('tentang') }}" class="active">Tentang Kami</a>
    <a href="{{ route('kontak') }}">Kontak</a>
    <a href="{{ route('register') }}" class="btn-daftar">Daftar</a>
    <a href="{{ route('login') }}" class="btn-masuk">
      <img src="{{ asset('asset/button_masuk.png') }}" alt="Masuk">
    </a>
  </nav>
</header>

<main>
  <section class="about">
    <h1>Tentang Kami</h1>
    <p>CodeIn Course adalah platform pembelajaran digital yang dirancang untuk memudahkan kamu belajar di bidang teknologi dan dunia digital.</p>
    <p>Kami menawarkan berbagai macam kursus pilihan untuk membantu mengembangkan kemampuan, meningkatkan keterampilan, dan siap bersaing di dunia profesional.</p>
    <p>Dengan materi yang up-to-date, instruktur berpengalaman, dan komunitas yang suportif, kami berkomitmen jadi teman belajar terbaik kamu. Yuk, mulai perjalanan belajarmu bareng kami.</p>

    <div class="skills-grid">
      <img src="{{ asset('asset/vscode.png') }}" alt="VSCode">
      <img src="{{ asset('asset/teamwork.png') }}" alt="Teamwork">
      <img src="{{ asset('asset/php.png') }}" alt="PHP">
      <img src="{{ asset('asset/team2.png') }}" alt="Team">
      <img src="{{ asset('asset/python.png') }}" alt="Python">
      <img src="{{ asset('asset/css3.png') }}" alt="CSS3">
      <img src="{{ asset('asset/cpp.png') }}" alt="C++">
      <img src="{{ asset('asset/html5.png') }}" alt="HTML5">
    </div>
  </section>

  <section class="founder">
    <h2>Meet Our Founder</h2>
    <p>Bertemu dengan para founder CodeIn Course yang berpengalaman di bidang teknologi dan punya passion mengajar, memastikan CodeIn Course memberikan pelayanan terbaik.</p>
  </section>
</main>

<footer>
  <div class="footer-top">
    <div class="footer-brand">
      <img src="{{ asset('asset/logo_white.png') }}" alt="CodeIn Course">
      <p>CodeIn Course adalah platform pembelajaran untuk membantu kamu menjadi digital talent terbaik.</p>
      <p>Bogor, Indonesia<br><br>+62 864-9001-2828</p>
    </div>

    <div class="footer-links">
      <div>
        <h4>Program</h4>
        <ul>
          <li><a href="#">Online Course</a></li>
          <li><a href="#">Bootcamp</a></li>
          <li><a href="#">Corporate Training</a></li>
        </ul>
      </div>
      <div>
        <h4>Company</h4>
        <ul>
          <li><a href="{{route('tentang')}}">Tentang Kami</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Komunitas</a></li>
        </ul>
      </div>
      <div>
        <h4>Support</h4>
        <ul>
          <li><a href="{{route('kontak')}}">Hubungi Kami</a></li>
          <li><a href="#">Syarat dan Ketentuan</a></li>
          <li><a href="#">Kebijakan Privasi</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 CodeIn Course. All Rights Reserved.</p>
  </div>
</footer>

</body>
</html>
