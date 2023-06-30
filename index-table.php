<?php 
include "conn.php";
 ?>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 
            Note: <small class="form-text badge badge-danger">Profit - Ongkir = NetProfit</small>
            <table class="table table-sm table-responsive-sm table-striped table-bordered">
              <thead class="" style="color:white;background: #7d7d7d">
                <tr>
                  <th width="40%">Pelanggan</th>
                  <th width="10%">Tanggal</th>
                  <th>Ongkir</th>
                  <th>NetProfit</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                  $today = mysqli_query($conn, "SELECT * FROM `tbl_transaksi` where day(tanggal) = day(curdate()) AND month(tanggal) = month(curdate()) AND month(tanggal) = month(curdate()) ORDER BY(id) DESC");
                  $todayNum = mysqli_num_rows($today);

                  if($todayNum > 0):?>
                      <?php foreach($today as $t): ?>
                      <tr class="" style="border-left: 5px solid rgba(93, 191, 63, 0.5); margin-bottom: 2px;">
                          <td><?= $t['namaplg']; ?></td>
                          <td class="text-center">
                            <b  style="background: grey;color: white;border-radius: 5px;padding: 3px;"><?php
                              $date = date_create($t['tanggal']);
                              echo date_format($date,"d"); 
                            ?></b>
                           </td>
                          <td><?= number_format($t['ongkos']); ?></td>
                          <td><?= number_format($t['profit']);?></td>
                      </tr>
                      <?php endforeach; ?>
                <?php endif; ?>

                <?php
                $result = mysqli_query($conn, "SELECT * FROM `tbl_transaksi` where year(tanggal) = year(curdate()) && month(tanggal) = month(curdate()) && day(tanggal) != day(curdate()) ORDER BY(id) DESC");
                foreach ($result as $row):?>
                <tr>
                  <td><?= $row['namaplg']; ?></td>
                  <td class="text-center">
                    <b  style="background: grey;color: white;border-radius: 5px;padding: 3px;"><?php
                      $date = date_create($row['tanggal']);
                      echo date_format($date,"d"); 
                    ?></b>
                   </td>
                  <td><?= number_format($row['ongkos']); ?></td>
                  <td><?= number_format($row['profit']);?></td>
                </tr>
                  <?php endforeach; ?>
              </tbody>


              <tr>
                <td colspan="4" class="text-center">TOTAL</td>
              </tr>
              <tr style="color: white;">
                <td class="bg-dark">Profit - Ongkir = NetProfit</td>
                <th class="bg-dark">
                    <?php
                  $result = mysqli_query($conn, "SELECT SUM(profit)+SUM(ongkos) as hasil FROM `tbl_transaksi` WHERE date(tanggal) = date(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo "Rp. ".number_format($row['hasil']);
                  ?>
                </th>
                <th class="bg-dark">
                  <?php
                  $result = mysqli_query($conn, "SELECT SUM(ongkos) as ongkos FROM `tbl_transaksi` WHERE date(tanggal) = date(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo "Rp. ".number_format($row['ongkos']);
                  ?>
                </th>
                <th class="bg-dark">
                  <?php
                  $result = mysqli_query($conn, "SELECT SUM(profit) as profit FROM `tbl_transaksi` WHERE date(tanggal) = date(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo "Rp. ".number_format($row['profit']);
                  ?>
                </th>
              </tr>
            </table>