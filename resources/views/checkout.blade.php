<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Codein Course</title>
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body>
    <header class="header">
        <a href="{{ route('home') }}">
            <img src="{{ asset('asset/logo-placeholder.png') }}" alt="Logo" class="logo">
        </a>
    </header>

    <main class="checkout-container">
        <h1 class="checkout-title">Checkout</h1>

        @php
            $hargaAwal = 2500000;
        @endphp

        <div class="checkout-grid">
            <div class="account-card">
                <h2>Informasi Akun</h2>
                <div class="account-info">
                    <img src="{{ asset('asset/avatar-placeholder.png') }}" alt="Avatar" class="avatar">
                    <div>
                        <p class="account-name">{{ Auth::user()->name }}</p>
                        <p class="account-email">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <div class="account-code-card">
                <h2>Masukkan Kode Voucher</h2>
                <div class="account-code-input">
                    <input type="text" id="voucherInput" placeholder="Masukkan Kode Voucher">
                    <button onclick="cekVoucher()">Cek</button>
                </div>
            </div>

            <div class="course-card">
                <img src="{{ asset('asset/course-image-placeholder.png') }}" alt="Course">
                <div class="course-info">
                    <p class="course-title">Belajar JavaScript dari Nol</p>
                    <a href="{{ route('kelas') }}">Lihat Detail Kelas</a>
                </div>
            </div>

            <div class="order-summary-card">
                <h2>Ringkasan Pesanan</h2>
                <div class="order-summary">
                    <div class="item">
                        <span>Belajar JavaScript dari Nol</span>
                        <span id="hargaAwal">Rp {{ number_format($hargaAwal, 0, ',', '.') }}</span>
                    </div>
                    <div class="item">
                        <span>SubTotal</span>
                        <span id="subTotal">Rp {{ number_format($hargaAwal, 0, ',', '.') }}</span>
                    </div>
                    <div class="item">
                        <span>Diskon</span>
                        <span id="diskon">Rp 0</span>
                    </div>
                    <div class="item total">
                        <span>Total Bayar</span>
                        <span id="totalBayar">Rp {{ number_format($hargaAwal, 0, ',', '.') }}</span>
                    </div>
                </div>
                <button class="checkout-button" onclick="payNow()">Lanjut Bayar</button>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/checkout.js') }}"></script>
</body>
</html>
