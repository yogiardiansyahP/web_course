<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodeIn Course Support</title>
  <style>
    :root {
      --primary-color: #075e54;
      --secondary-color: #007bff;
      --text-color: #333;
      --light-gray: #f8f9fa;
      --dark-gray: #6c757d;
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Arial', sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background: #fff;
      color: var(--text-color);
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background: var(--light-gray);
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    header img {
      height: 28px;
    }
    header nav {
      display: flex;
      gap: 1rem;
      align-items: center;
    }
    header nav a {
      text-decoration: none;
      color: var(--text-color);
      font-weight: 600;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      transition: background 0.3s, color 0.3s;
    }
    .btn-primary {
      background-color: var(--secondary-color);
      color: #fff;
      padding: 0.6rem 1.2rem;
      border: none;
      border-radius: 10px;
      font-weight: bold;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      text-align: center;
    }
    .logo img {
      width: 100px;
      margin-bottom: 1rem;
    }
    h2 {
      margin: 1rem 0;
      font-size: 2rem;
      color: var(--primary-color);
    }
    .btn-chat {
      background-color: var(--primary-color);
      color: #fff;
      padding: 0.8rem 2rem;
      border: none;
      border-radius: 25px;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      margin: 1.5rem 0;
      transition: background 0.3s;
    }
    .btn-chat:hover {
      background-color: #0b8064;
    }
    .support-text {
      font-size: 1rem;
      color: var(--dark-gray);
      margin-bottom: 0.5rem;
    }
    .download-link {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: bold;
      font-size: 1rem;
      margin-top: 1rem;
      display: inline-block;
    }
    .download-link:hover {
      text-decoration: underline;
    }
    footer {
      padding: 1rem;
      text-align: center;
      font-size: 0.9rem;
      background: var(--light-gray);
      color: var(--dark-gray);
    }
  </style>
</head>
<body>

<header>
  <!-- Logo WhatsApp diklik akan ke chat -->
  <a href="https://wa.me/6285779303395" target="_blank" rel="noopener noreferrer">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Logo">
  </a>
  
  <nav>
    <a href="#">Aplikasi</a>
    
    <a href="{{ route('login') }}">
      <img src="{{ asset('asset/button_masuk.png') }}" alt="Button Masuk" style="height:40px;">
    </a>
    
    <a href="#" class="btn-primary">Unduh</a>
  </nav>
</header>

<main>
  <div class="logo">
    <img src="{{ asset('asset/tentang kami.png') }}" alt="CodeIn Course Logo">
  </div>
  <h2>CodeIn Course Support</h2>

  <!-- Tombol "Lanjutkan ke Chat" -->
  <a href="https://wa.me/6285779303395" target="_blank" rel="noopener noreferrer">
    <button class="btn-chat">Lanjutkan ke Chat</button>
  </a>

  <p class="support-text">Belum menggunakan WhatsApp?</p>
  <a class="download-link" href="https://www.whatsapp.com/android?lang=id_ID" target="_blank" rel="noopener noreferrer">Unduh</a>

</main>

<footer>
  © 2025 CodeIn Course. All rights reserved.
</footer>

</body>
</html>
