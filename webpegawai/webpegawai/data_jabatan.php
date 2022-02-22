<?php include "header.php"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<div class="container">
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <?php
    $view = isset($_GET['view']) ?  $_GET['view'] : null;

    switch($view){
        default:
        ?>
        <!-- menampilkan pesan -->
        <?php 
      if(isset($_GET['e']) && $_GET['e']=='sukses'){
       ?>

        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">
                </span>&times;</button>
            <strong>Selamat!</strong> Proses Berhasil
        </div>
        <?php  
    } elseif(isset($_GET['e']) && $_GET['e']=='gagal'){
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> Proses gagal dilakukan..!
        </div>
        <?php
        }
        ?>
        <div class=" panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" style="margin-top: 30px;">
                    Data Jabatan
                </h3>
            </div>
            <div class="panel-body">
                <p>
                    <a href="data_jabatan.php?view=tambah" class="btn btn-primary" style="margin-bottom:10px">Tambah
                        Baru</a>
                </p>
                <table class=" w3-table-all w3-card-4 ">
                    <tr>
                        <th width=" 40px" class="text-center">No.</th>
                        <th>Kode Jabatan</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan Jabatan</th>
                        <th>Aksi</th>
                    </tr>

                    <?php 
                    $sql = mysqli_query($konek, "SELECT * FROM jabatan ORDER BY kode_jabatan ASC");
                    $no=1;
                    
                    while($d=mysqli_fetch_array($sql)){
                        echo "<tr>
                        <td width='40px' align='center'>$no</td>
                        <td>$d[kode_jabatan]</td>
                        <td>$d[nama_jabatan]</td>
                        <td>$d[gapok]</td>
                        <td>$d[tunjangan_jabatan]</td>
                        <td width='160px' align='center'>
                        <a class='btn btn-warning btn-sm' href='data_jabatan.php?view=edit&id=$d[kode_jabatan]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='aksi_jabatan.php?act=del&id=$d[kode_jabatan]'>Hapus</a>
                        </td>
                        </tr>";
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php
    break;
    case "tambah":
    //kode jabatan otomatis
    $simbol = "J";
    $query = mysqli_query($konek, "SELECT max(kode_jabatan) AS last FROM jabatan WHERE kode_jabatan LIKE '$simbol%'");
    $data = mysqli_fetch_array($query);
    
    $kodeterakhir = $data['last'];
    $nomorterakhir = substr($kodeterakhir, 1, 2);
    $nextNomor = $nomorterakhir + 1;
    $nextKode = $simbol.sprintf('%02s', $nextNomor);
    
    ?>
    <?php
        if(isset($_GET['e']) && $_GET['e']=='bl'){
        ?>
    <div class="row">
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria="Close">&times;</button>
            <strong>Peringatan!</strong> Form anda belum lengkap, silahkan dilengkapi
        </div>
    </div>
</div>
<?php
        }
        ?>
<div class=" row">
    <div class=" panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title" style=" margin-top: 30px;">
                Tambah Data Jabatan
            </h3>
        </div>
        <div class="panel-body">

            <form method="post" action="aksi_jabatan.php?act=insert">
                <table class="table">
                    <tr>
                        <td width="180px">Kode Jabatan</td>
                        <td>
                            <input class="form-control" type="text" name="kodejabatan" value="<?php
                                    echo $nextKode; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Jabatan</td>
                        <td>
                            <input class="form-control" type="text" name="namajabatan" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Gaji Pokok</td>
                        <td>
                            <input class="form-control" type="number" name="gapok" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Tunjangan Jabatan</td>
                        <td>
                            <input class="form-control" type="number" name="tunjanganjabatan" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Simpan" class="btn btn-primary">
                            <a class="btn btn-danger" href="data_jabatan.php">Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <?php
        break;
        case "edit":
        //kode
        $sqlEdit = mysqli_query($konek, "SELECT * FROM jabatan WHERE kode_jabatan='$_GET[id]'");
        $e = mysqli_fetch_array($sqlEdit);
        ?>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" style=" margin-top: 30px;">Edit Data Jabatan</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="aksi_jabatan.php?act=update">
                    <table class="table">
                        <tr>
                            <td width="160">Kode Jabatan</td>
                            <td>
                                <input type="text" name="kodejabatan" class="form-control"
                                    value="<?php echo $e['kode_jabatan']; ?>" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Jabatan</td>
                            <td>
                                <input type="text" name="namajabatan" class="form-control"
                                    value="<?php echo $e['nama_jabatan'];?>" required />
                            </td>
                        </tr>
                        <tr>
                            <td>Gaji Pokok</td>
                            <td>
                                <input type="number" name="gapok" class="form-control" value="<?php echo $e['gapok'];?>"
                                    required />
                            </td>
                        </tr>
                        <tr>
                            <td>Tunjangan Jabatan</td>
                            <td>
                                <input type="number" name="tunjanganjabatan" class="form-control"
                                    value="<?php echo $e['tunjangan_jabatan'];?>" required />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Update Data" class="btn btn-primary" />
                                <a href="data_jabatan.php" class="btn btn-danger">Kembali</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <?php 
            break; 
            } 
            ?>
</div>
<?php include "footer.php"; ?>