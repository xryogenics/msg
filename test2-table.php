<?php include "conn.php" ?>
     <div class="row">
         <div class="col">
            <br><br>
            <?php 
            if (isset($_POST["bulan"])): 
                $tahunPOST = $_POST["tahun"];
                $bulanPOST = $_POST["bulan"];
            ?>
            <h1 class="text-center">
                <?php 
                $totalQuery = mysqli_query($conn, "SELECT count(*) as total FROM tbl_transaksi WHERE month(tanggal) = '$bulanPOST' AND year(tanggal) = '$tahunPOST'");
                $totalQuery = mysqli_fetch_assoc($totalQuery);
                 echo date_format(date_create_from_format('m', $bulanPOST), 'F')." - ".$tahunPOST;
                echo "<br>";
                echo "Total Kiriman : ".$totalQuery["total"];
                ?>
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