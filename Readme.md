# Proyek Mini UTS Pemrograman Web — Es Teler & Es Buah Atika

Repositori ini berisi proyek mini mata kuliah **Pemrograman Web** berupa website profil usaha dan katalog menu dinamis berbasis PHP Native untuk UMKM lokal **Es Teler & Es Buah Atika**.

---

## 1. Identitas Mahasiswa
* **Nama Lengkap:** Arraul Nibras Irfandi Putra
* **NIM:** 021A00200010
* **Program Studi:** S1 Informatika
* **Mata Kuliah:** Pemrograman Web (Proyek Mini UTS)

---

## 2. Deskripsi Tema & Usaha
**Es Teler & Es Buah Atika** adalah UMKM kuliner minuman segar yang berlokasi di Jl. Singoprono Raya, Kebayanan 2, Pelem, Kec. Simo, Kabupaten Boyolali, Jawa Tengah. Usaha ini menyediakan berbagai varian Es Teler, Es Buah segar, hingga minuman tradisional seperti Es Ubi Ungu dan Es Dawet Ayu yang diracik menggunakan buah segar pilihan dan 100% gula murni.

Website ini dibangun untuk menampilkan informasi profil gerai serta katalog produk secara dinamis kepada pelanggan, lengkap dengan fitur pencarian, penyaringan (*filter*) kategori, indikator status ketersediaan stok otomatis, dan ringkasan statistik menu.

---
## 3.Cara menjalankan di localhost.
    buka terminal ketik perintah php -S localhost:8000,lanjut dengan cmd + cilk link nya untuk membuka ke halaman browser

## 4. Struktur Folder & File Proyek.
uts-pemweb-021A00200010/
├── assets/                  # Folder penyimpanan gambar produk & logo (.jpg)
│   ├── es teler.jpg
│   ├── es teler durian.jpg
│   ├── es teler keju.jpg
│   ├── es teler ice cream.jpg
│   ├── es buah.jpg
│   ├── es buah durian.jpg
│   ├── es ubi ungu.jpg
│   └── es dawet ayu.jpg
├── index.php                # Halaman utama (Profil usaha, ringkasan singkat, & informasi kontak)
├── katalog.php              # Halaman katalog dinamis (Statistik, filter GET, & daftar kartu menu)
├── data.php                 # Sumber data utama berupa array asosiatif multidimensi ($daftarMenu)
├── functions.php            # Kumpulan fungsi logika, perhitungan statistik, filter, & sanitasi XSS
├── Readme.md                # Dokumentasi proyek
└── style.css                # Eksternal stylesheet (Box-sizing, Flexbox, CSS Grid, & Media Queries)# uts-pemweb-021A00200010
## 5.Daftar fungsi array bawaan yang dipakai dan untuk apa.
1.count($menu): Digunakan di dalam fungsi hitungRingkasanMenu() untuk menghitung jumlah total item/. varian menu yang ada di dalam array.

2.array_column($menu, 'stok') & array_column($menu, 'harga'): Digunakan di dalam fungsi hitungRingkasanMenu() untuk mengambil satu kolom nilai spesifik (stok atau harga) dari array multidimensi menjadi array satu dimensi.

3.array_sum(...): Digunakan untuk menjumlahkan seluruh angka di dalam array hasil array_column guna mendapatkan total stok porsi siap saji dan total harga (untuk dihitung rata-ratanya).

4.min(...) & max(...): Digunakan untuk mencari nilai harga paling murah dan harga paling mahal dari array kolom harga.

5.array_filter($menu, ...): Digunakan di dalam fungsi filterMenu() untuk menyaring elemen array $daftarMenu yang sesuai dengan kata kunci pencarian dan kategori yang dipilih pengguna.

6.array_values(...): Digunakan setelah proses array_filter() untuk mengurutkan kembali indeks array mulai dari 0.

7.in_array(...): Digunakan pada katalog.php untuk memvalidasi apakah kategori yang dikirim melalui parameter URL ($_GET['kategori']) terdaftar di dalam array $daftarKategori.
## 6.Tangkapan Layar (Screenshots)

![Tampilan katalog menu](./screenshots/beranda&profile.jpg)
![Tampilan katalog menu](./screenshots/katalogmenu.jpg)


## 7.. Sumber Referensi dan Catatan Pemakaian AI
    Sumber referensi:
    pertemuan 1-6
    catatan penggunaan ai:
    diskusi untuk merapikan latar belakang foto produk kemasan cup Atika agar seragam, serta melakukan pengecekan kelengkapan syarat wajib proyek UTS.