<?php 
$warn = "";

if (isset($_GET['msg']))
{
  if ($_GET['msg'] == "nama")
  {
    $warn = "Panjang karakter nama melebihi 100 karakter";
  } else if($_GET['msg'] == "nohp")
  {
    $warn = "Nomor HP yang Anda masukkan terlalu panjang";
  } else if($_GET['msg'] == "pwd")
  {
    $warn = "Panjang password tidak boleh melebihi 20 karakter";
  } else if($_GET['msg'] == "cek")
  {
    $warn = "Nomor HP sudah terdaftar";
  } else if($_GET['msg'] == "kur")
  {
    $warn = "Data yang Anda masukkan terlalu pendek";
  } else if($_GET['msg'] == "kos")
  {
    $warn = "Data yang Anda masukkan kosong!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <title>Register</title>
  </head>
  <body class="body">
    <div id="root">
      <div class="page">
        <div class="img_daur">
          <img src=".\img\Daur 1.png" />
        </div>
        <div class="centered">
          <form action="routing.php" method="post" name="regist">
            <div class="isi">
              <p id="nm_dpn">Nama</p>
              <input id="nm_Txb" class="txb" name="nama" type="text" placeholder="Masukkan nama Anda" required style="padding-left: 15px; width: 291px;"/>
              <p id="no_hp">Nomor HP</p>
              <input id="no_hp_Txb" name="nohp" class="txb" type="text" placeholder="Masukkan nomor HP Anda" required style="padding-left: 15px; width: 291px;"/>
              <p id="sandi">Sandi</p>
              <input id="sandi_Txb" class="txb" name="sandi" type="password" placeholder="Masukkan sandi Anda" required style="padding-left: 15px; width: 291px;"/>
              <br />
              <p style="margin: 5px 0px; padding: 0; font-size: 12px; margin-left: 5px;"><?php echo $warn;?></p>
              <button type="submit" name="Submit" id="daftar_btn" style="margin-bottom: 0px; margin-top: 7px;">Daftar</button>
              <p style="margin-bottom: 125px;">Sudah punya akun? Login <a href="index.php" style="color: #317f54;">disini</a></p>
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