<?php
require 'session.php';

// Hapus semua variabel sesi kecuali username
foreach ($_SESSION as $key => $value) {
    if ($key !== 'username') {
        unset($_SESSION[$key]);
    }
}

// Arahkan ke halaman konfirmasi
header("Location: confirmasi.php");
exit();
?>
