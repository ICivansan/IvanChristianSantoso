<?php
    session_start();
    include_once("config.php");

    if(isset($_POST['Plastik']))
    {
      $berat = $_POST['berat'];
      $point = $_POST['points'];
      $sampah = "Plastik";
      $nohp = $_SESSION['nohp'];
      $pwd = $_SESSION['pwd'];
      $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
      $udata = mysqli_fetch_array($data);
      $id = $udata['id'];

      $send = mysqli_query($mysqli, "INSERT INTO trans (user_id, berat, total, sampah) VALUES ('$id', '$berat', '$point', '$sampah');");
      header("Location:TambahSampah.php");
    }

    if(isset($_POST['Botol']))
    {
      $berat = $_POST['berat'];
      $point = $_POST['points'];
      $sampah = "Botol";
      $nohp = $_SESSION['nohp'];
      $pwd = $_SESSION['pwd'];
      $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
      $udata = mysqli_fetch_array($data);
      $id = $udata['id'];

      $send = mysqli_query($mysqli, "INSERT INTO trans (user_id, berat, total, sampah) VALUES ('$id', '$berat', '$point', '$sampah');");
      header("Location:TambahSampah.php");
    }

    if(isset($_POST['Kertas']))
    {
      $berat = $_POST['berat'];
      $point = $_POST['points'];
      $sampah = "Kertas";
      $nohp = $_SESSION['nohp'];
      $pwd = $_SESSION['pwd'];
      $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
      $udata = mysqli_fetch_array($data);
      $id = $udata['id'];

      $send = mysqli_query($mysqli, "INSERT INTO trans (user_id, berat, total, sampah) VALUES ('$id', '$berat', '$point', '$sampah');");
      header("Location:TambahSampah.php");
    }

    if(isset($_POST['Logam']))
    {
      $berat = $_POST['berat'];
      $point = $_POST['points'];
      $sampah = "Logam";
      $nohp = $_SESSION['nohp'];
      $pwd = $_SESSION['pwd'];
      $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
      $udata = mysqli_fetch_array($data);
      $id = $udata['id'];

      $send = mysqli_query($mysqli, "INSERT INTO trans (user_id, berat, total, sampah) VALUES ('$id', '$berat', '$point', '$sampah');");
      header("Location:TambahSampah.php");
    }

    if(isset($_POST['Setor']))
    {
        $stat = "confirm";
        $nohp = $_SESSION['nohp'];
        $pwd = $_SESSION['pwd'];
        $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
        $udata = mysqli_fetch_array($data);
        $id = $udata['id'];
        $trs = 1 + $udata['trs'];
        $update = mysqli_query($mysqli, "UPDATE users SET wait='1', trs='$trs' WHERE nohp='$nohp' and sandi='$pwd'");
        $send = mysqli_query($mysqli, "UPDATE trans SET stat='$stat' WHERE user_id='$id'");
        header("Location:TambahSampah.php");
    }
    ?>