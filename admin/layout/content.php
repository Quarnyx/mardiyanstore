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

    default:
        include 'pages/404.php';
}