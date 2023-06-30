<?php 
include "conn.php";

//hapus transaksi
if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$delete = mysqli_query($conn, "DELETE FROM tbl_transaksi where id = $id");
	// header('Location: edit.php');
	echo "<script>window.location.href = 'edit.php';</script>";

}else{
	echo "gagal hapus";
}

//hapus daftar nama pelanggan
if (isset($_GET['idnamaplg'])) {
	
	$id = $_GET["idnamaplg"];
	$sql = mysqli_query($conn, "DELETE FROM tbl_plg where id = $id");
	// header('Location: customer.php');
	echo "<script>window.location.href = 'customer.php';</script>";
}else{
	echo "gagal hapus";
}

 ?>