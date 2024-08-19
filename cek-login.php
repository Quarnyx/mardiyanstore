<?php

require_once('config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $password = md5($_POST['password']);

    // Fetch user by username
    $stmt = $conn->prepare("SELECT * FROM pengguna WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if ($user['password'] == $password && $user['level'] == 'pelanggan') {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level'];
            $_SESSION['id_akun'] = $user['id_akun'];

            header('Location: index.php');
        } else {
            header("location:index.php?page=login&pass=invalid");
        }
    } else {
        header("location:index.php?page=login&username=invalid");
    }

    $stmt->close();
}
?>