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
    <title>Drop Off</title>
  </head>
  <body class="body">
    <?php
    session_start();
    if($_SESSION['status']!="login") {
      header("location:index.php?pesan=belum_login");
    }
    include_once("config.php");
    $nohp = $_SESSION['nohp'];
    $pwd = $_SESSION['pwd'];
    $valid = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
    $id = mysqli_fetch_array($valid);
    if ($id)
    {
      $drop = mysqli_query($mysqli, "SELECT * FROM trans WHERE user_id='$id[id]' and stat='confirm' ORDER BY id DESC");
      $check = mysqli_query($mysqli, "SELECT * FROM trans WHERE user_id='$id[id]' and stat='confirm' ORDER BY id DESC");
      $cek = mysqli_fetch_array($check);
    } else {
      $cek = '';
    }
    
    $sum = 0;
    $wsum = 0;
    ?>
    <div id="root">
      <div class="page">
        <div class="centered">
          <br />
          <b id="tlt">Drop Off</b>  
        </div>
        <div class="centered">
          <br />
          <a href="TambahSampah.php"><img src=".\img\Tambah.svg" alt="" /> </a>
        </div>
        <br />
        <img src=".\img\Konfirmasi_Drop.svg" alt="" class="left" />
          <?php
          if ($cek)
          {
            $display = "block";
          }
          else  {
            $display = "none";
          }

          echo "<div class='jns_rect' style='display: $display;'>";
            while($disp = mysqli_fetch_array($drop))
            {
              $sum = $sum + $disp['total'];
              $wsum = $wsum + $disp['berat'];
              echo "<p style='padding: 10px 15px; margin: 0px;'>$disp[sampah]</p>
              <p style='padding: 0px 15px; margin: 0px 15px; margin-top: -34px; float: right;'>$disp[berat]</p>";
            }
            echo "<div class='jns_line'>&nbsp</div>
            <p class='left1'>Total Point</p>
            <p class='right1' id='conf_pts' style='display: $display;'>$sum</p>
            <p>&nbsp</p>
          <form action='DropOff.php' method='post' name='dropoff'>
          <div class='centered'>
            <button class='conf_btn' type='submit' name='Submit'>Confirm</button>
          </div>
          </form>
        </div>
        ";
          ?> 
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
                <img src=".\img\Drop off_warna.svg" />
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
  </body>
</html>

<?php
   include_once("config.php");
  
   if(isset($_POST['Submit']))
   {
     $ptsup = $sum;
     $sum = $sum + $id['u_pts'];
     $inc = 1 + $id['income'];
     $input = mysqli_query($mysqli, "UPDATE users SET u_pts ='$sum', income = '$inc', wait='0' WHERE id='$id[id]'");
     $uphis = mysqli_query($mysqli, "INSERT INTO history (user_id, berat, pts) VALUES ('$id[id]', '$wsum', '$ptsup')");
     $purge = mysqli_query($mysqli, "DELETE FROM trans WHERE user_id='$id[id]'");

     Header("Location:DropOff.php");
   }
?>
