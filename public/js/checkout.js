function formatRupiah(angka) {
    return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }
  
  function cekVoucher() {
    const kode = document.getElementById('voucherInput').value.trim();
    const hargaAwal = 2500000;
    const hargaDiskon = 395000;
    const potongan = hargaAwal - hargaDiskon;
  
    if (kode === 'CODEINCOURSEIDNBGR') {
      document.getElementById('diskon').innerText = '- ' + formatRupiah(potongan);
      document.getElementById('totalBayar').innerText = formatRupiah(hargaDiskon);
    } else {
      alert('Kode voucher salah');
      document.getElementById('diskon').innerText = 'Rp 0';
      document.getElementById('totalBayar').innerText = formatRupiah(hargaAwal);
    }
  }
  
  function payNow() {
    fetch('/get-snap-token')
      .then(res => res.json())
      .then(data => {
        if (data.token) {
          snap.pay(data.token, {
            onSuccess: ()=> window.location.href = '/dashboard',
            onPending: ()=> window.location.href = '/dashboard',
            onError:   ()=> alert('Pembayaran gagal'),
            onClose:   ()=> alert('Pembayaran dibatalkan'),
          });
        } else {
          alert('Gagal memproses pembayaran');
        }
      })
      .catch(()=> alert('Gagal memproses pembayaran'));
  }

  function cekVoucher() {
    let inputVoucher = document.getElementById('voucherInput').value.trim();
    let hargaAwal = 2500000;
    let hargaDiskon = 395000;
    let potongan = hargaAwal - hargaDiskon;

    if (inputVoucher === 'CODEINCOURSEIDNBGR') {
        document.getElementById('diskon').innerText = '- ' + formatRupiah(potongan);
        document.getElementById('totalBayar').innerText = formatRupiah(hargaDiskon);
    } else {
        alert('Kode voucher salah');
        document.getElementById('diskon').innerText = 'Rp 0';
        document.getElementById('totalBayar').innerText = formatRupiah(hargaAwal);
    }
}