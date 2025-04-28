<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sertifikat - Dashboard</title>
  <link rel="stylesheet" href="sertifikat.css">

  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  display: flex;
  height: 100vh;
  background: #fff;
}

/* Sidebar */
.sidebar {
  width: 250px;
  background-color: #f9fafb;
  border-right: 1px solid #e5e7eb;
  display: flex;
  flex-direction: column;
  padding: 20px;
}

.logo img {
  width: 120px;
  margin-bottom: 30px;
}

.menu {
  flex-grow: 1;
}

.menu-item {
  display: block;
  padding: 12px 15px;
  color: #111827;
  text-decoration: none;
  margin-bottom: 10px;
  border-radius: 8px;
  transition: 0.2s;
}

.menu-item:hover,
.menu-item.active {
  background-color: #14b8a6;
  color: white;
}

.logout {
  margin-top: 20px;
}

.contact-support {
  display: flex;
  align-items: center;
  gap: 10px;
  background: #d1fae5;
  padding: 10px 15px;
  border-radius: 10px;
  text-decoration: none;
  color: #065f46;
  margin-top: 20px;
}

.whatsapp-icon {
  width: 20px;
}

/* Main Content */
.main {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.header {
  height: 60px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding: 0 20px;
  border-bottom: 1px solid #e5e7eb;
}

.header-actions {
  display: flex;
  align-items: center;
  gap: 15px;
}

.theme-toggle {
  background: none;
  border: none;
  font-size: 20px;
  cursor: pointer;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
}

.content {
  padding: 30px;
}

h1 {
  font-size: 28px;
  margin-bottom: 20px;
}

.certificate-card {
  background: #f9fafb;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

thead th {
  text-align: left;
  padding: 12px;
  background: #f3f4f6;
  color: #6b7280;
}

tbody td {
  text-align: center;
  padding: 20px;
  color: #9ca3af;
}

.no-data {
  font-size: 16px;
  color: #9ca3af;
}

.limit-control {
  display: flex;
  align-items: center;
  gap: 10px;
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
      <a href="#" class="menu-item active">Sertifikat</a>
      <a href="#" class="menu-item">Transaksi</a>
      <a href="#" class="menu-item">Pengaturan</a>
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
      <h1>Sertifikat</h1>

      <div class="certificate-card">
        <table>
          <thead>
            <tr>
              <th>ID Sertifikat</th>
              <th>Nama Course</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="3" class="no-data">Tidak ada sertifikat</td>
            </tr>
          </tbody>
        </table>

        <div class="limit-control">
          <label>Limit:</label>
          <select>
            <option value="4">4</option>
            <option value="8">8</option>
            <option value="12">12</option>
          </select>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
