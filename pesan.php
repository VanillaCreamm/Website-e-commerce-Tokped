<?php 
	include "koneksi.php";

	$no = $_GET['no'];
	$kodebarang = $_GET['kodebarang'];
	$jlh = $_GET['jlh'];
	$harga = $_GET['harga'];
	$total = $_GET['total'];

	$sqlpesan = "INSERT INTO tempjualdetil (no, kodebarang, jlh, harga, total) VALUES('$no', '$kodebarang', '$jlh', '$harga', '$total')";
	$querypesan = mysqli_query($conn, $sqlpesan);
?>