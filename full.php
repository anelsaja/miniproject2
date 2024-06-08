<?php
    // Include file koneksi
    include "koneksi.php";
    require "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seluruh Orkes</title>
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="full.css">
</head>
<body>
    </div>
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
    <div class="awalan">
      <div class="login">
        <a href="halamanutama.php">Kembali</a>
      </div>
    </div>
    
    <?php

    // Ambil input pencarian
    $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

    // Pisahkan kata kunci pencarian menjadi tiga parameter: title, lokasi, dan tanggal
    $searchTitle = "%{$cari}%";
    $searchLocation = "%{$cari}%";
    $searchDate = "%{$cari}%";

    // Query pencarian
    $querycari = $con->prepare("SELECT id, img, title, tanggal, lokasi, waktu, CONCAT('Rp ', REPLACE(FORMAT(harga, 0), ',', '.'),',-') AS harga FROM jadwal_konser WHERE title LIKE ? OR lokasi LIKE ? OR tanggal LIKE ? ORDER BY tanggal DESC");
    $querycari->bind_param("sss", $searchTitle, $searchLocation, $searchDate);

    // Eksekusi query
    $querycari->execute();

    $result = $querycari->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="container-content">';
            echo '  <div class="pemaindor">';
            echo '    <div class="kotak">';
            echo '      <div class="poster">';
            echo '        <img src="img/' . htmlspecialchars($row['img']) . '" alt="' . htmlspecialchars($row['img']) . '" />';
            echo '      </div>';
            echo '      <div class="isi">';
            echo '        <h2>' . htmlspecialchars($row['title']) . '</h2>';
            echo '        <table>';
            echo '          <tr>';
            echo '            <td>Tanggal</td>';
            echo '            <td>: ' . date('d F Y', strtotime($row['tanggal'])) . '</td>';
            echo '          </tr>';
            echo '          <tr>';
            echo '            <td>Lokasi</td>';
            echo '            <td>: ' . htmlspecialchars($row['lokasi']) . '</td>';
            echo '          </tr>';
            echo '          <tr>';
            echo '            <td>Waktu</td>';
            echo '            <td>: ' . htmlspecialchars($row['waktu']) . '</td>';
            echo '          </tr>';
            echo '          <tr>';
            echo '            <td class="harga">Harga Mulai</td>';
            echo '            <td class="harga">: ' . htmlspecialchars($row['harga']) . '</td>';
            echo '          </tr>';
            echo '        </table>';
            echo '        <div class="detail">';
            echo '          <a href="detail.php?id=' . htmlspecialchars($row['id']) . '">Detail</a>';
            echo '        </div>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';

        }
    } else {
        echo "<div class='gagal'>Tidak ada hasil yang ditemukan untuk pencarian Anda.</div>";
    }

    // Tutup statement
    $querycari->close();

    // Tutup koneksi
    $con->close();
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
          <a href="#">
            <p>Syarat dan Ketentuan</p>
          </a>
          <a href="#">
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
