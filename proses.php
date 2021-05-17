<?php 
	session_start();
	include "koneksi.php";

	$no_jual = $_GET['no_jual'];
	$tgl = $_GET['tgl'];
	$kodeuser = $_GET['kodeuser'];
	$subtotal = $_GET['total'];
	$ongkir = $_GET['ongkir'];
	$grand = $_GET['grand'];
	$metode = $_GET['metode'];

	if($metode == "cod"){
		$sql = "INSERT INTO tbpembayaran (total, metode, status, kodeuser, bukti_pembayaran) VALUES('$grand', 'cod', 'lunas', '$kodeuser', '')";
		$query = mysqli_query($conn, $sql);

		header('Location: hometokomu.php');
	}
	else{
		$sql = "INSERT INTO tbpembayaran (total, metode, status, kodeuser, bukti_pembayaran) VALUES('$grand', 'transfer', 'belum lunas', '$kodeuser', '')";
		$query = mysqli_query($conn, $sql);
	}

	$sql1 = "SELECT * FROM tempjualdetil WHERE no='$no_jual'";
	$query1 = mysqli_query($conn, $sql1);

	$num1 = mysqli_num_rows($query1);
	for($x=1; $x<=$num1; $x++){
		$result1 = mysqli_fetch_array($query1);
		$no = $result1['no'];
		$kodebarang = $result1['kodebarang'];
		$jlh = $result1['jlh'];
		$harga = $result1['harga'];
		$total = $result1['total'];

		$sql2 = "INSERT INTO tbjualdetil (no, kodebarang, jlh, harga, total) VALUES('$no', '$kodebarang', '$jlh', '$harga', '$total')";
	    $query2 = mysqli_query($conn, $sql2);

	    $sql3 = "SELECT * FROM tbbarang WHERE kodebarang='$kodebarang'";
	    $query3 = mysqli_query($conn, $sql3);
	    $row3 = mysqli_fetch_array($query3);
	    $jlhstok = $row3['jlh_stok'];

	    $stokbaru = $jlhstok - $jlh;

	    $sql4 = "UPDATE tbbarang set jlh_stok='$stokbaru' WHERE kodebarang='$kodebarang'";
	    $query4 = mysqli_query($conn, $sql4);
	}

	$sql5 = "INSERT INTO tbjual (no, tgl, kodeuser, subtotal, ongkir, grandtotal) VALUES ('$no_jual', '$tgl', '$kodeuser', '$subtotal', '$ongkir', '$grand')";
	$query5 = mysqli_query($conn, $sql5);

	$sql6 = "DELETE FROM tempjualdetil WHERE no='$no_jual'";
	$query6 = mysqli_query($conn, $sql6);

	header('Location: pembayaran.php');
?>