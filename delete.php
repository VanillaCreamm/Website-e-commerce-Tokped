<?php 
	include "koneksi.php";

	$notemp = $_GET['notemp'];

	$sqldel = "DELETE FROM tempjualdetil WHERE notemp='$notemp'";
	$querydel = mysqli_query($conn, $sqldel);
?>