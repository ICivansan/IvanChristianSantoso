<?php
session_start();
include_once("config.php");
$nohp = $_SESSION['nohp'];
$pwd = $_SESSION['pwd'];

if (isset($_POST['Submit'])) {
    $name = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $pwd = $_POST['sandi'];
    $cname = trim($name);
    $cnohp = trim($nohp);
    $cpwd = trim($pwd);
    $gdata = mysqli_query($mysqli, "SELECT * FROM users WHERE  nohp='$nohp'");
    $cek = mysqli_num_rows($gdata);
    if ($cek)
    {
        header("Location:register.php?msg=cek");
    } else if (strlen($name) > 100)
    {
        header("Location:register.php?msg=nama");
    } else if (strlen($nohp) > 15)
    {
        header("Location:register.php?msg=nohp");
    } else if (strlen($pwd) > 20) {
        header("Location:register.php?msg=pwd");
    } else if (strlen($name) <= 1 || strlen($nohp) < 12 || strlen($pwd) < 8) {
        header("Location:register.php?msg=kur");
    } else if(empty($cname) || empty($cnohp) || empty($cpwd)) {
        header("Location:register.php?msg=kos");
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO users(nama, nohp, sandi) VALUES ('$name', '$nohp', '$pwd')");

        header("Location:index.php");
    }
}

if (isset($_POST['Alamat'])) {
    $add_name = $_POST['nama'];
    $add_label = $_POST['label'];
    $add_nohp = $_POST['nohp'];
    $add_kota = $_POST['kota'];
    $add_kcmtn = $_POST['kcmtn'];
    $add_falamat = $_POST['falamat'];
    $nohp = $_SESSION['nohp'];
    $fdata = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp'");
    $id = mysqli_fetch_array($fdata);
    $cadd_name = trim($add_name);
    $cadd_label = trim($add_label);
    $cadd_nohp = trim($add_nohp);
    $cadd_kota = trim($add_kota);
    $cadd_kcmtn = trim($add_kcmtn);
    $cadd_falamat = trim($add_falamat);
    $cek = mysqli_query($mysqli, "SELECT * FROM alamat WHERE user_id='$id[id]'");
    $ceks = mysqli_fetch_array($cek);
    if (empty($cadd_name) || empty($cadd_label) || empty($cadd_nohp) || empty($cadd_kota) || empty($cadd_kcmtn) || empty($cadd_falamat))
    {
        header("Location:Alamat.php?msg=kos");
    } else if ($ceks) {
        $purge = mysqli_query($mysqli, "DELETE FROM alamat WHERE user_id='$id[id]'");
        $result = mysqli_query($mysqli, "INSERT INTO alamat(user_id, label_add, nama, nohp, f_add, kota, kecmtn) VALUES ('$id[id]', '$add_label', '$add_name', '$add_nohp', '$add_falamat', '$add_kota', '$add_kcmtn')");
        header("Location:Akun.php");  
    } else {
      $result = mysqli_query($mysqli, "INSERT INTO alamat(user_id, label_add, nama, nohp, f_add, kota, kecmtn) VALUES ('$id[id]', '$add_label', '$add_name', '$add_nohp', '$add_falamat', '$add_kota', '$add_kcmtn')");
      header("Location:Akun.php");
    }
  }

  if(isset($_GET['accmsg']))
  {
    if($_GET['accmsg'] == "hapus")
    {
        $getid = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp'");
        $ids = mysqli_fetch_array($getid);

        $delete = mysqli_query($mysqli, "DELETE FROM alamat WHERE user_id='$ids[id]'");
        header("location:akun.php");
    }
  }
?>