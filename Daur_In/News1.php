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
        <div class="ds_flex">
          <a href="News.php">
            <img id="back" src=".\img\Back.svg" />
          </a>
          <p id="tlt7">News</p>
        </div>
        <div class="centered">
          <img src=".\img\News1.svg" alt="" class="news1_img" />
        </div>
        <div class="news">
          <b>JawaPos.com</b>
          <p class="news_txt">
            Danone Aqua bekerjasama dengan Alfamart dan gerakan sosial
            PlasticPay meluncurkan Reverse Vending Machine (RVM) atau Mesin
            Penukaran Botol plastik pascakonsumsi. Mesin ini diciptakan untuk
            mengajak masyarakat ikut mengelola sampah botol plastik bekas.
            <br />
            <br />
            Untuk tahap pertama, RVM ini akan ditempatkan di lima toko Alfamart
            di Jakarta dan Tangerang. Nantinya, masyarakat bisa memasukkan
            botol-botol plastik bekas ke dalam mesin ini. Kemasan botol plastik
            yang terkumpul kemudian akan diolah menjadi plastik PET daur ulang
            yang digunakan kembali sebagai bahan baku di seluruh kemasan botol
            Aqua.
            <br />
            <br />
            Melalui RVM ini, masyarakat diajak mengumpulkan kemasan botol
            plastik paska konsumsi melalui empat langkah mudah.
            <br />
            <br />
            Pertama, mengunduh aplikasi PlasticPay pada smartphone dan melakukan
            registrasi. Kemudian membawa kemasan botol plastik PET pascakonsumsi
            ke lokasi RVM terdekat.
            <br />
            <br />
            Masyarakat harus memindai barcode pada botol plastik sebelum
            memasukkannya ke dalam mesin RVM. Terakhir, konsumen cukup memindai
            QRCODE yang muncul pada mesin menggunakan aplikasi PlasticPay,
            diakhiri dengan mengklik 'AmbilPoin' pada aplikasi PlasticPay.
            <br />
            <br />
            “Gerakan ini selain bertujuan untuk mendukung ambisi pemerintah
            mengurangi sampah plastik yang masuk ke lautan sebesar 70 persen di
            2025.,” kata VP General Secretary Danone Indonesia, Vera Galuh
            Sugijanto dalam keterangan resminya.
            <br />
            <br />
            Vera menuturkan, pihaknya akan selalu berinovasi untuk memudahkan
            masyarakat dalam mengumpulkan kemasan botol plastik pascakonsumsi.
            "Juga untuk mengedukasi pentingnya pengelolaan sampah plastik yang
            berkelanjutan,” tambahnya.
            <br />
            <br />
            Sementara itu, Corporate Affairs Director Alfamart Solihin
            mengatakan bahwa keberadaan RVM ini diyakini bisa dimanfaatkan untuk
            mengedukasi masyarakat sekaligus memberi kemudahan dalam berperan
            aktif mendukung pengelolaan sampah plastik.
            <br />
            <br />
            "Kami sangat bangga bisa menjad pelopor daur ulang kemasan botol
            plastik pascakonsumsi lewat vending machine ini,” katanya.
            <br />
            <br />
            CEO PlasticPay Suhendra Setiadi merinci, seluruh kemasan botol
            plastik yang terkumpul dalam RVM akan diambil oleh mitra pengumpul
            sampah plastik Danone Aqua, dan langsung di bawa ke RBU (Recycle
            Business Unit) binaan yang berada di 6 lokasi, termasuk di Jakarta
            dan Tangerang Selatan. Suhendra juga menjelaskan sistem poin yang
            bisa didapatkan masyarakat yang berpartisipasi.
            <br />
            <br />
            "Untuk kemasan botol plastik PET pascakonsumsi dengan merk Aqua
            diberikan reward 100 poin per botol, sementara untuk botol PET bekas
            merk lain mendapat reward 50 poin per botolnya. Poin-poin yang
            diperoleh dari setiap pengumpulan sampah botol plastik dapat
            ditukarkan dengan Gopay, Dana, LinkAja, OVO, Shopeepay, dan juga
            sedang diproses untuk bisa ditukarkan dengan Alfagift Points,"
            katanya.
            <br />
            <br />
            Dengan mekanisme ini, lanjutnya, RVM diharapkan dapat menjadi salah
            satu solusi untuk mendorong masyarakat untuk mengumpulkan kemasan
            botol plastik dan mengurangi sampah plastik yang tidak terkumpul dan
            terkelola dengan benar.
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
