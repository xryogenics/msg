<?php include "header.php"; ?>

    <br><br>

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          

              <!-- table -->
            <table class="table table-hover table-striped">
              <thead class="bg-danger" style="color: white;">
                <tr>
                  <th>Pelanggan</th>
                  <th>Tanggal</th>
                  <th>Ongkir</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM tbl_transaksi where month(tanggal) = month(curdate()) ORDER BY id DESC");

                foreach ($result as $row):?>
                <tr>
                  <td><?= $row['namaplg']; ?></td>
                  <td><?= $row['tanggal']; ?></td>
                  <td><?= $row['ongkos']; ?></td>
                </tr>
                <?php endforeach?>
              </tbody>
            </table>
            <!-- end table -->

            
          </div>
        </div>
      </div>
    </div>

<?php include "footer.php"; ?>