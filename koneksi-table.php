<?php
include "conn.php"; 
$tanggal = date("Y-m-d");


    if (isset($_POST["namaplg"])) {
      $tbl_plg = mysqli_query($conn, "SELECT * FROM tbl_plg");

    foreach ($tbl_plg as $t) {
      $id = $t["id"];
      $namaplg = $t["namaplg"];
      $ongkos = $t["ongkos"];
      $NetProfit = $t["profit"] - $ongkos;

      if ($_POST["namaplg"] == $id) {
        mysqli_query($conn, "INSERT INTO `tbl_transaksi` (`id`, `namaplg`, `tanggal`, `ongkos`, `profit`) 
                            VALUES ('', '$namaplg', '$tanggal', '$ongkos', '$NetProfit');");

        echo '<div class="alert alert-success" role="alert" style="position: fixed;z-index: 100000000000000;margin: 10%;box-shadow: 1px 0px 100px 1px;">
                <h4 class="alert-heading text-center">SUCCESS</h4>
                <hr>
                <p class="text-center">'.$namaplg.' BERHASIL DI TAMBAHKAN!</p>
              </div>';
      }

    }
}

if (isset($_POST["namaManual"])) {
    $tbl_manual = mysqli_query($conn, "SELECT * FROM tbl_plg WHERE pembayaran = 'manual'");

  foreach($tbl_manual as $tm){

    $modalInput = $_POST['modalInput'];
    $profitManual = $_POST["profitManual"];
    $namaManual = strtolower($tm["namaplg"]);
    $ongkirManual = $tm["ongkos"];
    $NetProfit = $profitManual - $modalInput - $ongkirManual;
    $profitManual = $profitManual - $ongkirManual;

      if($_POST["namaManual"] == $namaManual){
      mysqli_query($conn, "INSERT INTO `tbl_transaksi` (`id`, `namaplg`, `tanggal`, `ongkos`, `profit`) 
                                VALUES ('', '$namaManual', '$tanggal', '$ongkirManual', '$NetProfit');");

        echo '<div class="alert alert-success" role="alert" style="position: fixed;z-index: 100000000000000;margin: 10%;box-shadow: 1px 0px 100px 1px;">
                <h4 class="alert-heading text-center">SUCCESS</h4>
                <hr>
                <p class="text-center">'.$namaManual.' BERHASIL DI TAMBAHKAN!</p>
              </div>';
      }

    }

  }



if (isset($_POST["namaPengeluaran"])) {

  $namaPengeluaran = $_POST["namaPengeluaran"];
  $hargaPengeluaran = $_POST["hargaPengeluaran"];
  $tanggalManual = date("Y-m-d");

  mysqli_query($conn, "INSERT INTO tbl_pengeluaran (id,tanggal,nama_pengeluaran,harga_pengeluaran)
                        VALUES('','$tanggalManual','$namaPengeluaran','$hargaPengeluaran')");

    echo 'Success! '.$namaPengeluaran.'
              Berhasil Di Tambahkan!';
}

if (isset($_POST["listNama"])) {
  $nama = $_POST["listNama"];
  echo "OK".$nama;
}
 ?>