<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan - Dashboard</title>
  <link rel="stylesheet" href="pengaturan.css">
  <style>
    /* Gunakan base style seperti sebelumnya, tambah berikut: */

/* Tabs */
.tabs {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

.tab {
  background: #f3f4f6;
  padding: 8px 16px;
  border-radius: 8px;
  font-weight: 500;
  cursor: pointer;
  border: none;
}

.tab.active {
  background: #ffffff;
  border: 2px solid #059669;
  color: #059669;
}

/* Settings Card */
.settings-card {
  background: #ffffff;
  padding: 24px;
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}

/* Avatar */
.avatar-section {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 20px 0;
}

.profile-avatar {
  width: 80px;
  height: 80px;
  border-radius: 9999px;
}

.edit-avatar {
  background: #059669;
  color: white;
  border: none;
  border-radius: 50%;
  width: 32px;
  height: 32px;
  font-size: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

/* Form */
.profile-form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 6px;
  font-size: 14px;
  color: #6b7280;
}

.form-group input {
  width: 100%;
  padding: 12px;
  border: 1px solid #d1d5db;
  border-radius: 8px;
  background: #f9fafb;
}

/* Save Button */
.save-button {
  background: #059669;
  color: white;
  padding: 12px;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  cursor: pointer;
  width: fit-content;
}

  </style>
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
            <input type="text" value="yogi ardiansyah prat
