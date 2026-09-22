Blueprint Arsitektur Logis: Product Information System

Mata Kuliah: Pemrograman Web - Pertemuan 2
Fokus: Pemrosesan Server-Side, Manajemen Data Kolektif, dan Desain Modular
Status: Desain Konseptual (Tanpa Pengetikan Kode)

1. Data Layer (products.php)

Fungsi: Bertindak sebagai repositori penyimpanan data simulasi di dalam memori (pengganti basis data sementara).
Struktur Data: Menggunakan Multidimensional Array (Kombinasi dari Indexed Array luar dan Associative Array di bagian dalam).

Spesifikasi Entitas Produk:
Setiap produk di dalam sistem dirancang sebagai satu objek array yang wajib memiliki atribut (key) semantik berikut:

ID (String/Integer): Identitas unik produk (contoh: PROD-01).

Nama (String): Nama komoditas produk.

Kategori (String): Klasifikasi jenis produk (contoh: Elektronik, Pakaian).

Harga (Integer/Float): Nilai jual satuan produk.

Stok (Integer): Jumlah ketersediaan barang di gudang.

Deskripsi (String): Penjelasan singkat mengenai produk.

2. Processing Layer (functions.php)

Fungsi: Mengabstraksi dan mengisolasi seluruh logika bisnis sistem ke dalam unit-unit modular agar rapi dan dapat digunakan kembali (reusable).

Komponen Logika & Aturan Bisnis:

Fungsi hitungTotalNilaiStok():

Input (Parameter): Menerima variabel nilai Harga dan Stok barang.

Proses Kalkulasi: Melakukan operasi aritmatika perkalian (Harga dikali Stok).

Output (Return): Mengembalikan data total nilai aset inventori untuk produk tersebut.

Logika Peringatan Stok Kritis (Conditional Logic):

Kondisi: Struktur kontrol if-else yang menyeleksi nilai atribut Stok.

Aturan Evaluasi: Jika nilai Stok < 3 (kurang dari tiga), maka kondisi terpenuhi (true).

Tindakan: Sistem akan menyuntikkan flag atau penanda (seperti nama kelas CSS khusus) yang nantinya akan ditangkap oleh Presentation Layer untuk mengubah warna baris tabel.

3. Presentation Layer (index.php)

Fungsi: Lapisan antarmuka utama yang bertugas merajut file dari layer lain dan mempresentasikan data ke dalam struktur UI HTML yang dipahami pengguna.

Alur Kerja Konseptual (Sistem Render):

Inisialisasi Keamanan Tinggi: Dokumen diawali dengan perintah require_once untuk memanggil products.php dan functions.php. Jika file gagal dimuat, sistem akan Fatal Error dan berhenti, mencegah UI dirender tanpa data/logika.

Persiapan UI: Membuka kerangka dasar tabel HTML dengan kolom yang merepresentasikan spesifikasi produk.

Data Traversal (Navigasi Array): Menggunakan perulangan foreach untuk membedah multidimensional array produk satu demi satu tanpa takut terjadi infinite loop.

Render Atribut: Memasukkan variabel data per item (seperti Nama, Kategori) ke dalam sel tabel HTML.

Eksekusi Logika Lanjutan: Memanggil fungsi hitungTotalNilaiStok() pada sel terakhir tabel, serta mengevaluasi variabel stok untuk mewarnai baris (misal: warna merah) apabila masuk kategori kritis.    