 <?php 
 	session_start();
	include 'koneksi.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($conn, "SELECT * FROM tbuser WHERE nama = '$username' AND pass = '$password'") or die("errortblogin");
	$numrows = mysqli_num_rows($query);

	if ($numrows == 0 || $numrows == null) {
		echo "<script>
				alert('Login Gagal!');
				location.href = 'logintokomu.php';
				</script>";
	} else {
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;

		header("location: hometokomu.php");
	}
?>