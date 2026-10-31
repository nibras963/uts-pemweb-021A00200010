<?php

declare(strict_types=1);

require_once 'data.php';
require_once 'functions.php';

//profil UMKM 
$profilUmkm = [
    'nama'      => 'Es Teler & Es Buah Atika',
    'deskripsi' => 'UMKM lokal yang menyajikan aneka varian Es Teler, Es Buah, hingga minuman tradisional seperti Es Ubi Ungu dan Es Dawet Ayu. Diracik menggunakan bahan alami berkualitas, buah segar setiap hari, dan gula murni 100%.',
    'jamBuka'   => 'Setiap Hari, Pukul 09.00 - 16.30 WIB',
    'alamat'    => 'Jl. Singoprono Raya, Kebayanan 2, Pelem, Kec. Simo, Kabupaten Boyolali, Jawa Tengah 57377',
    'telepon'   => '0856-4202-4447'
];
$ringkasan = hitungRingkasanMenu($daftarMenu);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($profilUmkm['nama']); ?> - Profil Usaha</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="site-header">
        <div class="container header-inner">
            <div class="brand">
                <h1><?= e($profilUmkm['nama']); ?></h1>
            </div>
            <nav class="main-nav" aria-label="Navigasi Utama">
                <ul>
                    <li><a href="index.php" class="active">Beranda & Profil</a></li>
                    <li><a href="katalog.php">Katalog Menu</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
        <!-- Tentang Usaha -->
        <section class="hero-section">
            <div class="hero-content">
                <h2>Tentang Usaha Kami</h2>
                <p><?= e($profilUmkm['deskripsi']); ?></p>
                <div class="hero-stats">
                    <span><strong><?= $ringkasan['totalVarian']; ?></strong> Varian Menu</span>
                    <span><strong><?= $ringkasan['totalStok']; ?></strong> Porsi Siap Saji</span>
                    <span>Mulai <strong><?= e(formatRupiah($ringkasan['hargaTermurah'])); ?></strong></span>
                </div>
                <br>
                <a href="katalog.php" class="btn-primary">Lihat Katalog Lengkap</a><br>
            </div>
            <div class="hero-image">
                <img src="assets/logo atika.jpg" alt="logo atika">
            </div>
        </section>
       
        <!--alamat & Kontak -->
        <section class="info-section">
            <h2>Informasi Gerai & Pemesanan</h2> <br>
            <div class="grid-3">
                <article class="info-card">
                    <h3>Jam Operasional</h3>
                    <p><?= e($profilUmkm['jamBuka']); ?></p>
                </article>
                <article class="info-card">
                    <h3>Alamat</h3>
                    <p><?= e($profilUmkm['alamat']); ?></p>
                </article>
                <article class="info-card">
                    <h3>Kontak Pemesanan</h3>
                    <p>WhatsApp: <?= e($profilUmkm['telepon']); ?></p>
                </article>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> <?= e($profilUmkm['nama']); ?>. Proyek Mini Individu Pemrograman Web.</p>
        </div>
    </footer>

</body>
</html>