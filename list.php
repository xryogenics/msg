<?php 
include "conn.php";
include "header.php";
$namaBulan = mysqli_query($conn, "SELECT DISTINCT month(tanggal) as bulan FROM tbl_transaksi");
 ?>
 <br>
 <br>
 <br>
 <div class="container">
            <h1 class="text-center">Full Data</h1><br>
            <form action="" method="post" id="formInputFulldata">

                <div class="form-group">
                <select name="selectNama" id="selectNama" class="form-control" required>
                    <option value="" selected>--Pilih Nama Pelanggan--</option>
                    <?php
                        $namaplg = mysqli_query($conn, "SELECT * FROM tbl_plg");
                        foreach($namaplg as $nama):
                        ?>
                        <option value="<?= $nama["namaplg"]; ?>">
                        <?php echo $nama["namaplg"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                </div>

                <div class="form-group">
                    <button class="form-control btn btn-primary" type="submit" name="submit">OK</button>    
                </div>
            </form>
    <h1 class="text-center" id="loading" style="display:none;">LOADING . . .</h1><br>
    <div id="table-list"></div>

 <?php include "footer.php";?>