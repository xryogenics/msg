<?php
include "header.php";

?>

    <br><br>

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          
              <!-- table -->
            <table class="table table-hover table-sm table-striped">
              <thead class="bg-warning">
                <tr>
                  <th>Pelanggan</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM tbl_transaksi ORDER BY id DESC");

                foreach ($result as $row):?>
                <tr>
                  <td><?= $row['namaplg']; ?></td>
                  <td><?= $row['tanggal']; ?></td>
                  <td>
                    <a class="btn btn-warning" href="edited.php?id=<?=$row['id'];?>">Edit</a>
                  </td>
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