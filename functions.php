<?php

declare(strict_types=1);
//deklarasi dan fungsi keamanan//
function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}

//ubah angka interger jadi rp//

function formatRupiah(int $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function getStatusStok(int $stok): array
{
    if ($stok <= 0) {
        return [
            'label' => 'Habis',
            'class' => 'badge-danger'
        ];
    } elseif ($stok < 10) {
        return [
            'label' => 'Stok Menipis',
            'class' => 'badge-warning'
        ];
    } else {
        return [
            'label' => 'Tersedia',
            'class' => 'badge-success'
        ];
    }
}

function hitungRingkasanMenu(array $daftarMenu): array
{
    $totalVarian = count($daftarMenu);

    if ($totalVarian === 0) {
        return [
            'totalVarian'   => 0,
            'totalStok'     => 0,
            'rataRataHarga' => 0,
            'hargaTermurah' => 0,
            'hargaTermahal' => 0
        ];
    }

    // kolom 'stok' dan 'harga' mnggnkn array_column()
    $kolomStok  = array_column($daftarMenu, 'stok');
    $kolomHarga = array_column($daftarMenu, 'harga');

    // men+isi array mnggnkn array_sum()
    $totalStok      = (int) array_sum($kolomStok);
    $totalHarga     = (int) array_sum($kolomHarga);
    $rataRataHarga  = (int) round($totalHarga / $totalVarian);

    return [
        'totalVarian'   => $totalVarian,
        'totalStok'     => $totalStok,
        'rataRataHarga' => $rataRataHarga,
        'hargaTermurah' => (int) min($kolomHarga),
        'hargaTermahal' => (int) max($kolomHarga)
    ];
}
// Menyaring menu kategori dan kata kunci pencarian//
function filterMenu(array $daftarMenu, string $kategori = 'Semua', string $keyword = ''): array
{
    $hasilFilter = array_filter($daftarMenu, function (array $menu) use ($kategori, $keyword): bool {
        // Cek kecocokan kategori//
        $cocokKategori = ($kategori === 'Semua' || $kategori === '')
            ? true
            : ($menu['kategori'] === $kategori);

        // cek kecocokan kata kunci//
        $cocokKeyword = ($keyword === '')
            ? true
            : (stripos($menu['nama'], $keyword) !== false);

        return $cocokKategori && $cocokKeyword;
    });

    // Merapikan kembali indeks ahf//
    return array_values($hasilFilter);

}