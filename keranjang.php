<?php 
	session_start();
	include "koneksi.php";

	$sqlkeranjang = "SELECT * FROM tbbarang INNER JOIN tempjualdetil USING (kodebarang)";
	$querykeranjang = mysqli_query($conn, $sqlkeranjang);

	$sqltotalakhir = "SELECT SUM(total) AS totalakhir FROM tempjualdetil";
	$querytotalakhir = mysqli_query($conn, $sqltotalakhir);

	$numtotalakhir = mysqli_num_rows($querytotalakhir);
	for($x=1;$x<=$numtotalakhir;$x++){
		$resulttotal = mysqli_fetch_array($querytotalakhir);
		$totalharga = $resulttotal['totalakhir'];
	}

	$ongkir = 10000;

	$totalakhir = $totalharga + $ongkir;

	$namauser = $_SESSION['username'];

	$sqldatauser = "SELECT tbuser.kodeuser, tbuser.nama, tbuser.no_telp, tbuser.alamat FROM tbuser WHERE nama = '$namauser'";
	$querydatauser = mysqli_query($conn, $sqldatauser);

	$resultuser = mysqli_fetch_array($querydatauser);
	$kodeuser = $resultuser['kodeuser'];
	$no_telp = $resultuser['no_telp'];
	$alamat = $resultuser['alamat'];

	$sqltbjual = "SELECT * FROM tbjual";
	$querytbjual = mysqli_query($conn, $sqltbjual);

	$numtbjual = mysqli_num_rows($querytbjual)+1;
	$nojual = "JL-$numtbjual";

	date_default_timezone_set("Asia/Jakarta");
	$tgl = date("Y-m-d");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
	function onload(){
		location.href = "keranjang.php";
	}

	function f_delete(notemp){
		var link = "delete.php?notemp="+notemp;

		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			      onload();
			    }
			  };
			xhttp.open("GET", link, true);
			xhttp.send();
	}

	function f_jlh(x, jlh, notemp, harga, total){
		var link = "opr_keranjang.php?notemp="+notemp+"&jlh="+jlh+"&jlhlama="+jlh+"&opr="+x+"&harga="+harga+"&total="+total;

		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	onload();
			    }
			};
		xhttp.open("GET", link, true);
		xhttp.send();


	}

	function f_harga(){
		var harga_item = document.getElementById('price').textContent;
		var jlh_item = document.getElementById('jlh').value;

		var total = harga_item * jlh_item;

		document.getElementById('total_harga').textContent = total;
	}

	function f_checkout(){
		var modal = document.getElementById("myModal");
		var btn = document.getElementById("myBtn");

		modal.style.display = "block";

  		window.onclick = function(event) {
  			if (event.target == modal) {
    			modal.style.display = "none";
  			}
		}
	}

	function f_metode(metode, total, kodeuser){
		var text = document.getElementById('tf_bank');
		var text2 = document.getElementById('cod_mtd');

		document.getElementById('metode').value = metode;

		if(metode == "cod"){
			text.style.display = "none";
			text2.style.display = "block";
		}
		else{
			text.style.display = "block";
			text2.style.display = "none";
		}
	}

	function loadpembayaran(){
		location.href = "pembayaran.php";
	}

	function f_proses(namauser){
		var no_jual = document.getElementById('no_jual').value;
		var tgl = document.getElementById('tgl').value;
		var kodeuser = document.getElementById('kodeuser').value;
		var total = document.getElementById('total').textContent;
		var ongkir = document.getElementById('ongkir').textContent;
		var grand = document.getElementById('grand').textContent;
		var metode = document.getElementById('metode').value;

		var link = "proses.php?no_jual="+no_jual+"&tgl="+tgl+"&kodeuser="+kodeuser+"&total="+total+"&ongkir="+ongkir+"&grand="+grand+"&metode="+metode;

		alert(link);

		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	loadpembayaran();
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
	
	.keranjang .col-md-8 .col-md-4 img{
		width:200px;
		height: 200px;
	}

	.keranjang .col-md-8{
		border: 3px solid #355766;
		border-radius: 20px;
	}

	.keranjang h2{
		font-size: 30px;
		margin-top: 20px;
	}

	.button_1{
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

	.button_1:hover{
		opacity: 0.8;
	}

	.keranjang .price{
		font-size: 20px;
		font-weight: bold;
		color: #568EA6;
		margin-top: -10px;
	}

	.jmlh input{
		border-radius: 10px;
		margin-top: 120px;
		margin-bottom: 1	0px;

	}

	.col-pembayaran{
		border: 3px solid black;
		border-radius: 15px;
		padding: 20px;
		width: 400px;
	}

	.col-pembayaran button{
		margin-left: 70px;
	}

	.keranjang img{
		border-radius: 15px 0 0 15px;
	}

	.modal {
      display: none;
    position: fixed;
    z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
  }

  .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 60%;
  }

  .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
  }

  .close:hover,
  .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
  }

  .tf_bank{
  	display: none;
  }

  .cod_mtd{
  	display: none;
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

	<div class="keranjang mt-4">
		<div class="container">
			<div class="col-lg-12">
				<h1>Keranjang</h1>

				<br>

				<div>
					<div class="col-md-3 col-pembayaran" style="float: right;">
						<div class="">
							<h4>Detail Pengiriman</h4>
							<br>
							Nama : <p contenteditable="true" style="display: inline; cursor: pointer;" id="namauser"><?php echo $namauser;?></p>
							<br>
							No Telp : <p contenteditable="true" style="display: inline; cursor: pointer;" id="no_telpuser"><?php echo $no_telp;?></p>
							<br>
							Alamat : <p contenteditable="true" style="display: inline; cursor: pointer;" id="alamatuser"><?php echo $alamat;?></p>
						</div>

						<br>

						<h4>Total Harga : <span id="total"><?php echo $totalharga;?></span></h4>
						<h4>Biaya Ongkir : <span id="ongkir"><?php echo $ongkir;?></span></h4>
						<h2>Total Harga : <span id="grand"><?php echo $totalakhir;?></span></h2>

						<button class="button_1" onclick="f_checkout()">CheckOut</button>

						<div id="myModal" class="modal">

              <div class="modal-content">
                  <h3>Metode Pembayaran</h3>
                  <br>
                  <div class="radio_btn">
                  <input type="radio" name="metode" id="metode1" class="COD" value="cod" onclick="f_metode(this.value, <?php echo "'$namauser'";?>)"><label for="COD">&nbsp;COD</label>
                  <div class="cod_mtd" id="cod_mtd">
                  	<h4>Total Harga : <span><?php echo $totalakhir;?></span></h4>
                  </div>
                    <br><br>
                    <input type="radio" name="metode" id="metode2" class="tf" value="tf" onclick="f_metode(this.value, <?php echo "'$namauser'";?>)"><label for="tf">&nbsp;Transfer Bank</label>    
                  </div>
                  <div class="tf_bank" id="tf_bank">
                    <h5>Silahkan Transfer Ke No Rekening</h5>
                    <h4>178 785 827 374</h4>
                    <h4>Total Harga : <span><?php echo $totalakhir;?></span></h4>
                    <h5>Atas nama Udin</h5>
                  </div>
                  
                  <br><br>
                  <button class="button_1" style="width: 80%;" onclick="f_proses(<?php echo "'$totalakhir', '$namauser'";?>)">Proses</button>
                </div>
            </div>

					</div>
					<?php 
						$numkeranjang = mysqli_num_rows($querykeranjang);

						for($x = 1;$x <= $numkeranjang; $x++){
							$resultkeranjang = mysqli_fetch_array($querykeranjang);
							$notemp = $resultkeranjang['notemp'];
							$gambar = $resultkeranjang['gambar'];
							$nama = $resultkeranjang['nama'];
							$merk = $resultkeranjang['merk'];
							$jlh = $resultkeranjang['jlh'];
							$harga = $resultkeranjang['harga'];
							$total = $resultkeranjang['total'];
					?>
					<div class="col-md-8" style="float: left; margin-bottom: 30px;">
						<div class="col-md-4" style="float: left;">
							<img src="css/image/<?php echo $gambar;?>" style="width: 220px; height: 220px;">
						</div>

						<div class="col-md-4" style="float: left;">
							<h2><?php echo $nama;?></h2>
							<p><?php echo $merk?></p>
							<p class="price" id="price"><?php echo $harga;?></p>
						</div>

						<div id="test">
							
						</div>

						<div class="col-md-4" style="float: left;">
							<div class="jmlh">
								<button style="" value="kurang" onclick="f_jlh(this.value, <?php echo "'$jlh', '$notemp', '$harga', '$total'";?>)">-</button>
								<input type="text" id="jlh" onchange="f_harga()" disabled="true" value="<?php echo $jlh;?>">
								<button value="tambah" onclick="f_jlh(this.value, <?php echo "'$jlh', '$notemp', '$harga', '$total'";?>)">+</button>
								<p>Harga Total : <span id="total_harga"><?php echo $total;?></span></p>
							</div>
						</div><i onclick="f_delete('<?php echo $notemp;?>')" class="btn-danger" style="float: right; margin-right: 10px; margin-bottom: 10px; width: 20px; height: 20px; text-align: center; border-radius: 50%; cursor: pointer;">X</i>
					</div>
					<?php
					}	
					?>
					
				</div>	
				<input type="hidden" name="" id="no_jual" value="<?php echo $nojual;?>">
				<input type="hidden" name="" id="tgl" value="<?php echo $tgl;?>">
				<input type="hidden" name="" id="kodeuser" value="<?php echo $kodeuser;?>">
				<input type="hidden" name="" id="metode" value="">
			</div>
		</div>
	</div>
</body>
