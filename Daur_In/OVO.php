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
    <title>OVO</title>
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
    include_once("config.php");
    $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
    $udata = mysqli_fetch_array($data);
    $id = $udata['id'];

    if (isset($_POST['Submit']))
    {
      $nomor = $_POST['nomor'];
      $cek = trim($nomor);

      if ($udata['u_pts'] != 0) {
        $update = mysqli_query($mysqli, "UPDATE users SET u_pts='0' WHERE id='$id'");
      } else if(empty($cek)) {
        echo "<script>
              alert('Masukkan nomor Anda');
              </script>";
      }else {
        echo "<script>
              alert('Poin Anda belum mencukupi!');
              </script>";
      }
    }
    ?>
    <div id="root">
      <div class="page">
        <div class="ds_flex">
          <a href="TukarPoint.php">
            <img id="back" src=".\img\Back.svg" />
          </a>
          <p id="tlt7">OVO</p>
        </div>
        <br />
        <div class="centered">
        <form action="OVO.php" method="post" name="ovo">
          <div class="isi">
            <p>Nomor OVO</p>
            <input
              id="no_gopay_Txb"
              class="txb"
              name="nomor"
              type="text"
              placeholder="  Masukkan nomor OVO Anda"
              required
            />
            <br />
            <button type="submit"
              name="Submit"
              value="Konfirmasi"
              id="konfirmasi_gopay_btn"
              class="btn_konfirm">Konfirmasi</button>
          </div>
          </form>
        </div>

        <div class="tmh_img"></div>
        &nbsp
      </div>
    </div>
  </body>
</html>
