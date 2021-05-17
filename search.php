<?php
	include "koneksi.php";

	$search = $_GET['search'];
	$cmd = $_GET['cmd'];	
?>
<script type="text/javascript">
	function f_desc(nama, hargajual, gambar, kodebarang, jumlah_stok, ket){
			location.href = "deskripsi.php?nama="+nama+"&hargajual="+hargajual+"&gambar="+gambar+"&kodebarang="+kodebarang+"&jumlah_stok="+jumlah_stok+"&ket="+ket+"&kodeuser=USER-1&cmd=desc";
	}
</script>
<form action="deskripsi.php" method="GET">
	  	<h3>Hasil Pencarian</h3>
		  <?php 

		  	if($cmd == "search"){
				$sqlsearch = "SELECT tbbarang.kodebarang, tbbarang.nama, tbbarang.hargajual, tbbarang.disc, tbbarang.gambar, tbbarang.jlh_stok, tbbarang.ket FROM tbbarang WHERE tbbarang.nama LIKE '%$search%'";
				$querysearch = mysqli_query($conn, $sqlsearch);
			}
			elseif($cmd == "searchtrend"){
				$sqlsearch = "SELECT tbbarang.kodebarang, tbbarang.nama, tbbarang.hargajual, tbbarang.disc, tbbarang.gambar, tbbarang.jlh_stok, tbbarang.ket FROM tbbarang WHERE tbbarang.jenis = '$search'";
				$querysearch = mysqli_query($conn, $sqlsearch);
			}

		  	$numsearch = mysqli_num_rows($querysearch);
		  	for($x=1; $x<=$numsearch; $x++){
		  		$resultsearch = mysqli_fetch_array($querysearch);
		  		$kodebarang = $resultsearch['kodebarang'];
		  		$nama = $resultsearch['nama'];
		  		$hargajual = $resultsearch['hargajual'];
		  		$disc = $resultsearch['disc'];
		  		$gambar = $resultsearch['gambar'];
		  		$jlh_stok = $resultsearch['jlh_stok'];
		  		$ket = $resultsearch['ket']
		  ?>
		  <div onclick="f_desc(<?php echo "'$nama', '$hargajual', '$gambar', '$kodebarang', '$jumlah_stok', '$ket'";?>)" class="terlaris_prod">
		  	<input type="hidden" id="kb_1" value="<?php echo $kodebarang;?>">
		  	<input type="hidden" id="kg_1" value="<?php echo $gambar;?>">
		  	<div class="produk_terlaris">
		  	<div class="col-lg-2 float-start">
		  		<div class="card" style="width: 14rem; height: 344px; margin-top: 20px;">
				  <img class="card-img-top" src="css/image/<?php echo $gambar;?>" alt="Card image cap">
				  <div class="card-body">
				    <p class="card-text" id="nama"><?php echo $nama;?></p>
				    <b><?php echo $hargajual;?></b>
				  </div>
				</div>
		  	</div>
		  	</div>
		  </div>
		  
		  <?php 
			}
		  ?>
</form>