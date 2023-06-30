<?php include "conn.php" ?>
     <div class="row">
         <div class="col">
            <br><br>
            <?php 
            if (isset($_POST["selectNama"])): 
              $namaplg = $_POST["selectNama"];
            ?>
            <h1 class="text-center">
                <?= $namaplg ?>        
            </h1>
             <table class="table table-hover table-sm table-bordered  table-striped">
                 <tr class="bg-danger" style="color: white;">
                     <th>Pelanggan</th>
                     <th>Tanggal</th>
                     <th>ongkir</th>
                     <th>NetProfit</th>
                 </tr>
                 <?php 
                 $sql = mysqli_query($conn, "SELECT * FROM tbl_transaksi WHERE namaplg = '$namaplg'");
                 foreach($sql as $s):
                  ?>
                 <tr class="text-center">
                     <td><?= $s["namaplg"]; ?></td>
                     <td><?= $s["tanggal"]; ?></td>
                     <td><?= number_format($s["ongkos"]); ?></td>
                     <td><?= number_format($s["profit"]); ?></td>
                 </tr>
             <?php endforeach; ?>
             </table>
             <?php else: ?>
                <h1 class="text-center">Pilih Nama Pelanggan Terlebih Dahulu</h1>
         <?php endif; ?>
         </div>
     </div>
 </div><br><br>