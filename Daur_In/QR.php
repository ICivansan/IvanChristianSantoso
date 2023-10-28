<?php
session_start();

if ($_SESSION['status'] != "login")
{
  header("location:index.php?pesan=belum_login");
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
    <title>QR</title>
  </head>
  <body class="body">
    <div id="root">
      <div class="page">
        <div class="centered">
          <br />
          <b>Scan</b>
          <br />
          <br />
          <br />
          <video id="vidElem" autoplay style="width: 100%"></video>
          <br />
          <br />
          <br />
          <a id="a">
            <img src=".\img\cancel_qr.svg" alt="" />
          </a>
          <button id="conf_qrBtn">
            <img src=".\img\conf_qr.svg" alt="" />
          </button>
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
              <img src=".\img\QR.svg" />
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
  <script>
    var mediaStream;
    document.getElementById("conf_qrBtn").addEventListener("click", startCamera);
    function startCamera() {
      navigator.mediaDevices
        .getUserMedia({ video: true })
        .then(function (stream) {
          var videoElement = document.getElementById("vidElem");
          videoElement.srcObject = stream;
          mediaStream = stream;
        })
        .catch(function (error) {
          console.log("Gagal mengakses kamera: ", error);
        });
    }

    document.getElementById("a").addEventListener("click", stopCamera);
    function stopCamera() {
      if (mediaStream) {
        var tracks = mediaStream.getTracks();

        tracks.forEach(function (track) {
          track.stop();
        });

        mediaStream = null;
      }
    }
  </script>
</html>
