<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan - Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/pengaturan.css') }}">
</head>
<body>

  <div class="sidebar">
    <div class="logo">
      <img src="logo-placeholder.png" alt="Logo WPU Course">
    </div>
    <nav class="menu">
      <a href="#" class="menu-item">Dashboard</a>
      <a href="#" class="menu-item">Bootcamp</a>
      <a href="#" class="menu-item">Course</a>
      <a href="#" class="menu-item">Sertifikat</a>
      <a href="#" class="menu-item">Transaksi</a>
      <a href="#" class="menu-item active">Pengaturan</a>
      <a href="#" class="menu-item logout">Logout</a>
      <a href="#" class="contact-support">
        <img src="whatsapp-icon.png" alt="WhatsApp" class="whatsapp-icon">
        Contact Support
      </a>
    </nav>
  </div>

  <div class="main">
    <header class="header">
      <div class="header-actions">
        <button class="theme-toggle">🌞</button>
        <img src="avatar-placeholder.png" alt="User Avatar" class="avatar">
      </div>
    </header>

    <div class="content">
      <h1>Pengaturan</h1>

      <div class="tabs">
        <button class="tab active">Profile</button>
        <button class="tab">Keamanan</button>
      </div>

      <div class="settings-card">
        <h2>Profile</h2>
        <p>Kelola avatar dan data profile kamu</p>

        <div class="avatar-section">
          <img src="avatar-placeholder.png" alt="Avatar" class="profile-avatar">
          <button class="edit-avatar">✏️</button>
        </div>

        <form class="profile-form">
          <div class="form-group">
            <label>Username</label>
            <input type="text" value="yogi1" readonly>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" value="ogijelek01@gmail.com" readonly>
          </div>
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" value="yogi ardiansyah pratama">
          </div>
          <button class="save-button">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>