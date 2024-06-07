<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Jadwal Konser</title>
    <link rel="stylesheet" href="searching.css">
</head>
<body>
    </div>
    <header>
      <div class="logo1">
        <a href="#">
          <img src="img/logo.png" alt="logo" />
        </a>
      </div>
      <div class="website">
        <a href="#">
          <h1>OJINK</h1>
        </a>
      </div>
      <div class="login">
        <a href="#">LOGIN</a>
      </div>
    </header>
    <div class="cari">
        <form method="GET">
            <label for="cari">Pencarian: </label>
            <input type="text" id="cari" name="cari" value="<?php if (isset($_GET['cari'])) { echo htmlspecialchars($_GET['cari']); } ?>">
            <button type="submit">Cari</button>
        </form>
    </div>
    <div>
    <?php
    // Include file koneksi
    include "koneksi.php";

    // Ambil input pencarian
    $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

    // Pisahkan kata kunci pencarian menjadi tiga parameter: title, lokasi, dan tanggal
    $searchTitle = "%{$cari}%";
    $searchLocation = "%{$cari}%";
    $searchDate = "%{$cari}%";

    // Query pencarian
    $querycari = $con->prepare("SELECT * FROM jadwal_konser WHERE title LIKE ? OR lokasi LIKE ? OR tanggal LIKE ?");
    $querycari->bind_param("sss", $searchTitle, $searchLocation, $searchDate);

    // Eksekusi query
    $querycari->execute();

    $result = $querycari->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<img src='img/" . htmlspecialchars($row['img']) . "' alt='Image' width='250'><br>";
            echo "<strong>Judul:</strong> " . htmlspecialchars($row['title']) . "<br>";
            echo "<strong>Nama Orkes:</strong> " . htmlspecialchars($row['nama_orkes']) . "<br>";
            echo "<strong>Tanggal:</strong> " . htmlspecialchars($row['tanggal']) . "<br>";
            echo "<strong>Lokasi:</strong> " . htmlspecialchars($row['lokasi']) . "<br>";
            echo "<strong>Waktu:</strong> " . htmlspecialchars($row['waktu']) . "<br>";
            echo "<strong>Harga:</strong> " . htmlspecialchars($row['harga']) . "<br>";
            echo "</div><hr>";
        }
    } else {
        echo "Tidak ada hasil yang ditemukan untuk pencarian Anda.";
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
