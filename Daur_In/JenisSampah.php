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
    <title>Jenis Sampah</title>
  </head>
  <body class="body">
    <?php
    session_start();
    if($_SESSION['status']!="login") {
      header("location:index.php?pesan=belum_login");
    }
    ?>
    <div id="root">
      <div class="page">
        <div class="ds_flex">
          <a href="TambahSampah.php">
            <img id="back" src=".\img\Back.svg" />
          </a>
          <p id="tlt3">Jenis Sampah</p>
        </div>
        <div class="centered">
          <br />
          <a href=".\jenis\Plastik.html"><img src=".\img\Plastik.svg" alt="" /></a>
          <a href=".\jenis\Kertas.html"><img src=".\img\Kertas.svg" alt="" /></a>
          <a href=".\jenis\Botol.html"><img src=".\img\Botol.svg" alt="" /></a>
          <a href=".\jenis\Logam.html"><img src=".\img\Logam.svg" alt="" /></a>
        </div>
        <div class="tmh_img"></div>
        &nbsp
      </div>
    </div>
  </body>
</html>
