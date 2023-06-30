<?php 
include "header.php";
$namaBulan = mysqli_query($conn, "SELECT DISTINCT month(tanggal) as bulan FROM tbl_transaksi");
 ?>
<br><br><br>

<h1 class="text-center">Recap Data</h1>

<?php foreach($namaBulan as $bulan):?>
<div class="container">
	<div class="row">
		<div class="col">		
			<div class="alert alert-primary">
				<?php
					$date = date_create_from_format('m', $bulan['bulan']);
					echo date_format($date, 'F');
				?>
			</div>
		</div>
	</div>
</div>

<?php endforeach; ?>



 <?php 
include "footer.php";
  ?>