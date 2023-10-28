<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <title>Login</title>
  </head>
  <body>
  <?php
  $warn = "";
    if (isset($_GET['pesan'])) {
        if($_GET['pesan'] == "gagal") {
          $warn = "Login gagal! Nomor telepon dan password salah!";
        }
        else if ($_GET['pesan'] == "logout") {
          $warn = "Anda telah berhasil logout";
        }
        else if($_GET['pesan'] == "belum_login") {
          $warn = "Anda harus login terlebih dahulu";
        }
    }
    ?>
    <div id="root">
      <div class="page">
        <div class="img_daur">
          <img src=".\img\Daur 1.png" />
        </div>
        <div class="centered">
          <form action="index.php" method="post" name="Login">
            <div class="isi">
              <p id="no_hp">Nomor HP</p>
              <input id="no_hp_Txb" class="txb" name="nohp" type="text" placeholder="Masukkan nomor HP Anda" required style="padding-left: 15px; width: 291px;"/>
              <p id="sandi">Sandi</p>
              <input id="sandi_Txb" class="txb" name="sandi" type="password" placeholder="Masukkan sandi Anda" required style="padding-left: 15px; width: 291px;"/>
              <br />
              <?php echo " <p style='font-size: 11px;'>$warn</p>"; ?>            
              <button type="submit" id="daftar_btn" name="Masuk" style="margin-bottom: 0px;">Masuk</button>
              <p style="margin-bottom: 120px;">Belum punya akun? Daftar dulu <a href="register.php" style="color: #317f54;">disini</a></p>
            </div>
          </form>

        </div>
        <div class="footer width-control">
          <div class="fbtn nav">
            <button class="nav_btn">
              <img src=".\img\Home.svg" />
            </button>
            <button class="nav_btn">
              <img src=".\img\Pick Up.svg" />
            </button>
            <button id="QR_btn">
              <img src=".\img\QR.svg" />
            </button>
            <button class="nav_btn">
              <img src=".\img\Drop off.svg" />
            </button>
            <button class="nav_btn">
              <img src=".\img\Akun_warna.svg" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
if (isset($_POST['Masuk'])) 
{
  session_start();
    $nohp = $_POST['nohp'];
    $pwd = $_POST['sandi'];

    include_once("config.php");
    $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
    $cek = mysqli_num_rows($data);
    $udata = mysqli_fetch_array($data);

    if ($cek > 0)
    {
      $_SESSION['nohp'] = $nohp;
      $_SESSION['pwd'] = $pwd;
      $_SESSION['status'] = "login";
      header("Location:Home.php");
    } else{
      header("location:index.php?pesan=gagal");
    }
}
?>