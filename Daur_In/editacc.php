<?php
session_start();
include_once("config.php");
  if($_SESSION['status']!="login") {
    header("location:index.php?pesan=belum_login");
  }
  
  $nohp = $_SESSION['nohp'];
  $pwd = $_SESSION['pwd'];
  $gdata = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp'");
  $data = mysqli_fetch_array($gdata);
  $warn = "";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <title>Profile</title>
  </head>
  <body class="body">
    <div id="root">
      <div class="page">
        <div class="centered">
          <form action="pfp.php" method="post" name="regist" enctype="multipart/form-data">
            <div class="isi">
            <h1 style="text-align: center;">Profile</h1>
              <p id="nm_dpn">Nama</p>
              <input id="nm_Txb" class="txb" name="nama" type="text" placeholder="Masukkan nama Anda" value="<?php echo $data['nama'];?>" required style="padding-left: 15px; width: 291px;"/>
              <p id="no_hp">Nomor HP</p>
              <input id="no_hp_Txb" name="nohp" class="txb" type="text" placeholder="Masukkan nomor HP Anda" value="<?php echo $data['nohp'];?>" required style="padding-left: 15px; width: 291px;"/>
              <p id="sandi">Foto Profil</p>
              <input id="sandi_Txb" name="gbr" type="file" placeholder="Insert File" required style="width: 291px;"/>
              <br />
              <p style="margin: 5px 0px; padding: 0; font-size: 12px; margin-left: 5px;"><?php echo $warn;?></p>
              <button type="submit" name="submit" id="daftar_btn" style="margin-bottom: 0px; margin-top: 7px;">Perbaharui</button>
            </div>
          </form>
        </div>
        <div class="tmh_img"></div>
        &nbsp
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