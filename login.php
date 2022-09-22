<?php 
include './func/config.php';
$s = new mochi();
$s -> dbconnect();
session_start();
if (isset($_SESSION['id_user'])){
// echo"<script>alert('Login Dulu')</script>";
echo"<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>
<!DOCTYPE html>
<html lang="jv">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?php echo $s->URL(); ?>/assets/image/logo.png" >
    <title>Grizzly Pedia | Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <span class="h4 text-gray-900">.:::.</span>
                                        <h1 class="h4 text-gray-900 mb-4">..:: Welcome ::..</h1>
                                    </div>
                                    <form class="user" action="./func/prosesLogin.php" method="POST">
                                        <hr>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                                        </div>
                                        <br>
                                        <button name="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <br>
                                        <a href="#">*)Forgot Password</a><br>
                                        <a href="#">**)Create Akun</a>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <b>Grizzly Pedia</b><br>
                                        <p>Created By : Restu Fatwian</p>
                                        <p>
                                            <a href="https://www.instagram.com/mochii_rf/" target="_BLANK"><i class="fab fa-instagram"></i></a>&nbsp;
                                            <a href="#" target="_BLANK"><i class="fab fa-facebook"></i></a>&nbsp;
                                            <a href="https://www.linkedin.com/in/restu-fatwian-495283120/" target="_BLANK"><i class="fab fa-linkedin"></i></a>&nbsp;
                                            <a href="https://dribbble.com/mochi165" target="_BLANK"><i class="fab fa-dribbble"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>
</html>