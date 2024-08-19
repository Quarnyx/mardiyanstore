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

}