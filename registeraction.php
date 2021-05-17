<?php 
	include 'koneksi.php';

	$kodeuser = $_POST['kodeuser'];
	$username = $_POST['username'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if($password == $password2){
		if($submit = "Register"){
			$query = mysqli_query($conn, "INSERT INTO tbuser (kodeuser, nama, pass, no_telp, alamat)
				VALUES('$kodeuser', '$username', '$password', '$no_telp', '$alamat');");

			if($query) {
				echo "<script>
				alert('Register Berhasil!');
				location.href = 'logintokomu.php';
				</script>";

			}
			else{
				echo "<script>
				alert('Register Gagal!');
				location.href = 'registertokomu.php';
				</script>";
			}
		}
	}
	else{
		echo "<script>
				alert('Password Tidak Sesuai!');
				location.href = 'registertokomu.php';
				</script>";
	}
?>