<?php 
include "conn.php";
include "header.php";
$namaBulan = mysqli_query($conn, "SELECT DISTINCT month(tanggal) as bulan FROM tbl_transaksi");
 ?>
 <br>
 <br>
 <br>
 <div class="container">
            <h1 class="text-center">Data Bulanan</h1><br>
            <form action="" method="post" id="formInput">
                <div class="form-row">

                <div class="form-group col-sm-6">
                <select name="bulan" id="bulan" class="form-control" required>
                    <option value="" selected>--Pilih Bulan--</option>
                    <?php
                        $bulan = mysqli_query($conn, "SELECT DISTINCT month(tanggal) as bulan, year(tanggal) as tahun FROM tbl_transaksi ORDER BY tanggal asc");
                        foreach($bulan as $bl):
                        $sqlBulan = $bl["bulan"];
                        $sqlTahun = $bl["tahun"]; 
                        ?>
                        <option value="<?= $bl["bulan"]; ?>">
                        <?php
                        $date = date_create_from_format('m', $bl['bulan']); 
                        echo date_format($date, 'F'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                </div>

                <div class="form-group col-sm-6">
                <select name="tahun" id="bulan" class="form-control" required>
                    <option value="" selected>--Pilih Tahun--</option>
                    <?php
                    $tahun = mysqli_query($conn, "SELECT DISTINCT year(tanggal) as tahun FROM tbl_transaksi");
                        foreach($tahun as $th):
                        ?>
                        <option value="<?= $th["tahun"]; ?>">
                        <?php
                        $date = date_create_from_format('Y', $th['tahun']); 
                        echo date_format($date, 'Y'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                </div>
                </div>
                <div class="form-group">
                    <button class="form-control btn btn-primary" type="submit" name="submit">OK</button>    
                </div>
            </form>
    <h1 class="text-center" id="loading" style="display:none;">LOADING . . .</h1><br>
    <div id="table-bulan"></div>

 <?php include "footer.php"; ?>