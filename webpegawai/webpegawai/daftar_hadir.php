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

<body>
    <div class="container">
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

            <?php 
$view = isset($_GET['view']) ? $_GET['view'] : null;
switch($view){
default:
?>

            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" style=" margin-top: 30px;">
                            Daftar Hadir
                        </h3>
                    </div>
                    <div class=" panel-body">
                        <p>
                            <a href="daftar_hadir.php?view=tambah" class="btn btn-primary"
                                style="margin-bottom:10px">Tambah
                                Baru</a>
                        </p>
                        <table class="w3-table-all w3-card-4 ">
                            <tr>
                                <th width="40px" class="text-center">No.</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Waktu Kedatangan</th>
                                <th>Action</th>
                            </tr>
                            <?php
        $no = 1;
        $sqldaftar_hadir =  mysqli_query ($konek, "SELECT * FROM daftar_hadir ORDER BY id_pegawai ASC");
        while($data = mysqli_fetch_array($sqldaftar_hadir)) {
            echo "<tr>";
            echo "<td class='text-center'>".$no."</td>";
            echo "<td>".$data['nip']."</td>";
            echo "<td>".$data['nama_lengkap']."</td>";
            echo "<td>".$data['waktu_kedatangan']."</td>";
            echo "<td>
            
            <a href='daftar_hadir.php?view=edit&id=$data[id_pegawai]' class='btn btn-info' role='button'>Edit</a>
            <a href='daftar_hadir.php?view=del&id=$data[id_pegawai]' class='btn btn-danger' role='button'>Hapus</a>
            
            </td>";
            echo "</tr>";

            $no++;
        }
?>
                        </table>

                        <?php 
break;
case "tambah":

?>

                        <div id="Flight" class="w3-container w3-light-gray w3-padding-16 myLink">
                            <h3>Selamat datang <?php echo $_SESSION['username'];?> Silahkan Absen</h3>
                            <form class="form-horizontal" method="POST" action="aksidaftarhadir.php?act=insert">
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
                                                <input class="w3-input w3-border" type="text" placeholder="00:00:00">
                                            </div>
                                        </div>

                                        <div class="w3-row-padding" style="margin:0 -8px;">
                                            <div class="w3-half">
                                                <label class="col-md-2"></label>
                                                <div class="col-md-4">
                                                    <input class="btn btn-primary" type="submit" value="Simpan">
                                                    <a href="daftar_hadir.php" class="btn btn-danger">Batal</a>
                                                </div>

                                            </div>
                                            <div class="w3-row-padding" style="margin:0 -8px;">
                                                <div class="w3-half">
                                                    <label class="col-md-2"></label>
                                                    <div class="col-md-4">
                                                        <a href="izin.php" class="btn btn-danger">Klik Tombol ini Jika
                                                            Tidak
                                                            Hadir</a>
                                                    </div>
                                                </div>


                                                <?php 
break;
case "edit":

    $sqlEdit = mysqli_query($konek, "SELECT * FROM daftar_hadir WHERE id_pegawai='$_GET[id]'");
    $e = mysqli_fetch_array($sqlEdit);

?>
                                                <div id="Flight"
                                                    class="w3-container w3-light-gray w3-padding-16 myLink">
                                                    <h3>Edit Data Kehadiran</h3>
                                                    <form class="form-horizontal" method="POST"
                                                        action="aksidaftarhadir.php?act=update">
                                                        <div class="w3-row-padding" style="margin:0 -16px;">
                                                            <div class="w3-half">
                                                                <label>NIP</label>
                                                                <input class="w3-input w3-border" type="text"
                                                                    placeholder="123456789"
                                                                    value="<?php echo $e['nip']; ?>" required>
                                                            </div>
                                                            <div class="w3-row-padding" style="margin:0 -8px;">
                                                                <div class="w3-half">
                                                                    <label>Nama</label>
                                                                    <input class="w3-input w3-border" type="text"
                                                                        placeholder="Name"
                                                                        value="<?php echo $e['nama_lengkap']; ?>"
                                                                        required>
                                                                </div>
                                                                <div class="w3-row-padding" style="margin:0 -8px;">
                                                                    <div class="w3-half">
                                                                        <label>Waktu Kedatangan</label>
                                                                        <input class="w3-input w3-border" type="text"
                                                                            placeholder="00:00:00"
                                                                            value="<?php echo $e['waktu_kedatangan']; ?>"
                                                                            required>
                                                                    </div>
                                                                </div>

                                                                <div class="w3-row-padding" style="margin:0 -8px;">
                                                                    <div class="w3-half">
                                                                        <label class="col-md-2"></label>
                                                                        <div class="col-md-4">
                                                                            <input class="btn btn-primary" type="submit"
                                                                                value="Ubah Data">
                                                                            <a href="daftar_hadir.php"
                                                                                class="btn btn-danger">Batal</a>
                                                                        </div>



                                                                    </div>
                                                                </div>

                                                                <?php
break;
}
?>

                                                                <!-- jQuery (necessary for Bootstrap's JavaScript plugins)
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
                                                                <script src="assets/js/jquery.min.js"></script>
                                                                <!-- Include all compiled plugins (below), or include individual files as needed -->
                                                                <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>