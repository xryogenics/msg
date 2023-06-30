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
            <form action="" method="post">
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



     <div class="row">
         <div class="col">
            <br><br>
            <?php 
            if (isset($_POST["bulan"])): 
                $tahunPOST = $_POST["tahun"];
                $bulanPOST = $_POST["bulan"];
            ?>
            <h1 class="text-center">
                <?= date_format(date_create_from_format('m', $bulanPOST), 'F')." - ".$tahunPOST; ?>        
            </h1>
             <table class="table table-hover table-sm table-bordered  table-striped">
                 <tr class="bg-danger" style="color: white;">
                     <th>Pelanggan</th>
                     <th>Tanggal</th>
                     <th>ongkir</th>
                     <th>NetProfit</th>
                 </tr>
                 <?php 
                 $sql = mysqli_query($conn, "SELECT * FROM tbl_transaksi WHERE month(tanggal) = '$bulanPOST' AND year(tanggal) = '$tahunPOST'");
                 foreach($sql as $s):
                  ?>
                 <tr class="text-center">
                     <td><?= $s["namaplg"]; ?></td>
                     <td><?= $s["tanggal"]; ?></td>
                     <td><?= number_format($s["ongkos"]); ?></td>
                     <td><?= number_format($s["profit"]); ?></td>
                 </tr>
             <?php endforeach; ?>
                <tr style="color: white;">
                <td class="bg-dark">Profit - Ongkir = NetProfit</td>
                <th class="bg-dark">
                    <?php
                  $result = mysqli_query($conn, "SELECT SUM(profit)+SUM(ongkos) as hasil FROM `tbl_transaksi` WHERE month(tanggal) = '$bulanPOST' AND year(tanggal) = '$tahunPOST'");
                  $row = mysqli_fetch_assoc($result);
                  echo "Rp. ".number_format($row['hasil']);
                  ?>
                </th>
                <th class="bg-dark">
                  <?php
                  $result = mysqli_query($conn, "SELECT SUM(ongkos) as ongkos FROM `tbl_transaksi` WHERE month(tanggal) = '$bulanPOST' AND year(tanggal) = '$tahunPOST'");
                  $row = mysqli_fetch_assoc($result);
                  echo "Rp. ".number_format($row['ongkos']);
                  ?>
                </th>
                <th class="bg-dark">
                  <?php
                  $result = mysqli_query($conn, "SELECT SUM(profit) as profit FROM `tbl_transaksi` WHERE month(tanggal) = '$bulanPOST' AND year(tanggal) = '$tahunPOST'");
                  $row = mysqli_fetch_assoc($result);
                  echo "Rp. ".number_format($row['profit']);
                  ?>
                </th>
              </tr>
             </table>
             <?php else: ?>
                <h1 class="text-center">Pilih Bulan Terlebih Dahulu</h1>
         <?php endif; ?>
         </div>
     </div>
 </div><br><br>

 <?php include "footer.php"; ?>