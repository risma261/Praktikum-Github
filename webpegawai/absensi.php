<?php include "header.php"; ?>

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


</head>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
    title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:350px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
    </header>

    <div id="Flight" class="w3-container w3-light-gray w3-padding-16 myLink">
        <h3>Selamat datang <?php echo $_SESSION['username'];?> Silahkan Absen</h3>
        <div class="w3-row-padding" style="margin:0 -16px;">
            <div class="w3-half">
                <label>NIP</label>
                <input class="w3-input w3-border" type="text" placeholder="123456789">
            </div>
            <div class="w3-row-padding" style="margin:0 -8px;">
                <div class="w3-half">
                    <label>Nama</label>
                    <input class="w3-input w3-border" type="text" placeholder="Name">
                </div>
                <div class="w3-row-padding" style="margin:0 -8px;">
                    <div class="w3-half">
                        <label>Waktu Kedatangan</label>
                        <input class="w3-input w3-border" type="text" placeholder="00:00 30-12-2000">
                    </div>
                </div>
                <p><button class="w3-button w3-blue">Submit</button></p>
            </div>
            <a href="izin.php" class="btn btn-danger">Klik Tombol ini Jika Tidak Hadir</a>
        </div>


    </div>

    <?php include "footer.php"; ?>