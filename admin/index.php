<?php
header('Content-Type: text/html; charset=utf-8');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
} else {
    header('location: app.php');
}