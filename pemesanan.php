<?php
include "koneksi.php"; // Sertakan file koneksi ke database

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/logo.png" />
    <title>OJINK - PEMESANAN</title>
    <link rel="stylesheet" href="pesan_style.css" />
  </head>
  <body>
    <!-- HEADERNYA -->
    <div class="head">
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
        <div class="cari">
          <input
            type="text"
            placeholder="Cari Event, Orkes, dll"
            class="inputcari"
          />
          <input type="date" class="inputcari" />
        </div>
        <div class="login">
          <a href="detail.html">LOGIN</a>
        </div>
      </header>
      <div class="timer">
        <p>Anda memiliki waktu 15 menit untuk menyelesaikan pemesanan ini!</p>
      </div>
    </div>

    <!-- ----Awalan---- -->
    <h5>
      <a href="halamanutama.php?nama=<?php echo $orkes['title']?>">Halaman Utama</a> >
      <a href="detail.php?nama=<?php echo $orkes['title']?>">Detail Orkes</a> >
      <a href="pemesanan.php?nama=<?php echo $orkes['title']?>">Pemesanan</a>
    </h5>
    <div class="awalan">
      <div class="login">
        <a href="detail.html">Kembali</a>
      </div>
    </div>

    <!-- JUDUL -->
    <div class="judul">
      <h1>Pemesanan Tiket</h1>
    </div>

    <!-- DATA PEMBELI -->
    <section class="datapembeli">
      <div class="data_pemesan">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <fieldset>
            <legend>Data Pemesan</legend>
            <label for="nama"> Nama Lengkap </label><br />
            <input
              type="text"
              name="nama"
              id="namaID"
              placeholder="Masukkan nama lengkap"
              required
            />
            <br />
            <label for="email"> Email </label><br />
            <input
              type="email"
              name="email"
              id="emailID"
              placeholder="Masukkan email"
              required
            />
            <br />
            <label for="no_hp"> No. HP </label><br />
            <input
              type="text"
              name="no_hp"
              id="no_hpID"
              placeholder="Masukkan nomor HP"
              required
            />
            <br />
          </fieldset>
          <div class="input">
            <input type="reset" value="Reset" />
            <input type="submit" value="Submit" />
          </div>
        </form>
      </div>
      <div class="data_pemilik">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <fieldset>
                <legend>Data Pemilik Tiket</legend>
                <?php foreach ($tiket as $t) : ?>
                    <label for="nama_pemesan"> Nama Lengkap (ID Tiket: <?php echo $t['id']; ?>) </label><br />
                    <input
                            type="text"
                            name="nama_pemesan"
                            id="nama_pemesan_<?php echo $t['id']; ?>"
                            placeholder="Masukkan nama lengkap"
                            required
                    />
                    <br />
                    <label for="email_pemesan"> Email </label><br />
                    <input
                            type="email"
                            name="email_pemesan"
                            id="email_pemesan_<?php echo $t['id']; ?>"
                            placeholder="Masukkan email"
                            required
                    />
                    <br />
                    <label for="no_hp_pemesan"> No. HP </label><br />
                    <input
                            type="text"
                            name="no_hp_pemesan"
                            id="no_hp_pemesan_<?php echo $t['id']; ?>"
                            placeholder="Masukkan nomor HP"
                            required
                    />
                    <input type="hidden" name="jumlah_tiket[<?php echo $t['id']; ?>]" value="1" /> <!-- Jumlah tiket default -->
                    <br /><br />
                <?php endforeach; ?>
            </fieldset>
            <div class="input">
                <input type="reset" value="Reset" />
                <input type="submit" name="submit_pemilik" value="Submit" />
            </div>
        </form>
    </div>
    </section>

    <!-- ----Bukti Transaksi---- -->
    <section class="kwitansi">
      <h3>Rincian Pesanan</h3>
      <div class="poster">
        <img src="img/konser 1.jpeg" alt="poster 1" />
        <h4>Family Plat G</h4>
      </div>
      <div class="voucher">
        <h4>Tiket</h4>
        <p>
          REGULER x1 <br />
          Rp 20.000,-
        </p>
        <input
          type="text"
          name="voucher"
          id="voucher"
          placeholder="Masukkan kode voucher"
        />
        <input class="terapkan" type="submit" value="Terapkan" />
      </div>
      <div class="rincian">
        <p>Subtotal:</p>
        <p>20.000,-</p>
        <p>Biaya Layanan:</p>
        <p>Rp 5.000,-</p>
      </div>
      <div class="total">
        <p>
          Total: <br />
          Rp 25.000,-
        </p>
        <a href="confirmasi.html">Konfirmasi</a>
      </div>
    </section>

    <!-- FOOTERNYA -->
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
