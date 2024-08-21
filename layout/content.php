<?php

switch ($_GET['page'] ?? '') {
    case '':
    case 'home':
        include 'pages/home.php';
        break;
    case 'login':
        include 'pages/login.php';
        break;
    case 'produk':
        include 'pages/produk.php';
        break;
    case 'detail-produk':
        include 'pages/detail-produk.php';
        break;
    case 'keranjang':
        include 'pages/keranjang.php';
        break;
    case 'pembayaran':
        include 'pages/pembayaran.php';
        break;
    case 'akun':
        include 'pages/akun.php';
        break;
}