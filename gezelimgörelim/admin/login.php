<?php
session_start();
ob_start();
include '../connect.php';
if (isset($_POST['login_btn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $adminask = $db->prepare('SELECT * FROM admin WHERE admin_email=:admin_email and admin_sifre=:admin_sifre');
  $adminask->execute([
    'admin_email' =>$email,
    'admin_sifre' =>$password
  ]);
$row = $adminask->rowCount();
if ($row == 1) {
  $_SESSION['admin_email'] = $email;
  echo "<script>window.location='index.php';alert('Hoşgeldiniz.');</script>";
  exit;
}else{
  echo "<script>window.location='login.php';alert('Kullanıcı adı veya şifreniz hatalı.');</script>";
  exit;
  }

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

    <title>Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hoşgeldin yönetici!</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input autocomplete="off" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="E-mail.." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Şifre.." name="password">
                                        </div>


                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="login_btn">Giriş yap!</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

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
