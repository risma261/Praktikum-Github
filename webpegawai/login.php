<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistem Informasi Pegawai</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    body {
        background: url(assets/img/bg.jpg) no-repeat center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .container {
        margin: 60px 15px 0 0;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card my-5">
                    <div class="card-header bg-dark text-white text-center">Silahkan login dulu</div>
                    <div class="card-body">

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $p    = md5($pass);

    if($user =='' || $pass==''){
        ?>
        <div class="alert alert-warning"><b>Warning!</b> Form anda belum lengkap!</div>
        <?php
    }else{
        include "koneksi.php";
        $sqlLogin = mysqli_query($konek, "SELECT * FROM admin WHERE username='$user' AND password='$p'");
        $jml = mysqli_num_rows($sqlLogin);
        $d=mysqli_fetch_array($sqlLogin);

        if($jml > 0){
            session_start();
            $_SESSION['login']        = TRUE;
            $_SESSION['id']           = $d['id_admin'];
            $_SESSION['username']     = $d['username'];
            $_SESSION['nama_lengkap'] = $d['nama_lengkap'];

            header('Location:./index.php');
        }else{
            ?>
            <div class="alert alert-danger"><b>ERROR</b>Username dan Password anda salah!</div>
            <?php 
        }
    }
}
?>

    <form action="" method="post" role="form">
    <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" placeholder="Username" class="form-control">
    </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" placeholder="Password" class="form-control">
    </div>
    <button class="btn btn-success btn-block" >Login</button>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins)
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>