<?php
session_start();
$nohp = $_SESSION['nohp'];
$pwd = $SESSION['pwd'];
include_once("config.php");

if($_SESSION['status']!="login") {
    header("location:index.php?pesan=belum_login");
  }

if(isset($_POST["submit"])) {
    $postpwd = $_POST["sandi"];

    if ($postpwd != $pwd)
    {
        header("location:editacc.php?msg=pwd");
    }

    $targetDir = "img/"; // Direktori tempat menyimpan gambar yang diunggah
    $targetFile = $targetDir . basename($_FILES["gbr"]["name"]); // Nama file yang diunggah beserta path
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Periksa apakah file gambar atau bukan
    $check = getimagesize($_FILES["gbr"]["tmp_name"]);
    if($check !== false) {
        echo "File adalah gambar - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Batasi jenis file yang diperbolehkan
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Periksa apakah terjadi kesalahan saat unggah
    if ($uploadOk == 0) {
        echo "Maaf, file tidak dapat diunggah.";
    } else {
        if (move_uploaded_file($_FILES["gbr"]["tmp_name"], $targetFile)) {
            $img = "./img/" . basename($_FILES["gbr"]["name"]);
            $upimg = mysqli_query($mysqli, "UPDATE users SET pfp='$img' WHERE nohp='$nohp'");
            header("location:Akun.php");
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>