<?php
session_start();

require 'function/function.php';

if (isset($_SESSION["login"])) {
  echo "
            <script>
            alert ('Anda Sudah Login');
            document.location.href='siswa/tables.php';
            </script>

        ";
  exit;
}

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM data_admin 
                        WHERE username = '$username'");

  // Cek username
  if (mysqli_num_rows($result) === 1) {

    // Cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      // set session
      $_SESSION["login"] = true;

      header("Location:siswa/tables.php");
      exit;
    }
  }

  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                  </div>
                  <?php if (isset($error)) : ?>
                    <p>Username/Password salah</p>
                  <?php endif ?>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="login">Login</button>
                    <a href="absen_qr" class="btn btn-danger btn-user btn-block">Absen QR</a>
                    <hr>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- End of outer row -->

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>