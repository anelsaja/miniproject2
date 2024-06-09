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

// Inisialisasi pesan
$update_message = '';

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

    // Check if the update was successful
    if ($con->affected_rows > 0) {
      $_SESSION['update_message'] = "<p class='success-msg'>Data pemilik tiket berhasil diperbarui.</p>";
    } else {
      $_SESSION['update_message'] = "<p class='error-msg'>Gagal memperbarui data pemilik tiket.</p>";
    }
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
      $_SESSION['update_message'] = "<p class='success-msg'>Pesanan dan tiket terkait berhasil dihapus.</p>";
    } catch (mysqli_sql_exception $exception) {
      $con->rollback(); // Jika ada error, rollback transaksi
      $_SESSION['update_message'] = "<p class='error-msg'>Gagal menghapus pesanan dan tiket terkait.</p>";
      throw $exception; // Lanjutkan melempar exception
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OJINK - Riwayat <?php echo $user_email;?></title>
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="riwayat.css" />
  </head>

  <body>
    <header>
      <div class="logo1">
        <a href="halamanutama.php">
          <img src="img/logo.png" alt="logo" />
        </a>
      </div>
      <div class="website">
        <a href="halamanutama.php">
          <h1>OJINK</h1>
        </a>
      </div>
      <div class="cari">
        <form method="GET" action="searching.php">
          <input type="text" id="cari" name="cari" value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>" placeholder="Cari Orkes, Tanggal, dan Lokasi ...">
          <button type="submit">Cari</button>
        </form>
      </div>
      <?php if (isset($_SESSION['username'])): ?>
          <div id="keranjang">
            <a href="riwayat.php"><img src="img/keranjang.png" alt="keranjang"></a>
          </div>
          <div class="username">
            <img src='img/profil.png' alt='profil'>
            <p><?php echo $_SESSION['username']; ?></p>
          </div>
        <?php endif; ?>
      <div class="login">
        <?php if (isset($_SESSION['username'])): ?>
          <a href="logout.php" onclick="return confirmLogout();">LOGOUT</a>
          <script>
            function confirmLogout() {
              return confirm("Apakah Anda yakin ingin logout?");
            }
          </script>
        <?php else: ?>
        <a href="login.php">LOGIN</a>
        <?php endif; ?>
      </div>
    </header>
    <h5>
      <a href="halamanutama.php">Halaman Utama</a> >
      <a href="#">Riwayat</a>
    </h5>
    <div class="awalan">
      <div class="login">
        <a href="halamanutama.php">Kembali</a>
      </div>
    </div>
    
    <?php
    // Tampilkan pesan jika ada
    if (isset($_SESSION['update_message'])) {
        echo $_SESSION['update_message'];
        unset($_SESSION['update_message']); // Hapus pesan dari session
    }
    if ($result_pemesan->num_rows > 0) {
        while ($row_pemesan = $result_pemesan->fetch_assoc()) {
            $id_pemesan = $row_pemesan['id'];
            echo "<main>";
            echo "<h2>Order ID: " . $row_pemesan['id'] . "</h2>";
            echo "<p>Nama Pemesan: " . $row_pemesan['nama'] . "</p>";
            echo "<p>Email Pemesan: " . $row_pemesan['email'] . "</p>";
            echo "<p>No. HP Pemesan: " . $row_pemesan['no_hp'] . "</p>";
            echo "<p>Total Harga: Rp " . number_format($row_pemesan['total_harga'], 0, ',', '.') . ",-</p>";
            // echo "<p>Total Harga: " . $row_pemesan['CONCAT('Rp ', REPLACE(FORMAT(harga, 0), ',', '.'),',-') AS harga'] . "</p>";

            // Fetch ticket owner details
            $query_pemilik = "SELECT * FROM data_pemilik_tiket WHERE id_pemesan = $id_pemesan";
            $result_pemilik = $con->query($query_pemilik);
            
            if ($result_pemilik->num_rows > 0) {
                while ($row_pemilik = $result_pemilik->fetch_assoc()) {
                    echo "<form method='post'>";
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
            echo "</main>";
        }
    } else {
        echo "<p id='kosong'>No orders found.</p>";
    }
    ?>
    <footer>
      <div class="footer1">
        <div class="footerkiri">
          <img class="logo" src="img/logo.png" alt=" logo" />
          <p>
            <b>Ojink</b> adalah platform online yang menyediakan layanan
            pembelian tiket untuk berbagai acara, seperti konser musik,
            festival, hajatan, dan happy party. Website ini didirikan pada tahun
            2024 oleh sekelompok pemuda yang ingin memudahkan masyarakat dalam
            mendapatkan tiket orkes favorit mereka.
          </p>
          <p>Sosial Media:</p>
          <div class="sosmed">
            <a href="https://www.tiktok.com/@info_orkes_pati"
              ><img src="img/tiktok.png" alt="tiktok"
            /></a>
            <a href="https://www.facebook.com/infoorkespati"
              ><img src="img/fb.png" alt="fb"
            /></a>
            <a href="https://www.instagram.com/infoorkespati/"
              ><img src="img/ig.png" alt="ig"
            /></a>
          </div>
        </div>
        <div class="footerkiri">
          <p><b>INFORMASI</b></p>
          <a href="syarat.php">
            <p>Syarat dan Ketentuan</p>
          </a>
          <a href="syarat.php">
            <p>Privasi</p>
          </a>
        </div>
      </div>
      <div class="copyright">
        <p>PT. Pasukan Ojink Indonesia (Ojink)</p>
        <p>&copy; 2024 Ojink. All Rights Reserved</p>
      </div>
    </footer>
  </body>
</html>
