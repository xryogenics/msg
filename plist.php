<?php 
include "header.php" 

?>
<br>
<div class="container">

    <section id="printout">
     <h1 class="text-center">Pengeluaran Hari ini</h1>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">

              <div class="col">
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
</section><br><br>

<h1 class="text-center">List Pengeluaran</h1>
<table class="table table table-striped">
	<tr class="bg-danger" style="color: white">
		<th>Pengeluaran</th>
		<th>Nominal</th>
		<th>Tanggal</th>
	</tr>
	<?php 
	$query = mysqli_query($conn, "SELECT * FROM tbl_pengeluaran");
	foreach ($query as $q) : ?>
	<tr>
		<td><?= strtoupper($q["nama_pengeluaran"]); ?></td>
		<td><?= number_format($q["harga_pengeluaran"]); ?></td>
		<td><?= $q["tanggal"]; ?></td>
	</tr>
<?php endforeach; ?>
</table>


</div>

<?php 
include "footer.php" 

?>