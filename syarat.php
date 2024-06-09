<?php
  // Include file koneksi
  require "session.php";
  include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="syarat.css">
    <link rel="icon" href="img/logo.png">
    <title>Syarat dan Ketentuan</title>
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
          <input type="text" id="cari" name="cari" value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>" placeholder="Cari Orkes, Tanggal, Lokasi, dan artis">
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

    <main>
      <h1>Syarat dan Ketentuan</h1>
      <section class="content">
        <h4>1. Penggunaan Situs</h4>
        <p>Ini adalah bagian syarat dan ketentuan yang menjelaskan penggunaan situs.</p>
      </section>

      <section class="content">
        <h4>2. Kebijakan Privasi</h4>
        <p>Kami menghargai privasi Anda. Baca lebih lanjut tentang kebijakan privasi kami.</p>
      </section>

      <section class="content">
        <h4>3. Hak Cipta</h4>
        <p>Semua konten di situs ini adalah hak cipta kami kecuali disebutkan lain.</p>
      </section>

      <section class="content">
        <h4>4. Perubahan pada Syarat dan Ketentuan</h4>
        <p>Kami berhak untuk mengubah syarat dan ketentuan tanpa pemberitahuan sebelumnya.</p>
      </section>
    </main>
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
