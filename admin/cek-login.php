<?php

require_once ('config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Fetch user by username
    $stmt = $conn->prepare("SELECT * FROM pengguna WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if ($user['password'] == $password) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level'];

            header('Location: app.php');
        } else {
            header("location:login.php?pass=invalid");
        }
    } else {
        header("location:login.php?username=invalid");
    }

    $stmt->close();
}
?>