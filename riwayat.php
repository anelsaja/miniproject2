<?php
require 'session.php';
include 'koneksi.php'; // Database connection

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$user_email = $_SESSION['username'];

// Fetch user orders
$query_pemesan = "SELECT * FROM data_pemesan WHERE username = '$user_email'";
$result_pemesan = $con->query($query_pemesan);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle update and cancel operations
    if (isset($_POST['update_tiket'])) {
        // Update ticket owner details
        $id_tiket = $_POST['id_tiket'];
        $nama_pemilik = mysqli_real_escape_string($con, $_POST['nama_pemilik']);
        $email_pemilik = mysqli_real_escape_string($con, $_POST['email_pemilik']);
        $no_hp_pemilik = mysqli_real_escape_string($con, $_POST['no_hp_pemilik']);
        
        $query_update = "UPDATE data_pemilik_tiket SET nama_pemilik = '$nama_pemilik', email_pemilik = '$email_pemilik', no_hp_pemilik = '$no_hp_pemilik' WHERE id = $id_tiket";
        $con->query($query_update);
    } elseif (isset($_POST['cancel_pesanan'])) {
        // Cancel order
        $id_pesanan = $_POST['id_pesanan'];

        // Mulai transaksi
        $con->begin_transaction();

        try {
            // Hapus data terkait di tabel data_pemilik_tiket
            $query_delete_pemilik_tiket = "DELETE FROM data_pemilik_tiket WHERE id_pemesan = ?";
            $stmt_pemilik_tiket = $con->prepare($query_delete_pemilik_tiket);
            $stmt_pemilik_tiket->bind_param("i", $id_pesanan);
            $stmt_pemilik_tiket->execute();

            // Hapus data terkait di tabel data_pembelian_tiket
            $query_delete_pembelian_tiket = "DELETE FROM data_pembelian_tiket WHERE id_pemesan = ?";
            $stmt_pembelian_tiket = $con->prepare($query_delete_pembelian_tiket);
            $stmt_pembelian_tiket->bind_param("i", $id_pesanan);
            $stmt_pembelian_tiket->execute();

            // Hapus data di tabel data_pemesan
            $query_delete_pemesan = "DELETE FROM data_pemesan WHERE id = ?";
            $stmt_pemesan = $con->prepare($query_delete_pemesan);
            $stmt_pemesan->bind_param("i", $id_pesanan);
            $stmt_pemesan->execute();

            // Komit transaksi
            $con->commit();
            echo "Pesanan dan tiket terkait berhasil dihapus.";
        } catch (mysqli_sql_exception $exception) {
            $con->rollback(); // Jika ada error, rollback transaksi
            throw $exception; // Lanjutkan melempar exception
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders - Ojink</title>
</head>
<body>
    <h1>Manage Your Orders</h1>
    <a href="logout.php">Logout</a>
    
    <?php
    if ($result_pemesan->num_rows > 0) {
        while ($row_pemesan = $result_pemesan->fetch_assoc()) {
            $id_pemesan = $row_pemesan['id'];
            echo "<h2>Order ID: " . $row_pemesan['id'] . "</h2>";
            echo "<p>Nama Pemesan: " . $row_pemesan['nama'] . "</p>";
            echo "<p>Email Pemesan: " . $row_pemesan['email'] . "</p>";
            echo "<p>No. HP Pemesan: " . $row_pemesan['no_hp'] . "</p>";

            // Fetch ticket owner details
            $query_pemilik = "SELECT * FROM data_pemilik_tiket WHERE id_pemesan = $id_pemesan";
            $result_pemilik = $con->query($query_pemilik);
            
            if ($result_pemilik->num_rows > 0) {
                while ($row_pemilik = $result_pemilik->fetch_assoc()) {
                    echo "<form action='manage_orders.php' method='post'>";
                    echo "<fieldset>";
                    echo "<legend>Data Pemilik Tiket</legend>";
                    echo "<input type='hidden' name='id_tiket' value='" . $row_pemilik['id'] . "'>";
                    echo "<label for='nama_pemilik'>Nama Pemilik Tiket:</label><br />";
                    echo "<input type='text' name='nama_pemilik' value='" . $row_pemilik['nama_pemilik'] . "' required /><br />";
                    echo "<label for='email_pemilik'>Email:</label><br />";
                    echo "<input type='email' name='email_pemilik' value='" . $row_pemilik['email_pemilik'] . "' required /><br />";
                    echo "<label for='no_hp_pemilik'>No. HP:</label><br />";
                    echo "<input type='text' name='no_hp_pemilik' value='" . $row_pemilik['no_hp_pemilik'] . "' required /><br />";
                    echo "<input type='submit' name='update_tiket' value='Update'>";
                    echo "</fieldset>";
                    echo "</form>";
                }
            }
            
            // Cancel order button
            echo "<form method='post'>";
            echo "<input type='hidden' name='id_pesanan' value='$id_pemesan'>";
            echo "<input type='submit' name='cancel_pesanan' value='Cancel Order'>";
            echo "</form>";
        }
    } else {
        echo "<p>No orders found.</p>";
    }
    ?>
</body>
</html>
