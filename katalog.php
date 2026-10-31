<?php

declare(strict_types=1);

require_once 'data.php';
require_once 'functions.php';

// daftar kategori  &  input filter//
$daftarKategori  = array_unique(array_column($daftarMenu, 'kategori')); //semua nilai kateori di dftr mn
$kategoriDipilih = trim((string) ($_GET['kategori'] ?? 'Semua'));
$kataKunci       = trim((string) ($_GET['cari'] ?? ''));

//  filter menu dan hitung ringkasan statistik//
$menuTampil = filterMenu($daftarMenu, $kategoriDipilih, $kataKunci);
$ringkasan  = hitungRingkasanMenu($daftarMenu);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Menu - Es Teler & Es Buah Atika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="site-header">
        <div class="container header-inner">
            <div class="brand">
                <h1>Es Teler & Es Buah Atika</h1>
                <p class="tagline">Segarnya Buah Pilihan, Durian Asli, & Minuman Tradisional!</p>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Beranda & Profil</a></li>
                    <li><a href="katalog.php" class="active">Katalog Menu</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <!-- Ringkasan Statistik -->
        <section class="summary-section">
            <h2>Ringkasan Statistik Katalog</h2>
            <div class="grid-3">
                <article class="stat-card">
                    <h3>Total Varian</h3>
                    <p class="stat-number"><?= $ringkasan['totalVarian']; ?> Menu</p>
                </article>
                <article class="stat-card">
                    <h3>Total Stok Tersedia</h3>
                    <p class="stat-number"><?= $ringkasan['totalStok']; ?> Porsi</p>
                </article>
                <article class="stat-card">
                    <h3>Rata-Rata Harga</h3>
                    <p class="stat-number"><?= e(formatRupiah($ringkasan['rataRataHarga'])); ?></p>
                </article>
            </div>
        </section>

        <!-- Filter & Pencarian -->
        <section class="filter-section">
            <h2>Cari & Saring Menu</h2>
            <form action="katalog.php" method="GET" class="filter-form">
                <input type="text" name="cari" placeholder="Cari menu (misal: Durian)..." value="<?= e($kataKunci); ?>">
                
                <select name="kategori">
                    <option value="Semua">Semua Kategori</option>
                    <?php foreach ($daftarKategori as $kat) : ?>
                        <option value="<?= e($kat); ?>" <?= $kategoriDipilih === $kat ? 'selected' : ''; ?>>
                            <?= e($kat); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" class="btn-primary">Cari</button>
                <a href="katalog.php" class="btn-reset">Reset</a>
            </form>
        </section>

        <!-- Daftar Menu  -->
        <section class="catalog-section">
            <h2>Daftar Menu (<?= count($menuTampil); ?> Menu)</h2>

            <?php if (empty($menuTampil)) : ?>
                <p class="empty-state">Menu yang Anda cari tidak ditemukan.</p>
            <?php else : ?>
                <div class="grid-4">
                    <?php foreach ($menuTampil as $menu) : ?>
                        <?php $status = getStatusStok($menu['stok']); ?>
                        <article class="menu-card">
                            <img src="assets/<?= e($menu['gambar']); ?>" alt="Foto <?= e($menu['nama']); ?>">
                            <div class="card-body">
                                <span class="kategori-label"><?= e($menu['kategori']); ?></span>
                                <h3><?= e($menu['nama']); ?></h3>
                                <p class="harga"><?= e(formatRupiah($menu['harga'])); ?></p>
                                <div class="card-footer">
                                    <span class="badge <?= e($status['class']); ?>"><?= e($status['label']); ?></span>
                                    <span class="stok-info">Stok: <?= $menu['stok']; ?></span>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> Es Teler & Es Buah Atika. Proyek Mini Pemrograman Web.</p>
        </div>
    </footer>

</body>
</html>