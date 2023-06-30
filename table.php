<?php 
include "conn.php";
 ?>
<table class="table table-hover table-sm table-bordered table-responsive-sm table-striped">
              <thead class="bg-danger" style="color: white;">
                <tr>
                  <th>Pelanggan</th>
                  <th>Tanggal</th>
                  <th>Ongkir</th>
                  <th>NetProfit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM `tbl_transaksi` where month(tanggal) = month(curdate()) ORDER BY(id) DESC");

                foreach ($result as $row):?>
                <tr>
                  <td><?= $row['namaplg']; ?></td>
                  <td>
                    <div class="badge badge-primary">
                    <?php
                      $date = date_create($row['tanggal']);
                      echo date_format($date,"d-m-Y"); 
                    ?>
                      
                    </div>
                   </td>
                  <td><?= number_format($row['ongkos']); ?></td>
                  <td><?= number_format($row['profit']);?></td>
                </tr>
                <?php endforeach?>
              </tbody>
              <tr>
                <td colspan="4" class="text-center">TOTAL</td>
              </tr>
              <tr style="color: white;">
                <td colspan="1" class="bg-dark">Profit - Ongkir = NetProfit</td>
                <td class="bg-dark">    
                    <?php
                  $result = mysqli_query($conn, "SELECT SUM(profit)+SUM(ongkos) as hasil FROM `tbl_transaksi` WHERE date(tanggal) = date(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo "Rp. ".number_format($row['hasil']);
                  ?>
                  <br>
                  <?php
                  $result = mysqli_query($conn, "SELECT SUM(ongkos) as ongkos FROM `tbl_transaksi` WHERE date(tanggal) = date(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo "Rp. ".number_format($row['ongkos']);
                  ?>
                  <br>
                  <?php
                  $result = mysqli_query($conn, "SELECT SUM(profit) as profit FROM `tbl_transaksi` WHERE date(tanggal) = date(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo "Rp. ".number_format($row['profit']);
                  ?>
                </td>
              </tr>
            </table>