<?php

switch ($_GET['page'] ?? '') {
    case '':
    case 'dashboard':
        include 'page/dashboard.php';
        break;
    case 'pengguna':
        include 'page/pengguna/index.php';
        break;
    case 'merk':
        include 'page/merk/index.php';
        break;
    case 'stok':
        include 'page/produk/stok.php';
        break;
    case 'produk';
        include 'page/produk/index.php';
        break;
    case 'variasi-produk';
        include 'page/produk/variasi-produk.php';
        break;
    case 'gambar-produk';
        include 'page/produk/gambar-produk.php';
        break;
    case 'pembelian';
        include 'page/pembelian/index.php';
        break;
    case 'penjualan':
        include 'page/penjualan/index.php';
        break;
    case 'detail-penjualan':
        include 'page/penjualan/detail-penjualan.php';
        break;
    case 'laporan-penjualan':
        include 'page/penjualan/laporan-penjualan.php';
        break;
    case 'laporan-pembelian':
        include 'page/pembelian/laporan-pembelian.php';
        break;
    case 'pelanggan':
        include 'page/pelanggan/index.php';
        break;

    default:
        include 'pages/404.php';
}