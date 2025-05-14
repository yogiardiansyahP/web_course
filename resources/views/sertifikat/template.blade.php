<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sertifikat Kursus</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto&display=swap');

    body {
      font-family: 'Roboto', sans-serif;
      text-align: center;
      background-color: #f0f4f8;
      padding: 0;
      margin: 0;
    }

    .certificate-container {
      background: #fff url("{{ public_path('asset/sertifikat-bg.png') }}") no-repeat center center;
      background-size: cover;
      width: 100%;
      height: 100vh;
      padding: 80px 60px;
      box-sizing: border-box;
      border: 8px solid #1f3a93;
      position: relative;
    }

    .certificate-title {
      font-family: 'Playfair Display', serif;
      font-size: 48px;
      color: #1f3a93;
      margin-bottom: 10px;
    }

    .certificate-subtitle {
      font-size: 20px;
      color: #444;
      margin-bottom: 40px;
    }

    .certificate-name {
      font-size: 32px;
      font-weight: bold;
      color: #111;
      margin-bottom: 20px;
    }

    .certificate-course {
      font-size: 24px;
      font-style: italic;
      color: #1a252f;
      margin-bottom: 40px;
    }

    .signature-section {
      display: flex;
      justify-content: space-between;
      margin-top: 60px;
      padding: 0 40px;
    }

    .signature-box {
      text-align: center;
    }

    .signature-line {
      border-top: 2px solid #333;
      width: 200px;
      margin: 0 auto 5px;
    }

    .footer {
      position: absolute;
      bottom: 40px;
      left: 0;
      width: 100%;
      text-align: center;
      font-size: 14px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="certificate-container">
    <div class="certificate-title">SERTIFIKAT</div>
    <div class="certificate-subtitle">Diberikan kepada</div>
    <div class="certificate-name">{{ $name }}</div>
    <div class="certificate-subtitle">Sebagai penghargaan telah menyelesaikan kursus</div>
    <div class="certificate-course">“{{ $course }}”</div>

    <div class="signature-section">
      <div class="signature-box">
        <div class="signature-line"></div>
        <div>Instruktur</div>
      </div>
      <div class="signature-box">
        <div class="signature-line"></div>
        <div>Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
      </div>
    </div>

    <div class="footer">
      Sertifikat ini diterbitkan secara resmi oleh WPU Course.
    </div>
  </div>
</body>
</html>
