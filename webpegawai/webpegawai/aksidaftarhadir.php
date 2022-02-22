<?php 
session_start();
include "koneksi.php";

if(!isset($_SESSION['Simpan'])){
    header('location:daftar_hadir.php');
}

//jika ada get act
if(isset($_GET['act'])){
    
    //act insert
    if($_GET['act']=='insert'){
        //prosesmenyimpan data
        $nip            = $_POST['nip'];
        $nama_lengkap   = $_POST['nama_lengkap'];
        $waktu_kedatangan = $_POST['waktu_kedatangan'];

        if($nip=''|| $nama_lengkap=='' || $waktu_kedatangan==''){
            header('location:daftar_hadir.php?view=tambah&e=bl');
        }else{
            //proses 
            $simpan = mysqli_query($konek, "INSERT INTO daftar_hadir(nip, nama_lengkap, waktu_kedatangan) VALUES ('$nip', '$nama_lengkap','$waktu_kedatangan')");

                if($simpan){
                    header('location:daftar_hadir.php?e=sukses');
                }else{
                    header('location:daftar_hadir.php?e=gagal');
                }
        }
    }

    
    }elseif($_GET['act']=='update'){ //jika act = update
        $id_pegawai     = $_POST['id_pegawai'];
        $nip            = $_POST['nip'];
        $nama_lengkap   = $_POST['nama_lengkap'];
        $waktu_kedatangan = $_POST['waktu_kedatangan'];
        
        //apabila form belum lengkap
        if($nip='' || $nama_lengkap=='' || $waktu_kedatangan==''){
            //header('location:datapegawai.php?view=tambah=bl');
            echo "Form anda belum lengkap..!"; 
    }else{
        if($_POST['waktu_kedatangan']==''){
            $update = mysqli_query($konek, "UPDATE daftar_hadir SET nip='$nip', 
                                                                    nama_lengkap='$nama_lengkap'
                                                                    waktu_kedatangan='$waktu_kedatangan'  
                                                              WHERE id_pegawai='$id_pegawai'");
        }else{
             $update = mysqli_query($konek, "UPDATE daftar_hadir SET nip='$nip', 
                                                                    nama_lengkap='$nama_lengkap',
                                                                    waktu_kedatangan='$waktu_kedatangan' 
                                                              WHERE id_pegawai='$id_pegawai'");
        }
        if($update){
                header('location:daftar_hadir.php?e=sukses');
            }else{
                header('location:daftar_hadir.php?e=gagal');
            }
        }
        }
       //jika act del
    elseif($_GET['act']=='del'){
        $hapus=mysqli_query($konek, "DELETE FROM golongan WHERE kode_jabatan='$_GET[id]'");
        
        if($hapus){
                    header('location:daftar_hadir.php?e=sukses');
                }else{
                    header('location:daftar_hadir.php?e=gagal');
                }
      
    }

?>