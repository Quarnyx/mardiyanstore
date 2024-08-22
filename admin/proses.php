<?php

require_once 'config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-pengguna':
        $usermae = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];
        $sql = "INSERT INTO pengguna (username, password, level) VALUES ('$usermae', '$password', '$level')";
        $result = $conn->query($sql);

        if ($result) {
            echo "ok";
        } else {
            echo "gagal";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'edit-pengguna':
        $id = $_POST['id'];
        $username = $_POST['username'];
        $level = $_POST['level'];
        $sql = "UPDATE pengguna SET username = '$username', level = '$level' WHERE id_akun = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'hapus-pengguna':
        $id = $_POST['id'];
        $sql = "DELETE FROM pengguna WHERE id_akun = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'ganti-password':
        $password = md5($_POST['password']);
        $sql = "UPDATE pengguna SET password = '$password' WHERE id_akun = '$_POST[id]'";
        $result = $conn->query($sql);
        if ($result && $conn->affected_rows > 0) {
            echo "ok";
            http_response_code(200);
        } elseif ($conn->error) {
            http_response_code(500);
            echo "Gagal";
            echo $conn->error;
        }
        break;
    case 'tambah-merk':
        $nama_merk = $_POST['nama_merk'];
        $sql = "INSERT INTO merk (nama_merk) VALUES ('$nama_merk')";
        $result = $conn->query($sql);

        if ($result) {
            echo "ok";
        } else {
            echo "gagal";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'hapus-merk':
        $id = $_POST['id'];
        $sql = "DELETE FROM merk WHERE id_merk = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'edit-merk':
        $id = $_POST['id'];
        $nama_merk = $_POST['nama_merk'];
        $level = $_POST['level'];
        $sql = "UPDATE merk SET nama_merk = '$nama_merk' WHERE id_merk = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'tambah-produk':
        $id_merk = $_POST['id_merk'];
        $nama_produk = $_POST['nama_produk'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];
        $detail = $_POST['detail'];
        $sql = "INSERT INTO produk (id_merk, nama_produk, harga_beli, harga_jual, detail) VALUES ('$id_merk', '$nama_produk', '$harga_beli', '$harga_jual', '$detail')";
        $result = $conn->query($sql);

        if ($result) {
            echo "ok";
        } else {
            echo "gagal";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'edit-produk':
        $id = $_POST['id'];
        $id_merk = $_POST['id_merk'];
        $nama_produk = $_POST['nama_produk'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];
        $detail = $_POST['detail'];
        $sql = "UPDATE produk SET id_merk = '$id_merk', nama_produk = '$nama_produk', harga_beli = '$harga_beli', harga_jual = '$harga_jual', detail = '$detail' WHERE id_produk = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'hapus-produk':
        $id = $_POST['id'];
        $sql = "DELETE FROM produk WHERE id_produk = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'tambah-variasi-produk':
        $id_produk = $_POST['id_produk'];
        $warna = $_POST['warna'];
        $ukuran = $_POST['ukuran'];
        $sql = "INSERT INTO variasi_produk (id_produk, warna, ukuran) VALUES ('$id_produk', '$warna', '$ukuran')";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
        } else {
            echo "gagal";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'edit-variasi-produk':
        $id = $_POST['id'];
        $id_produk = $_POST['id_produk'];
        $warna = $_POST['warna'];
        $ukuran = $_POST['ukuran'];
        $sql = "UPDATE variasi_produk SET id_produk = '$id_produk', warna = '$warna', ukuran = '$ukuran' WHERE id_variasi = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'hapus-variasi-produk':
        $id = $_POST['id'];
        $sql = "DELETE FROM variasi_produk WHERE id_variasi = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'tambah-gambar-produk':
        $id_produk = $_POST['id_produk'];
        $gambar = $_FILES['gambar']['name'];
        // simpan gambar ke folder assets/produk
        move_uploaded_file($_FILES['gambar']['tmp_name'], "assets/images/produk/$gambar");
        $sql = "INSERT INTO gambar_produk (id_produk, gambar) VALUES ('$id_produk', '$gambar')";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
        } else {
            echo "gagal";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'hapus-gambar-produk':
        $id = $_POST['id'];
        $sql = "DELETE FROM gambar_produk WHERE id_gambar = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'tambah-pembelian':
        $id_varian = $_POST['id_variasi'];
        $jumlah = $_POST['jumlah'];
        $harga_beli = $_POST['harga_beli'];
        $tanggal_beli = $_POST['tanggal_beli'];
        $sql = "INSERT INTO pembelian (id_variasi, jumlah, harga_beli, tanggal_beli) VALUES ('$id_varian', '$jumlah', '$harga_beli', '$tanggal_beli')";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
        } else {
            echo "gagal";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'hapus-pembelian':
        $id = $_POST['id'];
        $sql = "DELETE FROM pembelian WHERE id_pembelian = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
            echo "ok";
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'edit-pembelian':
        $id = $_POST['id'];
        $id_variasi = $_POST['id_variasi'];
        $jumlah = $_POST['jumlah'];
        $harga_beli = $_POST['harga_beli'];
        $tanggal_beli = $_POST['tanggal_beli'];
        $sql = "UPDATE pembelian SET id_variasi = '$id_variasi', jumlah = '$jumlah', harga_beli = '$harga_beli', tanggal_beli = '$tanggal_beli'  WHERE id_pembelian = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'update-status':
        $kode_penjualan = $_POST['kode_penjualan'];
        $status = $_POST['status'];
        $sql = "UPDATE penjualan SET status = '$status' WHERE kode_penjualan = '$kode_penjualan'";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
            http_response_code(200);
            header('location: app.php?page=detail-penjualan&kode=' . $kode_penjualan);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'update-resi':
        $kode_penjualan = $_POST['kode_penjualan'];
        $resi = $_POST['resi'];
        $sql = "UPDATE penjualan SET no_resi = '$resi' WHERE kode_penjualan = '$kode_penjualan'";
        $result = $conn->query($sql);
        if ($result) {
            echo "ok";
            http_response_code(200);
            header('location: app.php?page=detail-penjualan&kode=' . $kode_penjualan);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'hapus-penjualan':
        $kode = $_POST['kode'];
        $sql = "DELETE FROM penjualan WHERE kode_penjualan = '$kode'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        $sql = "DELETE FROM detail_penjualan WHERE kode_penjualan = '$kode'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'hapus-pelanggan':
        $id = $_POST['id'];
        $sql = "DELETE FROM pelanggan WHERE id_akun = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
}