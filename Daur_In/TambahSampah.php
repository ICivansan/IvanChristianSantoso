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
    <title>Tambah Sampah</title>
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
    $data = mysqli_query($mysqli, "SELECT * FROM users WHERE nohp='$nohp' and sandi='$pwd'");
    $udata = mysqli_fetch_array($data);
    $id = $udata['id'];
    $result = mysqli_query($mysqli, "SELECT f_add FROM alamat WHERE user_id='$id'");
    $fres = mysqli_fetch_array($result);
    if ($fres)
    {
      $_SESSION['fdisp'] = $fres['f_add'];
    } else {
      $_SESSION['fdisp'] = "-";
    }  

    $trans = mysqli_query($mysqli, "SELECT * FROM trans WHERE user_id='$id' and stat='not' ORDER BY id DESC");
    $transs = mysqli_query($mysqli, "SELECT * FROM trans WHERE user_id='$id' and stat='not' ORDER BY id DESC");
    $cek = mysqli_fetch_array($transs);
    $dis = "block";
    ?>
    <div id="root">
      <div class="page">
        <div class="ds_flex">
          <a href="DropOff.php">
            <img id="back" src=".\img\Back.svg" />
          </a>
          <p id="tlt2">Tambah Sampah</p>
        </div>
        <div class=""></div>
        <div class="ts">
          <b class="left">Alamat Pengambilan</b>
          <a href="Alamat.php">
            <button id="ubahAlamat_btn" class="right">Ubah</button>
          </a>
          <br />
          <p class="left"><?php echo $_SESSION['fdisp'];?></p>
          <b class="left">Jenis Sampah</b>
          <a href="JenisSampah.php">
            <button id="JnsSampah_btn" class="right">Tambah</button>
          </a>
        </div>
        <br />
        <?php
        if ($cek)
        {
          $dis = "block";
        } else{
          $dis = "none";
        }

          while($display = mysqli_fetch_array($trans))
          {
            $pts = $display['total'] / $display['berat'];
            echo "<div class='jns_rect'>
            <br />
            <div class='left'>
              <div class='pls_rect'>
                <div class='txt_center'>
                  <b>$display[sampah]</b>
                </div>
              </div>
              <button type='submit' class='edit_btn' style='color: black; text-decoration: none; font-size: 16px;' id='klik$display[id]'>Hapus</button>
            </div>
            <script>
              var klik = document.getElementById('klik$display[id]');
              klik.addEventListener('click', konfirm);
              function konfirm(Event)
              {
                var text = confirm('Apakah Anda yakin ingin menghapus item?');
                if (text)
                {
                  window.location.href = 'delete.php?id=$display[id]';
                } else {
                }
              }
            </script>
            <br />
            <div>
              <b class='left'>Harga</b>
              <p id='hrg-smph' class='clr-txt'> $pts Pts/Kg</p>
              <br />
              <p class='left' id='clr-txt'>Berat</p>
              <p id='brt-smph'>$display[berat] Kg</p>
              <p class='left' id='clr-txt'>Total</p>
              <b id='ttl-pts'>$display[total] Pts</b>
              <br />
            </div>
          </div> <br /> ";
          }
          echo "<form action='sttrans.php' method='post' name='konfirm'>";
          echo "<div class='centered' style='display: $dis;'>
          <button type='submit' id='setor_btn' name='Setor' class='btn_gr'>Setorkan</button>
        </div>
        <div class='tmh_img'></div>
        &nbsp";
        echo "</form>";
        ?>
      </div>
    </div>
  </body>
</html>
