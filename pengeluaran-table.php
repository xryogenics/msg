<?php include "conn.php"; ?>

      <div class="container"  id="containerPengeluaran">
        <div class="row">
          <div class="col-sm-12 text-center">


            <h1>Pengeluaran</h1><br>
              <div class="col">
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#pengeluaran">Tambah</a></br>
              </div>
            <hr><br>

          </div>
          <div class="col">
            <?php
            $TotalPengeluaran = mysqli_query($conn, "SELECT SUM(harga_pengeluaran) as hasil FROM tbl_pengeluaran WHERE date(tanggal) = date(curdate())");

            $TotalPendapatan = mysqli_query($conn, "SELECT SUM(profit)+SUM(ongkos) as hasil FROM `tbl_transaksi` WHERE date(tanggal) = date(curdate())");

            $hasilPendapatan = mysqli_fetch_assoc($TotalPendapatan);
            $hasilPengeluaran = mysqli_fetch_assoc($TotalPengeluaran);

             ?>
          </div>
        </div>
      </div>
  <div class="container">

    <?php
      $query = mysqli_query($conn, "SELECT * FROM `tbl_pengeluaran` where date(tanggal) = date(curdate())");
      foreach ($query as $q) : 
    ?>
    <div class="row">
      <div class="col-auto mr-auto"><?= strtoupper($q["nama_pengeluaran"]); ?></div>
      <div class="col-auto"><?= number_format($q["harga_pengeluaran"]); ?></div><br>
    </div>
    <?php endforeach; ?><hr>

    <div class="row">
      <div class="col-auto mr-auto">TOTAL</div>
      <div class="col-auto">
        -<?= number_format($hasilPengeluaran["hasil"]); ?><br>
        <?= number_format($hasilPendapatan["hasil"]); ?><hr>
        <?= number_format($hasilPendapatan["hasil"]-$hasilPengeluaran["hasil"]); ?>
        
      </div>
    </div>
  </div>