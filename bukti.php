<?php 
	include "koneksi.php";

	$bukti = $_GET['bukti'];
	$kodeuser = $_GET['kodeuser'];

	$sqlbyr = "SELECT * FROM tbpembayaran";
	$querybyr = mysqli_query($conn, $sqlbyr);

	$resultbyr = mysqli_fetch_array($querybyr);
	$bukti_pembayaranlama = $resultbyr['bukti_pembayaran'];

	if($bukti_pembayaranlama == ''){
		$sql = "UPDATE tbpembayaran SET bukti_pembayaran='$bukti', status='lunas' WHERE kodeuser='$kodeuser'";
		$query = mysqli_query($conn, $sql);
	}
	
?>