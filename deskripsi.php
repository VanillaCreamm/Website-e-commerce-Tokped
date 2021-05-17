<?php
	session_start();
	include "koneksi.php";

	$nama = $_GET['nama'];
	$hargajual = $_GET['hargajual'];
	$gambar = $_GET['gambar'];
	$kodebarang = $_GET['kodebarang'];
	$kodeuser = $_GET['kodeuser'];
	$jumlah_stok = $_GET['jumlah_stok'];
	$ket = $_GET['ket'];
	$cmd = $_GET['cmd'];

	date_default_timezone_set("Asia/Jakarta");
	$date = date("Y-m-d h:i:sa");

	$sqltbjual = "SELECT * FROM tbjual";
	$querytbjual = mysqli_query($conn, $sqltbjual);

	$numtbjual = mysqli_num_rows($querytbjual)+1;
	$nojual = "JL-$numtbjual";

		if (isset($_SESSION['username'])) {	

			$username = $_SESSION['username'];

			$query = mysqli_query($conn, "SELECT * FROM tbhistory WHERE kodeuser = '$username' AND kodebarang = '$kodebarang'");

			if (mysqli_num_rows($query) <= 0) {

				mysqli_query($conn, "INSERT INTO tbhistory (kodeuser, kodebarang, created_at, updated_at) VALUES ('$username', '$kodebarang', '$date', '$date')");

			} else {


				mysqli_query($conn, "UPDATE tbhistory SET updated_at = '$date' WHERE kodeuser = '$username'");
			
			}
			
		}
?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
	function f_pesan(){
		var no = document.getElementById('no_jual').value;
		var kodebarang = document.getElementById('kodebarang').value;
		var jlh = document.getElementById('jlh_item').value;
		var harga = document.getElementById('hrg_prod').value;
		var total = jlh * harga;

		var link = "pesan.php?no="+no+"&kodebarang="+kodebarang+"&jlh="+jlh+"&harga="+harga+"&total="+total;

		alert("Item Telah Dimasukkan Ke Keranjang!");

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    }
		};
		xhttp.open("GET", link, true);
		xhttp.send();
	}
</script>

<style type="text/css">
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

	.deskripsi{
	margin-top: 50px;
	}

	.deskripsi img{
		width: 500px;
		height: 500px;
		border-radius: 20px;
	}

	.deskripsi h1{
		font-size: 40px;
		font-weight: bold;
	}

	.deskripsi .jumlah{
		font-weight: bold;
		margin-left: 10px;
		margin-top: -10px;
		color: #a5a6a9;
	}

	.deskripsi .harga{
		font-weight: bold;
		font-size: 20px;
	}

	.deskripsi .harga span{
		font-size: 30px;
		margin-left: 20px;
		color: #568EA6;
	}

	.deskripsi .ket {
		height: 90px;
		width : 100%;
		margin-bottom: 30px;
	}


	.jmlh span{
		font-weight: bold;
		font-size: 20px;
		margin-right: 20px;
	}

	.jmlh input{
		border-radius: 10px;
	}

	.tombol{
		margin-top: 15px;
	}

	.tombol p{
		font-weight: bold;
		font-size: 20px;
	}

	.tombol button{
		margin-left: 300px;
		margin-top: 30px;
		border: none;
		padding: 8px;
		width: 200px;
		height: 50px;
		background-color: #4B93B3;
		color: white;
		border-radius: 10px;
		text-align: center;
		text-decoration: none;
		transition: transform .2s;
	}

	.tombol button:hover{
		opacity: 0.8;
		transform: scale(1.1);
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
		<div class="col-lg-12">
			<div class="deskripsi">

				<div class="col-md-6" style="float: left;">
					<img src="css/image/<?php echo $gambar;?>">
				</div>

				<div class="col-md-6" style="float: left; margin-top: 30px; ">
					<input type="hidden" id="username" value="<?php echo $_SESSION["username"];?>">
					<input type="hidden" id="kodebarang" value="<?php echo $kodebarang;?>">
					<input type="hidden" id="hrg_prod" value="<?php echo $hargajual;?>">
					<h1 id="nama_prod"><?php echo $nama;?></h1>
					<p class="jumlah">jumlah stok <span style="margin-right: 50px;" id="jlh_prod"><?php echo $jumlah_stok;?></span></p>
					<p class="harga">Harga <span><?php echo $hargajual;?></span> </p>
					<p class="ket" style="margin-top: 20px;" id="ket_prod"><?php echo $ket;?></p>

					Jumlah : <input type="text" id="jlh_item">

					<br><br>

					<input type="button" name="" value="Tambahkan Ke Keranjang" onclick="f_pesan()">
					<input type="hidden" name="" id="no_jual" value="<?php echo $nojual;?>">
				</div>
			</div>
		</div>
	</div>

</body>