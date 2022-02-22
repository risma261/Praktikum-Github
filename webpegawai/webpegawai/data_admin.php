<?php include "header.php"; ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:350px;margin-top:40px;">


<p>
    <a href="?p=barang_create" class="btn btn-success">Tambah Baru</a>
    </p>

   <table class="w3-table-all w3-card-4">
      <tr>
        <th width="40px" class="text-center">No.</th>
        <th>Username</th>
        <th>Nama Lengkap</th>
        <th>Action</th>
      </tr>
      <?php
        $no = 1;
        $sqlAdmin =  mysqli_query ($konek, "SELECT * FROM admin ORDER BY username ASC");
        while($data = mysqli_fetch_array($sqlAdmin)) {
            echo "<tr>";
            echo "<td class='text-center'>".$no."</td>";
            echo "<td>".$data['username']."</td>";
            echo "<td>".$data['nama_lengkap']."</td>";
            echo "<td>
            
            <a href='data_admin.php?view=edit&id=$data[id_admin]' class='btn btn-info' role='button'>Edit</a>
            <a href='data_admin.php?view=edit&id=$data[id_admin]' class='btn btn-info' role='button'>Hapus</a>
            
            </td>";
            echo "</tr>";

            $no++;
        }
?>
</table>


<?php include "footer.php"; ?>