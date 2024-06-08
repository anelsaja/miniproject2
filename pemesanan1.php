<?php
require 'session.php';
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    echo '<script type="text/javascript">';
    echo 'if (confirm("Anda harus login terlebih dahulu untuk membeli tiket. Apakah Anda ingin login sekarang?")) {';
    echo 'window.location.href = "login.php";';
    echo '} else {';
    echo 'window.location.href = "halamanutama.php";';
    echo '}';
    echo '</script>';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_tiket'])) {
    // Simpan data jumlah tiket yang dipesan di session
    $_SESSION['jumlah_tiket'] = $_POST['jumlah_tiket'];
    header("Location: pemesanan.php");
    exit();
}
?>