<?php session_start();
if(!isset($_SESSION['login'])){
  header('location:login.php');
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<title>Sistem Informasi Pegawai</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
html,
body,
h1,
h2,
h3,
h4,
h5 {
    font-family: "Raleway", sans-serif
}
</style>

<body class="w3-light-grey">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-dark-gray w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey"
            onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <span class="w3-bar-item w3-right">Sistem Informasi Pegawai</span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-blue-gray w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="assets/img/img_avatar3.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar ">
                <span>Selamat Datang <strong><?php echo $_SESSION['username'];?></strong></span><br>
                <a href="#" class="w3-bar-item w3-button"></a>
                <a href="#" class="w3-bar-item w3-button"></a>
                <a href="#" class="w3-bar-item w3-button"></a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="daftar_hadir.php?view=tambah" class="w3-bar-item w3-button w3-padding"><i class=""></i> 
                Absensi</a>
        </div>
        <div class="w3-bar-block">
            <a href="daftar_hadir.php" class="w3-bar-item w3-button w3-padding"><i class=""></i>  Daftar Hadir</a>
            <div class="w3-bar-block">
                <a href="data_jabatan.php" class="w3-bar-item w3-button w3-padding"><i class=""></i>  Data Jabatan</a>

                <div class="w3-bar-block">
                    <a href="data_golongan.php" class="w3-bar-item w3-button w3-padding"><i class=""></i> Data
                        Golongan </a>

                </div>


                <div class=" w3-bar-block">
                    <a href="login.php" class="w3-bar-item w3-button w3-padding"><i class=""></i> Logout </a>
                </div>


            </div>

    </nav>