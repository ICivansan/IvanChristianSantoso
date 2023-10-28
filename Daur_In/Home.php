<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <title>Home</title>
  </head>
  <body class="body">
    <?php
  session_start();
  if($_SESSION['status']!="login") {
    header("location:index.php?pesan=belum_login");
  }

  $nohp = $_SESSION['nohp'];
  $pwd = $_SESSION['pwd'];
  include_once("config.php");
  $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
  $udata = mysqli_fetch_array($data);

  $_SESSION['name'] = $udata['nama'];
  $_SESSION['pts'] = $udata['u_pts'];
  $_SESSION['trs'] = $udata['trs'];
  $_SESSION['inc'] = $udata['income'];
  $_SESSION['wait'] = $udata['wait'];
    ?>
    <div id="root">
      <div class="page">
        <div class="welcome">
          <p>Hai <?php echo $udata['nama'];?>,</p>
          <b>Selamat Datang !</b>
        </div>
        <div class="dash_sq">
          <div class="centered">
            <div class="dashboard">
              <img src=".\img\points.svg" />
              <p id="pts"><?php echo $udata['u_pts'];?> Pts</p>
              <a href="Riwayat.php" id="a">
                <button id="riwayat_btn">
                  <img src=".\img\Riwayat.svg" />
                </button>
              </a>
              <a href="TukarPoint.php">
                <button id="tkr_btn">
                  <img src=".\img\Tukar Point.svg" />
                </button>
              </a>
              <div class="tpm_rect">
                <div class="tpm">
                  <p>Transaksi</p>
                  <div class="line_1"></div>
                  <p>Pendapatan</p>
                  <div class="line_1"></div>
                  <p>Menunggu</p>
                </div>
                <div class="tpm_pts">
                  <p id="tpm_t"><?php echo $udata['trs'];?></p>
                  <div class="line_2"></div>
                  <div class="line_2"></div>
                  <p id="tpm_p"><?php echo $udata['income'];?></p>
                  <div class="line_2"></div>
                  <div class="line_2"></div>
                  <p id="tpm_m"><?php echo $udata['wait'];?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <p class="welcome">Ayo daur ulang sampahmu sekarang !</p>
        <br>
        <div class="slider">
          <div class="slides">
            <img
              src=".\img\slide1.svg"
              alt="Gambar 1"
              style="margin-left: 15px; padding-right: 15px"
            />
            <img src=".\img\slide2.svg" alt="Gambar 2" style="margin-left: 3px" />
            <img src=".\img\slide3.svg" alt="Gambar 3" style="margin-left: 18px" />
          </div>
        </div>
        <div class="tmh_img"></div>
        &nbsp
        <div class="footer width-control">
          <div class="fbtn nav">
            <button class="nav_btn">
              <a href="Home.php">
                <img src=".\img\Home_warna.svg" />
              </a>
            </button>
            <button class="nav_btn">
              <a href="News.php">
                <img src=".\img\Pick Up.svg" />
              </a>
            </button>
            <button id="QR_btn">
              <a href="QR.php">
                <img src=".\img\QR.svg" />
              </a>
            </button>
            <button class="nav_btn">
              <a href="DropOff.php">
                <img src=".\img\Drop off.svg" />
              </a>
            </button>
            <button class="nav_btn">
              <a href="Akun.php">
                <img src=".\img\Akun.svg" />
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
    <script src="Script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
  </body>
</html>