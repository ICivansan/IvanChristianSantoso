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
    <title>Riwayat</title>
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
      $valid = mysqli_query($mysqli, "SELECT id FROM users WHERE nohp='$nohp' and sandi='$pwd'");
      $id = mysqli_fetch_array($valid);

      $history = mysqli_query($mysqli, "SELECT * FROM history WHERE user_id='$id[id]' ORDER BY id DESC");
      $cekhis = mysqli_query($mysqli, "SELECT * FROM history WHERE user_id='$id[id]' ORDER BY id DESC");
      $valhis = mysqli_num_rows($cekhis);
    ?>
    <div id="root">
      <div class="page">
        <div class="ds_flex">
          <a href="Home.php">
            <img id="back" src=".\img\Back.svg" />
          </a>
          <p id="tlt5">Riwayat</p>
        </div>
        <?php
        if($valhis) {
          while ($display = mysqli_fetch_array($history))
        {
          echo "<div class='jns_rect'>
          <div class='left'>
            <div class='success'>
              <p class='txt_center' id='success_txt'>Berhasil</p>
            </div>
          </div>
          <p class='left1'>$display[nama]</p>
          <p class='right3'>$display[berat] kg</p>
          <p>&nbsp</p>
          <br />
          <div class='jns_line'>&nbsp</div>
          <p class='left1'>Total Point</p>
          <p class='right1' id='conf_pts'>$display[pts] pts</p>
          <br />
          &nbsp
        </div>";
        }
        } else {
          echo "<p style='text-align: center;'>Anda belum memiliki transaksi</p>";
        }
        ?>
        <div class="tmh_img"></div>
        &nbsp
      </div>
    </div>
  </body>
</html>
