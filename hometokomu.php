<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title></title>

	<script type="text/javascript">
		function f_desc(nama, hargajual, gambar, kodebarang, jumlah_stok, ket){
			location.href = "deskripsi.php?nama="+nama+"&hargajual="+hargajual+"&gambar="+gambar+"&kodebarang="+kodebarang+"&jumlah_stok="+jumlah_stok+"&ket="+ket+"&kodeuser=USER-1&cmd=desc";
		}

		function f_search(){
			var search_value = document.getElementById('search_input').value;

			var link = "search.php?search="+search_value+"&cmd=search";

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			      document.getElementById("div_search").innerHTML = this.responseText;
			    }
			  };
			xhttp.open("GET", link, true);
			xhttp.send();
		}

		function f_searchtrend(jenis){
			var link = "search.php?search="+jenis+"&cmd=searchtrend";

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			      document.getElementById("div_search").innerHTML = this.responseText;
			    }
			  };
			xhttp.open("GET", link, true);
			xhttp.send();
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

	.slideshow img{
	width: 100%;
}
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 50%;
  user-select: none;
  height: 55px;
  width: 55px;
}

.next {
  right: 0;
  border-radius: 50%;
}

.prev:hover, .next:hover {
  background-color: rgba(255,255,255,0.8);
}
	footer{
		width: 100%;
		height: 20rem;
		background-color: rgba(0,0,0,.125);
		margin-top: 400px;
		text-align: center;
		padding-top: 150px;
	}
</style>
</head>
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
	        		<a href="logintokomu.php"><button class="btn btn_masuk" type="masuk">Masuk</button></a>
	        		<a href="registertokomu.php"><button class="btn btn_daftar" type="daftar">Daftar</button></a>
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

	
	
	<div style="margin-left: 50px;">
		<div class="slideshow-container">

	  <?php
	      include "koneksi.php";
	      $sqlbanner = "select * from tbbanner";
	      $querybanner = mysqli_query($conn, $sqlbanner);
	      $numbanner = mysqli_num_rows($querybanner);

	      for($x=1; $x<=$numbanner; $x++){
	        $resultbanner = mysqli_fetch_array($querybanner);
	        $file = $resultbanner['nama_file'];
	  ?>

	    <div class="mySlides">
	      <img src="css/image/<?php echo $file;?>" style="width:100%">
	    </div>

	    <?php
	      }
	    ?>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

	</div>
	<br>

	<script>
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	      slides[i].style.display = "none";  
	  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	}
	</script>

<br>

	<div id="div_search">
		
	
	  
	  <br>
	  <form action="deskripsi.php" method="GET">
	  	<h3>Terlaris Untukmu</h3>
		  <?php 
		  	include "koneksi.php";

		  	$sqlterlaris = "SELECT tbbarang.kodebarang, tbbarang.nama, tbbarang.hargajual, tbbarang.disc, tbbarang.gambar, SUM(tbbarang.jlh_stok) AS jumlah_stok, tbbarang.ket FROM tbbarang INNER JOIN tbjualdetil ON tbbarang.kodebarang = tbjualdetil.kodebarang GROUP BY tbbarang.kodebarang DESC";
		  	$queryterlaris = mysqli_query($conn, $sqlterlaris);

		  	$numterlaris = mysqli_num_rows($queryterlaris);
		  	for($x=1; $x<=$numterlaris; $x++){
		  		$resultterlaris = mysqli_fetch_array($queryterlaris);
		  		$kodebarang = $resultterlaris['kodebarang'];
		  		$nama = $resultterlaris['nama'];
		  		$hargajual = $resultterlaris['hargajual'];
		  		$disc = $resultterlaris['disc'];
		  		$gambar = $resultterlaris['gambar'];
		  		$jumlah_stok = $resultterlaris['jumlah_stok'];
		  		$ket = $resultterlaris['ket'];
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
	  
			
	  &nbsp;
	  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	  <hr>

	  <h3>Lagi trending, nih!</h3>
	  	<?php 
			$sqltrending = "SELECT DISTINCT tbbarang.gambar, tbbarang.jenis, COUNT(tbbarang.jenis) AS jlh FROM tbbarang GROUP BY tbbarang.jenis ORDER BY tbbarang.jenis DESC";
			$querytrending = mysqli_query($conn, $sqltrending);

			$numtrending = mysqli_num_rows($querytrending);
			for($x = 1; $x <= $numtrending; $x++){
				$resulttrending = mysqli_fetch_array($querytrending);
				$gambar = $resulttrending['gambar'];
				$jenis = $resulttrending['jenis'];
				$jlh = $resulttrending['jlh'];
		?>
			<div onclick="f_searchtrend('<?php echo $jenis;?>')" style="cursor: pointer;">
				<div class="col-lg-3 float-start prod_trend">
			  		<div class="prod">
			  			<img src="css/image/<?php echo $gambar;?>" style="width: 6rem;" class="float-start">
			  			<b><?php echo $jenis;?></b>
			  			<p><?php echo $jlh;?> Produk</p>
			  		</div>
			  	</div>
			</div>		
	  	<?php
			}
	  	?>
	  	
	  	
	  	

	  	&nbsp;

	  	<hr>

	  	<h3>Terakhir Dilihat</h3>
	  	<div style="width: 100%;">
	  		<?php 
	  		include "koneksi.php";

	  		$sqlhistory = "SELECT DISTINCT tbbarang.kodebarang, tbbarang.nama, tbbarang.hargajual, tbbarang.disc, tbbarang.gambar, tbbarang.jlh_stok, tbbarang.ket FROM tbbarang INNER JOIN tbhistory USING(kodebarang) ORDER BY tbhistory.updated_at DESC";
	  		$queryhistory = mysqli_query($conn, $sqlhistory);

	  		$numhistory = mysqli_num_rows($queryhistory);
	  		for($x = 1; $x <= $numhistory; $x++){
	  			$resulthistory = mysqli_fetch_array($queryhistory);
		  		$kodebarang = $resulthistory['kodebarang'];
		  		$nama = $resulthistory['nama'];
		  		$hargajual = $resulthistory['hargajual'];
		  		$disc = $resulthistory['disc'];
		  		$gambar = $resulthistory['gambar'];
		  		$jlh_stok = $resulthistory['jlh_stok'];
		  		$ket = $resulthistory['ket']
	  			?>	
	  			<div onclick="f_desc(<?php echo "'$nama', '$hargajual', '$gambar', '$kodebarang', '$jumlah_stok', '$ket'";?>)" class="terlaris_prod">
				  	<div class="col-lg-2 float-start">
				  		<div class="card" style="width: 14rem; height: 344px; margin-top: 20px;">
						  <img class="card-img-top" src="css/image/<?php echo $gambar;?>" alt="Card image cap">
						  <div class="card-body">
						    <p class="card-text"><?php echo $nama;?></p>
						    <b><?php echo $hargajual;?></b>
						  </div>
						</div>
				  	</div>
				</div>
		<?php
		  	}
		?>
	  	</div>
	  	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	  	&nbsp;

	  	<hr>

	  	<h3>Produk</h3>
	  	<div class="div_produk" style="width: 100%; background-color: #123;">
	  		<?php 
		  	include "koneksi.php";

		  	$sqlterlaris = "SELECT tbbarang.kodebarang, tbbarang.nama, tbbarang.hargajual, tbbarang.disc, tbbarang.gambar, tbbarang.jlh_stok, tbbarang.ket FROM tbbarang ORDER BY tbbarang.jlh_stok DESC";
		  	$queryterlaris = mysqli_query($conn, $sqlterlaris);

		  	$numterlaris = mysqli_num_rows($queryterlaris);
		  	for($x=1; $x<=$numterlaris; $x++){
		  		$resultterlaris = mysqli_fetch_array($queryterlaris);
		  		$kodebarang = $resultterlaris['kodebarang'];
		  		$nama = $resultterlaris['nama'];
		  		$hargajual = $resultterlaris['hargajual'];
		  		$disc = $resultterlaris['disc'];
		  		$gambar = $resultterlaris['gambar'];
		  		$jlh_stok = $resultterlaris['jlh_stok'];
		  		$ket = $resultterlaris['ket']
		    ?>
		    <div onclick="f_desc(<?php echo "'$nama', '$hargajual', '$gambar', '$kodebarang', '$jumlah_stok', '$ket'";?>)" class="terlaris_prod">
		    	<input type="hidden" id="kb_1" value="<?php echo $kodebarang;?>">
		  		<input type="hidden" id="kg_1" value="<?php echo $gambar;?>">
		    	<div class="produk_terlaris">
			  	<div class="col-lg-2 float-start">
			  		<div class="card" style="width: 14rem; height: 344px; margin-top: 20px;">
					  <img class="card-img-top" src="css/image/<?php echo $gambar;?>" alt="Card image cap">
					  <div class="card-body">
					    <p class="card-text"><?php echo $nama;?></p>
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
	  	</div>
	</div>
	</div>
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<h1>
	<footer>
		<h3>Copyright by Evotianus</h3>
	</footer>
	</h1>
</body>

</html>