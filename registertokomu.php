<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <title>Register</title>
  </head>
  <body>
     <form action="registeraction.php" method="POST" class="register-form">
       <div class="container" style="margin-top: -20px;">
        <h2>Daftar Sekarang</h2>
        <p>Sudah punya akun? <a href="logintokomu.php">Masuk</a></p>
            <div class="user">
              <input type="text" name="kodeuser" placeholder="Inputkan Kodeuser Anda" required="">
            </div>
            <div class="user">
              <input type="text" name="username" placeholder="Inputkan Nama Anda" required="">
            </div>
            <div class="password2">
              <input type="text" name="no_telp" placeholder="Inputkan No Telp Anda" required="">
            </div>
            <div class="password2 mr-3">
              <textarea name="alamat" placeholder="Inputkan Alamat Anda"></textarea>
            </div>
            <div class="password">
              <input type="password" name="password" placeholder="Inputkan Password Anda" required="">
            </div>
            <div class="password2">
              <input type="password" name="password2" placeholder="Konfirmasi Password Anda" required="">
            </div>
            <div class="register-button">
              <a href="logintokomu.php"><button class="btn" id="btn">Register</button></a>
            </div>
       </div>
     </form>













    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>