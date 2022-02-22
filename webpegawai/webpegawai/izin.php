<?php include "header.php"; ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
    title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
    </header>

    <div id="Flight" class="w3-container w3-white w3-padding-16 myLink">
        <h3>Silahkan berikan keterangan anda</h3>
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
                        <label>Keterangan</label>
                        <input class="w3-input w3-border" type="text" placeholder="Name">
                    </div>
                    <div class="w3-row-padding" style="margin:0 -8px;">
                        <div class="w3-half">
                            <label>Alasan</label>
                            <input class="w3-input w3-border" type="text" placeholder="Name">
                        </div>
                        <div class="w3-row-padding" style="margin:0 -8px;">
                            <div class="w3-half">
                                <label>Waktu</label>
                                <input class="w3-input w3-border" type="text" placeholder="00:00 30-12-2000">
                            </div>
                        </div>
                        <p><button class="w3-button w3-blue">Submit</button></p>
                        <p><button class="w3-button w3-red">Batal</button></p>
                    </div>


                </div>

                <?php include "footer.php"; ?>