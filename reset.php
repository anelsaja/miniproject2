<?php
require 'session.php';

// Simpan username dari session jika ada
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

// Hapus semua variabel sesi kecuali username
foreach ($_SESSION as $key => $value) {
    if ($key !== 'username') {
        unset($_SESSION[$key]);
    }
}

// Kembalikan kembali username ke dalam session jika ada
if ($username !== null) {
    $_SESSION['username'] = $username;
}

// Hapus session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}


// Arahkan ke halaman konfirmasi
header("Location: confirmasi.php");
exit();
?>
