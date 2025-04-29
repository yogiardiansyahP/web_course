<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pengaturan Profil</title>
  <link rel="stylesheet" href="{{ asset('css/pengaturan.css') }}">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo">
        <img src="logo.png" alt="Logo WPU Course" />
      </div>
      <nav>
        <ul>
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Bootcamp</a></li>
          <li><a href="#">Course</a></li>
          <li><a href="#">Sertifikat</a></li>
          <li><a href="#">Transaksi</a></li>
          <li class="active"><a href="#">Pengaturan</a></li>
        </ul>
      </nav>
      <a class="logout" href="#">Logout</a>
      <a class="support" href="#"><img src="wa-icon.png" alt=""> Contact Support</a>
    </aside>

    <main class="main-content">
      <header>
        <h1>Pengaturan</h1>
        <img class="user-avatar" src="avatar.png" alt="User Avatar" />
      </header>

      <section class="tabs">
        <button class="tab active">Profile</button>
        <button class="tab">Keamanan</button>
      </section>

      <section class="profile-form">
        <h2>Profile</h2>
        <p>Kelola avatar dan data profile kamu</p>
        <div class="avatar-section">
          <img src="avatar.png" alt="Avatar" class="avatar" />
          <button class="edit-avatar">✏️</button>
        </div>
        <form>
          <label>Username</label>
          <input type="text" value="yogi1" readonly />

          <label>Email</label>
          <input type="email" value="ogijelek01@gmail.com" readonly />

          <label>Full Name</label>
          <input type="text" value="yogi ardiansyah pratama" />

          <button type="submit" class="save-btn">Simpan Perubahan</button>
        </form>
      </section>
    </main>
  </div>
</body>
</html>