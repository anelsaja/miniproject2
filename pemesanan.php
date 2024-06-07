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
        $query_get_tiket = "SELECT tipePaket FROM tiket WHERE id = $id_tiket";
        $result_tiket = $con->query($query_get_tiket);
        if ($result_tiket && $result_tiket->num_rows > 0) {
          $row_tiket = $result_tiket->fetch_assoc();
          $jenis_tiket = $row_tiket['tipePaket'];
      
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
  $pesan_sukses = "Data pemesan dan tiket berhasil disimpan!";
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
        <form method="GET" action="searching.php">
          <input type="text" id="cari" name="cari" value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>" placeholder="Cari Orkes, Tanggal, dan Lokasi ...">
          <button type="submit">Cari</button>
        </form>
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

    <section class="datapembeli">
      <?php
      // Tampilkan formulir hanya jika belum ada pesan sukses atau pesan error
      if (!isset($pesan_sukses) && !isset($pesan_error)) {
      ?>
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
      }
      // Tampilkan pesan sukses jika ada
      if (isset($pesan_sukses)) {
        echo "<p class='pesan_sukses'>$pesan_sukses</p>";
      }
      // Tampilkan pesan error jika ada
      if (isset($pesan_error)) {
        echo "<p class='pesan_gagal'>$pesan_error</p>";
      }
      ?>
      <?php
      // Tampilkan formulir untuk data pemilik tiket sesuai dengan jumlah tiket yang telah diinput
      echo "<div class='data_pemilik'>";
      echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";

      foreach ($_SESSION['jumlah_tiket'] as $id_tiket => $jumlah) {
        // Query untuk mendapatkan informasi paket tiket berdasarkan id_tiket
        $query_info_tiket = "SELECT namaPaket, tipePaket FROM tiket WHERE id = $id_tiket";
        $result_info_tiket = $con->query($query_info_tiket);
        if ($result_info_tiket && $result_info_tiket->num_rows > 0) {
          $row_info_tiket = $result_info_tiket->fetch_assoc();
          $tipe_paket = $row_info_tiket['tipePaket'];
          // Tampilkan form berdasarkan jenis tiket (VIP atau Reguler)
          for ($i = 1; $i <= $jumlah; $i++) {
            echo "<fieldset>";
            echo "<legend>Data Pemilik Tiket $tipe_paket ke-$i</legend>";
            echo "<input type='hidden' name='id_tiket[]' value='$id_tiket'>"; // Hidden input untuk ID tiket
            echo "<label for='nama_pemilik_$i'>Nama Pemilik Tiket:</label><br />";
            echo "<input type='text' name='nama_pemilik[$id_tiket][$i]' id='nama_pemilik_$i' placeholder='Masukkan nama pemilik tiket' required /><br />";
            echo "<label for='email_pemilik_$i'>Email:</label><br />";
            echo "<input type='email' name='email_pemilik[$id_tiket][$i]' id='email_pemilik_$i' placeholder='Masukkan email pemilik tiket' required /><br />";
            echo "<label for='no_hp_pemilik_$i'>No. HP:</label><br />";
            echo "<input type='text' name='no_hp_pemilik[$id_tiket][$i]' id='no_hp_pemilik_$i' placeholder='Masukkan nomor HP pemilik tiket' required /><br />";
            echo "</fieldset>";
          }
        } else {
          echo "Error retrieving ticket information";
        }
      }
      echo "<div class='input'>";
      echo "<input type='reset' value='Reset' />";
      echo "<input type='submit' name='submit_pemilik' value='Submit Data Pemilik' />";
      echo "</div>";
      echo "</form>";
      echo "</div>";

      // Proses untuk menyimpan data pemilik tiket setelah pengguna mengirimkan formulir
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_pemilik'])) {
        // Loop untuk menyimpan setiap data pemilik tiket
        foreach ($_SESSION['jumlah_tiket'] as $id_tiket => $jumlah) {
          for ($i = 1; $i <= $jumlah; $i++) {
            // Periksa apakah variabel $_POST ada sebelum mengaksesnya
            if (isset($_POST["nama_pemilik_$id_tiket"][$i], $_POST["email_pemilik_$id_tiket"][$i], $_POST["no_hp_pemilik_$id_tiket"][$i])) {
              $nama_pemilik = mysqli_real_escape_string($con, $_POST["nama_pemilik_$id_tiket"][$i]);
              $email_pemilik = mysqli_real_escape_string($con, $_POST["email_pemilik_$id_tiket"][$i]);
              $no_hp_pemilik = mysqli_real_escape_string($con, $_POST["no_hp_pemilik_$id_tiket"][$i]);
              // Query untuk menyimpan data pemilik tiket ke dalam tabel data_pemilik_tiket
              $query_simpan_pemilik = "INSERT INTO data_pemilik_tiket (id_pemesan, id_tiket, jenis_tiket, nama_pemilik, email_pemilik, no_hp_pemilik,) VALUES ($id_pemesan, $id_tiket, '$tipe_paket', '$nama_pemilik', '$email_pemilik', '$no_hp_pemilik')";
              if ($con->query($query_simpan_pemilik) === TRUE) {
                // Tampilkan pesan sukses atau lakukan tindakan lanjutan setelah penyimpanan berhasil
                $pesan_sukses = "Data pemilik tiket berhasil disimpan!";
              } else {
              // Tampilkan pesan error jika terjadi kesalahan saat menyimpan
              echo "kesalahan";
              }
            } else {
            // Tampilkan pesan error jika variabel $_POST tidak ada
            echo "kesalahan";
            }
          }
        }
      }
      ?>
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
