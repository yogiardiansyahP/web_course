<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaksi - Dashboard</title>
  <link rel="stylesheet" href="transaksi.css">
  <style>
    /* Ambil semua base style dari sertifikat.css, tambah ini: */

/* Alert Message */
.alert {
  background-color: #fbbf24;
  padding: 12px 20px;
  border-radius: 8px;
  color: #92400e;
  font-weight: 500;
  margin-bottom: 20px;
}

/* Transaction Card */
.transaction-card {
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
      <a href="#" class="menu-item">Sertifikat</a>
      <a href="#" class="menu-item active">Transaksi</a>
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
      <h1>Transaksi</h1>

      <div class="alert">
        Sudah bayar tapi status masih pending? Masuk ke detail transaksi kemudian klik button refresh
      </div>

      <div class="transaction-card">
        <table>
          <thead>
            <tr>
              <th>ID Transaksi</th>
              <th>Course</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="4" class="no-data">Transaction is empty</td>
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
