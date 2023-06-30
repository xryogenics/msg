<?php
include "header.php";
include "conn.php";

if (isset($_POST["SubmitPelanggan"])) {

  $namaplg = $_POST["namaplg"];
  $ongkir = $_POST["ongkir"];
  $profit = $_POST["profit"];
  $pembayaran = $_POST["pembayaran"];

  mysqli_query($conn, "INSERT INTO `tbl_plg` (`id`, `namaplg`, `ongkos`, `profit`, `pembayaran`) 
                    VALUES ('', '$namaplg', '$ongkir', '$profit', '$pembayaran');");
}

?>
    <br><br><br>
    <div class="modal fade" id="tambahNamaPlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  <form action="" method="post">

                    <div class="form-group">
                      <label for="namaplg"> Nama Pelanggan</label>
                       <input type="text" class="form-control" name="namaplg" required="">
                     </div>

                     <div class="form-group">
                      <label for="ongkir"> Ongkos</label>
                       <input type="number" class="form-control" name="ongkir" required="">
                     </div>

                     <div class="form-group">
                      <label for="pembayaran"> Metode Inputan</label>
                        <select name="pembayaran" id="pembayaran" class="form-control" required="">
                          <option value="" selected="">-- PILIH --</option>
                          <option value="auto">Auto</option>
                          <option value="manual">Manual</option>
                        </select>
                    </div>

                     <div class="form-group">
                      <label for="profit"> Profit 
                        <div class="text-muted small">Jika Metode Inputan Manual Abaikan</div>
                      </label>
                      <input type="number" class="form-control" name="profit" required="" value="0">
                    </div>

                    <button type="submit" name="SubmitPelanggan" class="btn btn-primary">Tambah</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    <div class="container">
        <h1 class="text-center">CUSTOMER</h1><br>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambahNamaPlg">+ Tambah</button>
        <br>
        <table class="table table-striped table-sm ">
          <tr class="bg-danger" style="color: white;">
            <th>Pelaggan</th>
            <th>Ongkos</th>
            <th>Profit</th>
            <th>Inputan</th>
            <th></th>
          </tr>
          <?php 
          $sql = mysqli_query($conn, "SELECT * FROM tbl_plg");
          foreach($sql as $q) :
           ?>
          <tr>
            <td><?= $q["namaplg"]; ?></td>
            <td><?= number_format($q["ongkos"]); ?></td>
            <td><?= number_format($q["profit"]); ?></td>
    
            <?php if("auto" == $q["pembayaran"]): ?>
              <td><span class="badge badge-primary"><?= $q["pembayaran"]; ?></span></td>
              <?php elseif("manual" == $q["pembayaran"]): ?>
              <td><span class="badge badge-success"><?= $q["pembayaran"]; ?></span></td>
            <?php endif; ?>
            
            <td><a class="btn btn-warning" id="hapusPelanggan" href="#" onclick="hapusPelanggan(<?= $q['id']; ?>);">Hapus</a></td>
          </tr>
        <?php endforeach; ?>
        </table><br>
    </div>

    <script>
  //hapus namapelanggan
  function hapusPelanggan(id){
     var cfm = confirm("Yakin Mau Di Hapus???");

      if (cfm === true) {
            window.location.href = "delete.php?idnamaplg="+id;
          }

        };
    </script>
<?php include "footer.php"; ?>