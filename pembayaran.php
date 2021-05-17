<?php 
	session_start();
	include "koneksi.php";

	$sql = "SELECT * FROM tbjual INNER JOIN tbpembayaran USING(kodeuser)";
	$query = mysqli_query($conn, $sql);

	$result = mysqli_fetch_array($query);
	$no = $result['no'];
	$tgl = $result['tgl'];
	$total = $result['total'];
	$metode = $result['metode'];
	$status = $result['status'];
	$kodeuser = $result['kodeuser'];
	$bukti_pembayaran = $result['bukti_pembayaran'];

	$sqlbyr = "SELECT * FROM tbpembayaran";
	$querybyr = mysqli_query($conn, $sqlbyr);

	$resultbyr = mysqli_fetch_array($querybyr);
	$status = $resultbyr['status'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
	function f_load(){
		location.href = "pembayaran.php";
	}

	function f_bukti(image){
		var status = document.getElementById('status').value;
		var kodeuser = document.getElementById('kodeuser').value;
		var bukti = document.getElementById('bukti');

		if(status == "lunas"){
			bukti.style.display = "none";
		}
		else{
			var link = "bukti.php?bukti="+image+"&kodeuser="+kodeuser;

			alert(link);

			var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
			    	if (this.readyState == 4 && this.status == 200) {
			    		f_load();
			    	}
				};
			xhttp.open("GET", link, true);
			xhttp.send();
		}

		
	}
</script>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}

	.margin_div{
		margin-left: 30px;
		margin-right: 30px;
	}

	.btn_search{
		border-radius: 0 5px 5px 0;
		background-color: #777;
	}
	.form-control{
		border-radius: 5px 0 0 5px;
	}

	.btn_keranjang{
		margin-left: 30px;
	}

	.btn_masuk{
		margin-left: 20px;
		margin-right: 10px;
		background-color: white;
		border: 1px solid #1eafed;
		color: #1eafed;
	}

	.btn_daftar{
		color: white;
		background-color: #1eafed;
	}

	.carousel-item{
		background: #777;
	}

	.prod{
		border: 1px solid rgba(0,0,0,.125);
		padding: 5px;
		border-radius: 15px;
		height: 110px;
		width: 350px;
	}

	.prod_trend{
		height: 130px;
	}

	.prod img{
		border-radius: 10px;
		margin-right: 20px;
	}

	.div_produk{
		width: 100%;
	}

	.terlaris_prod{
		cursor: pointer;
	}

	.pembayaran{
		margin-top: 50px;
		padding: 10px;
		border: 3px solid black;
		border-radius: 15px;
	}
</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-right: 30px;">
	  <div class="container-fluid">
	    <a class="navbar-brand ml-4 brand_toko" style="margin-left: 30px; color: #1eafed;" href="hometokomu.php"><b>Tokomu</b></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	      </ul>
	        <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="search_input">
	        <button class="btn btn-danger btn_search" type="submit" onclick="f_search()"><i class="fas fa-search"></i></button>
	        
	        <a href=""></a>

	        <?php 
	        	if(!isset($_SESSION['username'])){
	        		?>
	        		<a href="logintokomu.php"><button class="btn btn-success btn_masuk" type="masuk">Masuk</button></a>
	        		<button class="btn btn-success btn_daftar" type="daftar">Daftar</button>
	        		<?php
	        	}
	        	else{
	        		?>
	        		<a href="keranjang.php"><button class="btn btn_keranjang" type="keranjang"><i class="fas fa-shopping-cart"></i></button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|
	        		<a href="logout.php" style="margin-left: 20px; text-decoration: none; color: #000;"><?php echo $_SESSION['username'] ?></a>
	        		<?php
	        	}
	        ?>
	        
	    </div>
	  </div>
	</nav>

	<div class="container">
		<div class="pembayaran">
			<p>Tanggal Pembelian : <b><?php echo $tgl;?></b></p>
			<p>Kode User : <b><?php echo $kodeuser;?></b></p>
			<p>Metode : <b><?php echo $metode;?></b></p>
			<p>Status : <b><?php echo $status;?></b></p>
			<p>Total Harga : <b><?php echo $total;?></b></p>
			<div>
				
			</div>
			<p>Bukti Pembayaran : <input type="file" name="" id="bukti" onchange="f_bukti(this.value)"></p>
		</div>
		
	</div>
	<input type="hidden" name="" id="kodeuser" value="<?php echo $kodeuser;?>">
	<input type="hidden" name="" id="status" value="<?php echo $status;?>">
</body>
</html>