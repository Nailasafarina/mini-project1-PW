# Product Information System - Mini Project

## Deskripsi Proyek
Proyek ini adalah implementasi konsep arsitektur *server-side* PHP menggunakan prinsip pemrograman modular (*Separation of Concerns*). Mini project ini secara khusus difokuskan pada pematangan rancangan cetak biru (blueprint) konseptual tanpa adanya penulisan eksekusi kode (*Sesi Tanpa Coding*), sesuai dengan pedoman pembelajaran teori PHP Fundamental.

## Arsitektur Sistem
Sistem ini memecah struktur program menjadi tiga komponen independen yang saling bekerja sama:
1. **Data Layer** (Disimulasikan pada `products.php`): Menyimpan *multidimensional array* yang memuat atribut spesifik produk (ID, Nama, Kategori, Harga, Stok, Deskripsi).
2. **Processing Layer** (`functions.php`): Mengisolasi seluruh operasional logika bisnis, termasuk fungsi kalkulasi total nilai aset (`hitungTotalNilaiStok()`) dan logika kondisional bersyarat untuk penandaan peringatan stok kritis (< 3).
3. **Presentation Layer** (`index.php`): Halaman antarmuka utama yang bertugas merajut keseluruhan sistem menggunakan instruksi `require_once` dan mengeksekusi navigasi data menggunakan perulangan `foreach` ke dalam struktur tabel HTML.

## Teknologi & Konsep Teori Terapan
- Arsitektur *Server-Side Processing*
- Manajemen Data Kompleks: *Multidimensional & Associative Array*
- *Modular Programming* (Penggunaan `require_once` ber-toleransi nol)
- *Logic Control & Traversal Data* (`if-else`, `foreach`)
- *Single Responsibility Principle* pada fungsi logika bisnis

## Cara Penggunaan (Panduan Konseptual)
1. Siapkan struktur direktori yang berisi tiga *file* secara terpisah (`products.php`, `functions.php`, dan `index.php`).
2. *File* `index.php` secara eksklusif akan bertindak sebagai *entry point* (titik masuk) sistem yang akan menarik data dan fungsi dari dua *file* lainnya.
3. Akses *file* `index.php` melalui peramban web (disimulasikan melalui *local server*) untuk melihat hasil render tabel katalog informasi produk.