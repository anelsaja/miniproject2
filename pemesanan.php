<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['jumlah_tiket'])) {
    header("Location: detail.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_pemesanan'])) {
    // Ambil data pemesan dari formulir
    $nama_pemesan = mysqli_real_escape_string($con, $_POST['nama_pemesan']);
    $email_pemesan = mysqli_real_escape_string($con, $_POST['email_pemesan']);
    $no_hp_pemesan = mysqli_real_escape_string($con, $_POST['no_hp_pemesan']);
    
    // Query untuk menyimpan data pemesan ke dalam tabel data_pemesan
    $query_simpan_pemesan = "INSERT INTO data_pemesan (nama, email, no_hp) VALUES ('$nama_pemesan', '$email_pemesan', '$no_hp_pemesan')";
    
    if ($con->query($query_simpan_pemesan) === TRUE) {
        $last_insert_id = $con->insert_id; // Ambil ID terakhir yang dimasukkan

        foreach ($_SESSION['jumlah_tiket'] as $id_tiket => $jumlah) {
          $jumlah = intval($jumlah); // pastikan bilangan bulat
          if ($jumlah > 0) {
              // Memeriksa jenis tiket berdasarkan ID tiket
              $query_get_tiket = "SELECT jenis FROM tiket WHERE id = $id_tiket";
              $result_tiket = $con->query($query_get_tiket);
              if ($result_tiket && $result_tiket->num_rows > 0) {
                  $row_tiket = $result_tiket->fetch_assoc();
                  $jenis_tiket = $row_tiket['jenis'];
      
                  // Query untuk menyimpan pembelian tiket
                  $query_simpan_pembelian = "INSERT INTO data_pembelian_tiket (id_pemesan, id_tiket, jumlah_tiket) VALUES ($last_insert_id, $id_tiket, $jumlah)";
                  if ($con->query($query_simpan_pembelian) === TRUE) {
                      // Update stok berdasarkan jenis tiket
                      if ($jenis_tiket == 'VIP') {
                          $query_update_stok = "UPDATE tiket SET stock = stock - $jumlah WHERE id = $id_tiket";
                      } else if ($jenis_tiket == 'Reguler') {
                          $query_update_stok = "UPDATE tiket SET stock = stock - $jumlah WHERE id = $id_tiket";
                      }
                      
                      // Jalankan query untuk mengupdate stok tiket
                      if (!$con->query($query_update_stok)) {
                          echo "Error updating stock: " . $con->error;
                      }
                  } else {
                      echo "Error: " . $query_simpan_pembelian . "<br>" . $con->error;
                  }
              } else {
                  echo "Error retrieving ticket information";
              }
          }
      }
      
      
        
       // Simpan ID pemesan ke session untuk halaman konfirmasi
       $_SESSION['last_insert_id'] = $last_insert_id;
       // Tampilkan pesan konfirmasi atau informasi yang relevan
       $pesan_sukses = "Data pemesan dan tiket berhasil disimpan! Jadi anda tidak perlu lagi mengisi form data pemesan.";
      } else {
          $pesan_error = "Error: " . $query_simpan_pemesan . "<br>" . $con->error;
      }
}

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
            <label for="nama"> Nama Lengkap: </label><br />
            <input type="text" name="nama_pemesan" id="nama_pemesan" placeholder="Masukkan nama lengkap" required /><br />
            <label for="email"> Email: </label><br />
            <input type="email_pemesan" name="email_pemesan" id="emailID" placeholder="Masukkan email" required/><br />
            <label for="no_hp"> No. HP: </label><br />
            <input type="text" name="no_hp_pemesan" id="no_hp_pemesan" placeholder="Masukkan nomor HP" required /><br />
          </fieldset>
          <div class="input">
            <input type="reset" value="Reset" />
            <input type="submit" name="submit_pemesanan" value="Submit" />
          </div>
        </form>
      </div>
      <?php
      if (isset($pesan_sukses)) {
        echo "<p>$pesan_sukses</p>";
      }

      if (isset($pesan_error)) {
          echo "<p>$pesan_error</p>";
      }
      ?>     
      <div class="data_pemilik">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset>
            <legend>Data Pemesan</legend>
            <label for="nama"> Nama Lengkap </label><br />
            <input
              type="text"
              name="nama_pemilik"
              id="nama_pemilik"
              placeholder="Masukkan nama lengkap"
              required
            />
            <br />
            <label for="email"> Email </label><br />
            <input
              type="email_pemilik"
              name="email_pemilik"
              id="emailID"
              placeholder="Masukkan email"
              required
            />
            <br />
            <label for="no_hp"> No. HP </label><br />
            <input
              type="text"
              name="no_hp_pemilik"
              id="no_hp_pemilik"
              placeholder="Masukkan nomor HP"
              required
            />
            <br />
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
