<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_tiket'])) {
    // Simpan data jumlah tiket yang dipesan di session
    $_SESSION['jumlah_tiket'] = $_POST['jumlah_tiket'];
    header("Location: pemesan.php");
    exit();
}
