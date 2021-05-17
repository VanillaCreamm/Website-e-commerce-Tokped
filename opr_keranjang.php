<?php 
	include "koneksi.php";

	$notemp = $_GET['notemp'];
	$jlhlama = $_GET['jlhlama'];
	$jlh = $_GET['jlh'];
	$opr = $_GET['opr'];
	$harga = $_GET['harga'];
	$total = $_GET['total'];

	if($opr == "tambah"){
		$jlh += 1;
		
		$totaltbh = $total + $harga;
		$sqlopr = "UPDATE tempjualdetil SET jlh='$jlh', total='$totaltbh' WHERE jlh='$jlhlama' AND notemp='$notemp'";
		$queryopr = mysqli_query($conn, $sqlopr);
		echo $sqlopr;
	}

	elseif($opr == "kurang"){
		$jlh -= 1;

		$totalkrg = $total - $harga;

		$sqlopr = "UPDATE tempjualdetil SET jlh='$jlh', total='$totalkrg' WHERE jlh='$jlhlama' AND notemp='$notemp'";
		$queryopr = mysqli_query($conn, $sqlopr);
		echo $sqlopr;
	}

?>