# Blueprint: Arsitektur Product Information System

Dokumen ini berisi rancangan cetak biru (blueprint) konseptual untuk Product Information System, menggunakan prinsip *Separation of Concerns* untuk memisahkan data, logika pemrosesan, dan tampilan antarmuka.

## 1. Data Layer (`products.php`)
Lapisan ini berfungsi sebagai media penyimpanan data (simulasi *database*) di dalam memori.
- **Struktur Penyimpanan**: Menggunakan tipe data *Multidimensional Array*. 
- **Mekanisme**: Indeks utama menggunakan struktur berurutan (*Indexed Array*) untuk memisahkan setiap baris produk. Di dalamnya, detail produk disimpan menggunakan *Associative Array* agar setiap data memiliki label/kata kunci yang jelas.
- **Atribut Komoditas yang Disimpan**:
  - `ID`: Identitas unik produk
  - `Nama`: Nama komoditas/produk
  - `Kategori`: Klasifikasi jenis produk
  - `Harga`: Nilai jual produk
  - `Stok`: Jumlah ketersediaan barang di gudang
  - `Deskripsi`: Keterangan detail mengenai produk

## 2. Processing Layer (`functions.php`)
Lapisan ini didedikasikan murni untuk merangkum seluruh aturan logika bisnis (*Single Responsibility Principle*).
- **Fungsi `hitungTotalNilaiStok()`**:
  - **Tujuan**: Mengalkulasi nilai aset dari sebuah produk yang ada di gudang.
  - **Parameter Input**: Harga dan Stok produk.
  - **Proses**: Melakukan operasi perkalian antara Harga dan Stok.
  - **Return Value**: Mengembalikan total nilai aset secara angka.
- **Logika Kondisional (Penyaring Stok Kritis)**:
  - **Mekanisme**: Menggunakan struktur percabangan `if-else`.
  - **Kondisi Evaluasi**: Memeriksa nilai atribut `Stok`. Jika `Stok < 3` (bernilai `true`), maka logika ini akan menghasilkan *output* modifikasi visual (seperti memberikan instruksi perubahan warna pada baris tabel HTML) untuk menandakan bahwa stok berstatus kritis.

## 3. Presentation Layer (`index.php`)
Lapisan antarmuka utama yang bertugas merajut seluruh komponen sistem dan menampilkannya kepada pengguna (klien).
- **Integrasi Modular**:
  - Memanggil *file* data menggunakan perintah `require_once 'products.php'`.
  - Memanggil *file* logika menggunakan perintah `require_once 'functions.php'`.
  - *Alasan menggunakan `require_once`*: Memastikan sistem menerapkan level toleransi nol; jika berkas penyusun ini hilang, sistem harus berhenti total (*Fatal Error*) untuk mencegah kebocoran proses atau data yang tidak valid.
- **Render Tampilan**:
  - Mengeksekusi perulangan `foreach` untuk melakukan *traversal* (penelusuran) isi *Multidimensional Array* yang berasal dari Data Layer.
  - Setiap putaran iterasi akan merender tag baris tabel (`<tr>`) dan kolom (`<td>`) HTML yang akan memuat data: ID, Nama, Kategori, Harga, Stok, Deskripsi, dan hasil kalkulasi Total Nilai Stok.