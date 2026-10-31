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

## 3. Struktur Folder & File Proyek
```text
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
└── style.css                # Eksternal stylesheet (Box-sizing, Flexbox, CSS Grid, & Media Queries)