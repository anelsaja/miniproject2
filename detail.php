<?php
  require "koneksi.php";

  $nama = htmlspecialchars($_GET['nama']);
  // echo $nama;
  $queryorkes = mysqli_query($con, "SELECT * FROM jadwal_konser WHERE title='$nama'");
  $orkes = mysqli_fetch_array($queryorkes);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OJINK - Detail Konser <?php echo $orkes['title']?></title>
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="style.css" />
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
        <input
          type="text"
          placeholder="Cari Event, Orkes, dll"
          class="inputcari"
        />
        <input type="date" class="inputcari" />
      </div>
      <div class="login">
        <a href="#">LOGIN</a>
      </div>
    </header>
    <h5>
      <a href="halamanutama.php">Halaman Utama</a> >
      <a href="detail.php?nama=<?php echo $orkes['title']?>">Detail Orkes</a>
    </h5>
    <div class="awalan">
      <div class="login">
        <a href="halamanutama.php">Kembali</a>
      </div>
    </div>
    <main>
      <h1><?php echo $orkes['title']?></h1>
      <div class="event">
        <div class="penyelenggara">
          <h3>Nama Orkes:</h3>
          <img src="img/<?php echo $orkes['imgorkes']?>" alt="<?php echo $orkes['nama_orkes']?>" />
          <p><?php echo $orkes['nama_orkes']?></p>
          <br />
          <div class="sosialmedia">
            <h3>Sosial Media:</h3>
            <img src="img/<?php echo $orkes['imgsosmed']?>" alt="imgsosmed" />
            <br />
            <a href="<?php echo $orkes['sosial_media_link']?>"><?php echo $orkes['nama_orkes']?></a>
          </div>
          <br />
          <h3>Artist:</h3>
          <div class="artis">
            <p>
            <?php echo $orkes['artis']?>
            </p>
          </div>
        </div>
        <div class="event-banner">
          <img src="img/<?php echo $orkes['img']?>" alt="poster1" />
        </div>
      </div>
      <div class="detail_info">
        <h2>Detail Event</h2>
        <div class="calendar">
          <div class="calendar-icon">
            <img src="img/kalender.png" alt="kalender" />
          </div>
          <div class="calendar-text">
            <label for="">Tanggal</label>
            <span><?php echo $orkes['tanggal']?></span>
          </div>
        </div>
        <div class="time">
          <div class="time-icon">
            <img src="img/jam.png" alt="jam" />
          </div>
          <div class="time-text">
            <label for="">Waktu</label>
            <span><?php echo $orkes['waktu']?></span>
          </div>
        </div>
        <div class="location">
          <div class="location-icon">
            <img src="img/lokasi.png" alt="lokasi" />
          </div>
          <div class="location-text">
            <label for="">Lokasi</label>
            <span><?php echo $orkes['lokasi']?></span>
          </div>
        </div>
      </div>
      <div class="belitiket">
        <a href="pemesanan.html">Beli Tiket</a>
      </div>
      <div class="deskripsi">
        <h2>Deskripsi Orkes</h2>
        <p>
        <?php echo $orkes['deskripsi']?>
        </p>
        <h2>Syarat dan Ketentuan</h2>
        <p>
        <?php echo $orkes['syarat_dan_ketentuan']?>
        </p>
        <div class="syarat">
          <p>
            SAYA SETUJU dengan syarat dan ketentuan pembelian dan penggunaan
            Entry Pass di atas. SAYA MENGIKUTI perubahan aturan Promotor yang
            akan diumumkan di media sosial mereka. SAYA SIAP terikat secara
            hukum dengan syarat dan ketentuan tersebut.
          </p>
        </div>
      </div>
      <div class="venue">
        <h2>Layout Panggung</h2>
        <div class="layout">
          <img src="img/layout.jpg" alt="layout" />
        </div>
      </div>
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
