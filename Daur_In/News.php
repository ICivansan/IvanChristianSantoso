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
    <title>News</title>
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
        <div class="centered">
          <br />
          <b id="tlt">News</b>
        </div>
        <div class="news">
          <a href="News1.php">
            <button id="news_btn">
              <div class="ds_flex">
                <img src=".\img\News.svg" alt="" id="news_img" />
                <div class="news_txt">
                  <b
                    >Ajak Masyarakat Kelola Sampah Lewat Reverse Vending
                    Machine</b
                  >
                  <br />
                  <br />
                  <p class="news_pub">JawaPos.com</p>
                </div>
              </div>
            </button>
          </a>
          <div class="tmh_img"></div>
        </div>
        <div class="footer width-control">
          <div class="fbtn nav">
            <button class="nav_btn">
              <a href="Home.php">
                <img src=".\img\Home.svg" />
              </a>
            </button>
            <button class="nav_btn">
              <a href="News.php">
                <img src=".\img\Pick Up_warna.svg" />
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
  </body>
</html>
