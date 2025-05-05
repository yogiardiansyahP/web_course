<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            $hargaAwal = $course->price;
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
                <img src="{{ asset('storage/' . $course->thumbnail ?? 'asset/course-image-placeholder.png') }}" alt="Course">
                <div class="course-info">
                    <p class="course-title">{{ $course->name }}</p>
                    <a href="{{ route('kelas') }}">Lihat Detail Kelas</a>
                </div>
            </div>

            <div class="order-summary-card">
                <h2>Ringkasan Pesanan</h2>
                <div class="order-summary">
                    <div class="item">
                        <span>{{ $course->name }}</span>
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

    <script>
        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function cekVoucher() {
            const kode = document.getElementById('voucherInput').value.trim();
            const hargaAwal = {{ $course->price }};
            let hargaDiskon = hargaAwal;
            let potongan = 0;

            if (kode === 'CODEINCOURSEIDNBGR') {
                hargaDiskon = 395000;
                potongan = hargaAwal - hargaDiskon;
            }

            document.getElementById('diskon').innerText = '- ' + formatRupiah(potongan);
            document.getElementById('totalBayar').innerText = formatRupiah(hargaDiskon);
            document.getElementById('subTotal').innerText = formatRupiah(hargaDiskon);
        }

        function payNow() {
            const hargaDiskon = document.getElementById('totalBayar').innerText.replace('Rp ', '').replace('.', '');

            fetch('/get-snap-token', {
                method: 'POST',
                body: JSON.stringify({
                    voucher: document.getElementById('voucherInput').value.trim(),
                    hargaAwal: {{ $course->price }},
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            })
            .then(res => res.json())
            .then(data => {
                if (data.token) {
                    snap.pay(data.token, {
                        onSuccess: () => window.location.href = '/transaksi',
                        onPending: () => window.location.href = '/transaksi',
                        onError: () => alert('Pembayaran gagal'),
                        onClose: () => alert('Pembayaran dibatalkan'),
                    });
                } else {
                    alert('Gagal memproses pembayaran');
                }
            })
            .catch(() => alert('Gagal memproses pembayaran'));
        }
    </script>
</body>
</html>
