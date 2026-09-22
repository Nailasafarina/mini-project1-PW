<?php
// Fungsi untuk mengalkulasi nilai aset gudang per produk
function hitungTotalNilaiStok($harga, $stok) {
    return $harga * $stok;
}

// Fungsi logika kondisional untuk menyaring warna baris jika stok kritis (< 3)
function cekStokKritis($stok) {
    return $stok < 3; 
}