<?php

require_once 'config.php';
switch ($_GET['aksi'] ?? '') {
    case 'daftar':
        $username = $_POST['email'];
        $password = md5($_POST['password']);
        $level = 'pelanggan';
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $city_id = $_POST['city_id'];
        $province_id = $_POST['province_id'];
        $kode_pos = $_POST['kode_pos'];
        $no_hp = $_POST['no_hp'];
        // buat akun
        $sql = "INSERT INTO pengguna (username, password, level) VALUES ('$username', '$password', '$level')";
        $result = $conn->query($sql);
        if ($result) {
            $id = $conn->insert_id;
            $sql = "INSERT INTO pelanggan (id_akun, nama_pelanggan, alamat, city_id, province_id, kode_pos, no_hp) VALUES ('$id', '$nama', '$alamat', '$city_id', '$province_id', '$kode_pos', '$no_hp')";
            $result = $conn->query($sql);
            if ($result) {
                echo "ok";
                http_response_code(200);
                header('Location: index.php');
            } else {
                echo $conn->error;
            }
        } else {
            echo $conn->error;
        }
        break;
    case 'cek-stok':
        $ukuran = $_POST['ukuran'];
        $warna = $_POST['warna'];
        $id_produk = $_POST['id_produk'];
        $sql = "SELECT stok FROM v_stok WHERE ukuran = '$ukuran' AND warna = '$warna' AND id_produk = '$id_produk'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['stok'];
        } else {
            echo "0";
        }
        break;
    case 'tambah-keranjang':
        //cari id_variasi
        $ukuran = $_POST['ukuran'];
        $warna = $_POST['warna'];
        $id_produk = $_POST['id_produk'];
        $sql = "SELECT id_variasi FROM variasi_produk WHERE ukuran = '$ukuran' AND warna = '$warna' AND id_produk = '$id_produk'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_variasi = $row['id_variasi'];
        } else {
            $id_variasi = null;
        }
        $id_akun = $_POST['id_akun'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];
        $jumlah = $_POST['jumlah'];
        $keranjang = '1';

        $sql = "INSERT INTO detail_penjualan (id_akun, id_variasi, harga_beli, harga_jual, jumlah, keranjang) VALUES ('$id_akun', '$id_variasi', '$harga_beli', '$harga_jual', '$jumlah', '$keranjang')";

        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
            http_response_code(200);
        } else {
            echo $conn->error;
        }
        break;
    case 'hapus-keranjang':
        $id = $_POST['id'];
        $sql = "DELETE FROM detail_penjualan WHERE id_detail_penjualan = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }


        break;



}