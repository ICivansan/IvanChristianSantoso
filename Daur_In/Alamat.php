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
    <title>Alamat</title>
  </head>
  <body class="body">
  <?php
  session_start();
  $pesan = "";
  if($_SESSION['status']!="login") {
    header("location:index.php?pesan=belum_login");
  }

  if(isset($_GET['msg'])) {
    if($_GET['msg'] == "kos") {
      $pesan = "Data yang Anda masukkan kosong!";
    }
  }
  

  $nohp = $_SESSION['nohp'];
  $pwd = $_SESSION['pwd'];
  include_once("config.php");
  $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
  $udata = mysqli_fetch_array($data);
  $gadd = mysqli_query($mysqli, "SELECT * FROM alamat WHERE user_id='$udata[id]'");
  $gdis = mysqli_fetch_array($gadd);
  $_SESSION['name'] = $udata['nama'];
  $_SESSION['nohp'] = $udata['nohp'];
  $id = $udata['id'];
  $sub = "";
  $nama = $_SESSION['name'];
    ?>
    <div id="root">
      <div class="page">
        <div class="ds_flex">
          <a href="Akun.php">
            <img id="back" src=".\img\Back.svg" />
          </a>
          <p id="tlt5">Alamat</p>
        </div>
        <div class="centered">
          <form action="routing.php" method="post" name="falamat">
          <div class="isi">
            <p>Label Alamat</p>
            <input
              id="lbl_alamat_Txb"
              class="txb"
              type="text"
              name="label"
              placeholder="Masukkan label alamat Anda"
              required
              style="padding-left: 15px; width: 291px;"
              value="<?php if (!$gdis) {echo "";} else {echo $gdis['label_add'];}?>"
            />
            <p>Nama</p>
            <input
              id="Nama_Txb"
              class="txb"
              type="text"
              name="nama"
              placeholder="Masukkan nama Anda"
              value="<?php echo $nama;?>"
              required
              style="padding-left: 15px; width: 291px;"
            /> 
            
           
            <p>Nomor HP</p>
            <input
              id="Nomor_Txb"
              class="txb"
              type="text"
              name="nohp"
              placeholder="Masukkan nomor HP Anda"
              value="<?php echo $nohp;?>"
              required
              style="padding-left: 15px; width: 291px;"
            />
            
            
            <p>Alamat Lengkap</p>
            <input
              id="alamat_lngkp_Txb"
              class="txb"
              type="text"
              name="falamat"
              placeholder="Masukkan alamat lengkap Anda"
              required
              style="padding-left: 15px; width: 291px;"
              value="<?php if (!$gdis) {echo "";} else {echo $gdis['f_add'];}?>"
            />
            <p>Kota</p>
            <input
              id="kota_Txb"
              class="txb"
              type="text"
              name="kota"
              placeholder="Masukkan kota Anda"
              required
              style="padding-left: 15px; width: 291px;"
              value="<?php if (!$gdis) {echo "";} else {echo $gdis['kota'];}?>"
            />
            <p>Kecamatan</p>
            <input
              id="kecamatan_Txb"
              class="txb"
              type="text"
              name="kcmtn"
              placeholder="Masukkan kecamatan Anda"
              required
              style="padding-left: 15px; width: 291px;"
              value="<?php if (!$gdis) {echo "";} else {echo $gdis['kecmtn'];}?>"
            />
            <p style="font-size: 12px; margin: 0px; padding: 0px; margin-top: 5px;"><?php echo $pesan;?></p>
            <button type="submit" name="Alamat" id="konfirmasi_btn">Konfirmasi</button>
          </div>
          </form>    
          <div class="tmh_img"></div>
          &nbsp
        </div>
      </div>
    </div>
  </body>
  </html>