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
                    Data Golongan
                </h3>
            </div>
            <div class="panel-body">
                <p>
                    <a href="data_golongan.php?view=tambah" class="btn btn-primary" style="margin-bottom:10px">Tambah
                        Data</a>
                </p>
                <table class=" w3-table-all w3-card-4 ">
                    <tr>
                        <th width=" 40px" class="text-center">No.</th>
                        <th>Kode Jabatan</th>
                        <th>Nama Golongan</th>
                        <th>Tunjangan S/I</th>
                        <th>Tunjangan Anak</th>
                        <th>Uang Makan</th>
                        <th>Tunjangan Lembur</th>
                        <th>Askes</th>
                        <th>Aksi</th>
                    </tr>

                    <?php 
                    $sql = mysqli_query($konek, "SELECT * FROM golongan ORDER BY kode_golongan ASC");
                    $no=1;
                    
                    while($d=mysqli_fetch_array($sql)){
                        echo "<tr>
                        <td width='40px' align='center'>$no</td>
                        <td>$d[kode_golongan]</td>
                        <td>$d[nama_golongan]</td>
                        <td>$d[tunjangan_suami_istri]</td>
                        <td>$d[tunjangan_anak]</td>
                        <td>$d[uang_makan]</td>
                        <td>$d[uang_lembur]</td>
                        <td>$d[askes]</td>
                        
                        <td width='160px' align='center'>
                        <a class='btn btn-warning btn-sm' href='data_golongan.php?view=edit&id=$d[kode_golongan]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='aksi_golongan.php?act=del&id=$d[kode_golongan]'>Hapus</a>
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
    //membuat kode golongan otomatis
    $simbol = "G";
    $query = mysqli_query($konek, "SELECT max(kode_golongan) AS last FROM golongan WHERE kode_golongan LIKE '$simbol%'");
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
                Tambah Data Golongan
            </h3>
        </div>
        <div class="panel-body">

            <form method="post" action="aksi_golongan.php?act=insert">
                <table class="table">
                    <tr>
                        <td width="180px">Kode Golongan</td>
                        <td>
                            <input class="form-control" type="text" name="kodegolongan" value="<?php
                                    echo $nextKode; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Golongan</td>
                        <td>
                            <input class="form-control" type="text" name="namagolongan" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Tunjangan S/I</td>
                        <td>
                            <input class="form-control" type="number" name="tunjangansi" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Tunjangan Anak</td>
                        <td>
                            <input class="form-control" type="number" name="tunjangananak" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Uang Makan</td>
                        <td>
                            <input class="form-control" type="number" name="uangmakan" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Uang Lembur</td>
                        <td>
                            <input class="form-control" type="number" name="uanglembur" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Askes</td>
                        <td>
                            <input class="form-control" type="number" name="askes" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Simpan" class="btn btn-primary">
                            <a class="btn btn-danger" href="data_golongan.php">Kembali</a>
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
        $sqlEdit = mysqli_query($konek, "SELECT * FROM golongan WHERE kode_golongan='$_GET[id]'");
        $e = mysqli_fetch_array($sqlEdit);
        ?>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" style=" margin-top: 30px;">Edit Data Gologan</h3>
            </div>
            <div class="panel-body">

                <form method="post" action="aksi_golongan.php?act=update">
                    <table class="table">
                        <tr>
                            <td width="160px">Kode Golongan</td>
                            <td>
                                <input class="form-control" type="text" name="kodegolongan" value="<?php
                                     echo $e['kode_golongan'];?>" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Golongan</td>
                            <td>
                                <input class="form-control" type="text" name="namagolongan" value="<?php
                                     echo $e['nama_golongan'];?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Tunjangan S/I</td>
                            <td>
                                <input class="form-control" type="number" name="tunjangansi" value="<?php
                                     echo $e['tunjangan_suami_istri'];?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td> Tunjangan Anak</td>
                            <td>
                                <input class="form-control" type="number" name="tunjangananak" value="<?php
                                     echo $e['tunjangan_anak'];?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Uang Makan</td>
                            <td>
                                <input class="form-control" type="number" name="uangmakan" value="<?php
                                     echo $e['uang_makan'];?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Uang Lembur</td>
                            <td>
                                <input class="form-control" type="number" name="uanglembur" value="<?php
                                     echo $e['uang_lembur'];?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Askes</td>
                            <td>
                                <input class="form-control" type="number" name="askes" value="<?php
                                     echo $e['askes'];?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Update Data" class="btn btn-primary">
                                <a class="btn btn-danger" href="data_golongan.php">Kembali</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <?php 
            break; 
            } 
            ?>
    </div>
    <?php include "footer.php"; ?>