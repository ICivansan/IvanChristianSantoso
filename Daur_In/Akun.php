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
    <title>Akun</title>
  </head>
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
  $adddata = mysqli_query($mysqli, "SELECT * FROM alamat WHERE user_id='$udata[id]'");
  $labeldata = mysqli_fetch_array($adddata);

  if ($labeldata)
  {
    $_SESSION['lname'] = $labeldata['nama'];
    $_SESSION['ladd_lbl'] = $labeldata['label_add'];
    $_SESSION['lnohp'] = $labeldata['nohp'];
    $_SESSION['lfadd'] = $labeldata['f_add'];
    $_SESSION['lkota'] = $labeldata['kota'] . ", ";
    $_SESSION['lkcmtn'] = $labeldata['kecmtn'];
    $btn = "Ubah Alamat";
    $btndis = "block";
  } else {
    $_SESSION['ladd_lbl'] = "Tambah alamat dahulu";
    $_SESSION['lname'] = '';
    $_SESSION['lnohp'] = '';
    $_SESSION['lfadd'] = '';
    $_SESSION['lkota'] = '';
    $_SESSION['lkcmtn'] = '';
    $btn = "Tambah Alamat";
    $btndis = "none";
  }
  ?>
  <body class="body">
    <div id="root">
      <div class="page">
        <div class="user" style="display: flex; align-items: center;">
          <img src="<?php if(!$udata['pfp']) {echo ".\img\User.svg";} else {echo $udata['pfp'];} ?>" alt="" style="border-radius: 50%; width: 65px; height: 65px; margin-right: 10px;"/>
          <div>
            <b id="userid"><?php echo $udata['nama'];?></b>
            <p style="margin-bottom: -10px; font-size: 15px;"><?php echo $udata['nohp'];?></p>
            <a href="editacc.php" style="font-size: 15px; color: #317f54;">Profile</a>
            <a href="logout.php" style="font-size: 15px; color: #317f54;">Logout</a>
          </div>
        </div>
        <div class="pts_sy" style="margin-top: 10px;">
          <div class="left">
            <b>Point Saya</b>
            <p></p>
            <div class="pts_sy_rect">
              <b class="pad"><?php echo $udata['u_pts'];?> Pts</b>
              <a href="TukarPoint.php">
                <button class="right" id="tkr_pts">Tukar</button>
              </a>
            </div>
          </div>
        </div>
        <br />
        <div class="almt">
          <div class="left">
            <b>Alamat</b>
            <p></p>
            <div class="almt_rect">
              <div class="almt almt-isi">
                <b><?php echo $_SESSION['ladd_lbl'];?></b>
                <br />
                <br />
                <b><?php echo $_SESSION['lname'];?></b>
                <p><?php echo $_SESSION['lnohp'];?></p>
                <p><?php echo $_SESSION['lfadd'];?></p>
                <p><?php echo $_SESSION['lkota'];?><?php echo $_SESSION['lkcmtn'];?></p>
                <a href="Alamat.php">
                  <button class="almt ubh-btn">
                    <p><?php echo $btn;?></p>
                  </button>
                </a>
                  <a href="routing.php?accmsg=hapus" style="text-decoration: none;">
                    <button class="almt ubh-btn" style="background-color: red; color: white; margin-top: 10px; display: <?php echo $btndis;?>;">
                    <p>Hapus Alamat</p>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="tmh_img"></div>
        &nbsp
        <div class="footer width-control">
          <div class="fbtn nav">
            <button class="nav_btn">
              <a href="Home.php">
                <img src=".\img\Home.svg" />
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
                <img src=".\img\Akun_warna.svg" />
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
