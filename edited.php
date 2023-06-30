<?php 
include "header.php";

if (isset($_POST["submit"])) {
	$id = $_GET["id"];
	$nama = $_POST["nama"];
	$tanggal = $_POST["tanggal"];
	$ongkos = $_POST["ongkir"];
	$profit = $_POST["profit"];
	mysqli_query($conn, "UPDATE `tbl_transaksi` 
							SET `id` = '$id', `namaplg` = '$nama', `tanggal` = '$tanggal', `ongkos` = '$ongkos', `profit` = '$profit' 
							WHERE `tbl_transaksi`.`id` = $id;");
	echo "<script>window.location = 'edit.php'</script>";
}else{
	echo "fail";
}

 ?>

 <br><br>

<h1 class='text-center'>EDIT DATA</h1>
 <div id="content">
 	<div class="container form-group">
 		<?php
 		$id = $_GET['id']; 
 		$query = mysqli_query($conn, "SELECT * FROM tbl_transaksi where id = $id ");
 		$row = mysqli_fetch_assoc($query);
 		 ?>
 		<form action="" method="post"><br>
 			<label for="nama">Nama Pelanggan:</label>
 			<input type="text" id="nama" name="nama" class="form-control" value="<?= $row['namaplg']; ?>">
 			<label for="tanggal">Tanggal:</label>
 			<input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $row['tanggal']; ?>">
 			<label for="profit">Profit:</label>
 			<input type="number" id="profit" name="profit" class="form-control" value="<?= $row['profit']+$row['ongkos']; ?>">
 			<label for="ongkir">Ongkir:</label>
 			<input type="number" id="ongkir" name="ongkir" class="form-control" value="<?= $row['ongkos']?>"><br>
 			<button type="submit" name="submit" class="btn btn-primary">EDIT</button>
 			<a href="#" class="btn btn-danger" onclick="hapusTransaksi(<?= $_GET["id"]; ?>);">HAPUS</a>
 		</form>
 	</div>
 </div>

 <script>
 	function hapusTransaksi(id){
 		var tanya = confirm("Yakin Mau Di Hapus???");

 		if (tanya === true) {
 			window.location.href = "delete.php?id="+id;
 		}
 	};
 </script>

 <?php 
include "footer.php";
 ?>