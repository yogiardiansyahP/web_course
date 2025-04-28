<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Codein Course</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #fff;
    padding: 20px;
}

.header {
    text-align: center;
    margin-bottom: 30px;
}

.logo {
    width: 50px;
}

.checkout-container {
    text-align: center;
}

.checkout-title {
    font-size: 36px;
    color: #2563eb;
    margin-bottom: 30px;
}

.checkout-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.account-card, .account-code-card, .course-card, .order-summary-card {
    background: #f9fafb;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.account-info {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
}

.avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.account-code-input {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.account-code-input input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.account-code-input button {
    background: #2563eb;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.course-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
}

.course-info {
    margin-top: 10px;
    text-align: left;
}

.course-info a {
    display: inline-block;
    margin-top: 5px;
    color: #2563eb;
    font-size: 14px;
    text-decoration: none;
}

.order-summary {
    margin-top: 10px;
}

.item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.total {
    font-weight: bold;
}

.payment-method-link {
    display: block;
    margin-top: 20px;
    font-size: 14px;
    color: #2563eb;
    text-decoration: underline;
}

    </style>
</head>
<body>
    <header class="header">
        <img src="logo-placeholder.png" alt="Logo" class="logo">
    </header>

    <main class="checkout-container">
        <h1 class="checkout-title">Checkout</h1>

        <div class="checkout-grid">
            <div class="account-card">
                <h2>Account</h2>
                <div class="account-info">
                    <img src="avatar-placeholder.png" alt="Avatar" class="avatar">
                    <div>
                        <p>@Miftah</p>
                        <p>miftahuddin57@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="account-code-card">
                <h2>Account</h2>
                <div class="account-code-input">
                    <input type="text" placeholder="CODEINCOURSEIDNBGR">
                    <button>Check</button>
                </div>
            </div>

            <div class="course-card">
                <img src="course-image-placeholder.png" alt="Course">
                <div class="course-info">
                    <p>Belajar Java Script Dari Nol</p>
                    <a href="#">Lihat Detail Kelas</a>
                </div>
            </div>

            <div class="order-summary-card">
                <h2>Order</h2>
                <div class="order-summary">
                    <div class="item">
                        <span>Belajar Java Script Dari Nol</span>
                        <span>Rp 2.500.000</span>
                    </div>
                    <div class="item">
                        <span>SubTotal</span>
                        <span>Rp 2.500.000</span>
                    </div>
                    <div class="item">
                        <span>Diskon</span>
                        <span>-Rp 2.105.000</span>
                    </div>
                    <div class="item total">
                        <span>Hasil Akhir</span>
                        <span>Rp 395.000</span>
                    </div>
                </div>
                <a href="#" class="payment-method-link">Lihat metode pembayaran yang tersedia</a>
            </div>
        </div>
    </main>
</body>
</html>
