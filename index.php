<?php include "header.php"; ?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center"><br>
        <div class="marquee">
          <marquee behavior="" direction="">Harga BBM Terkini: Pertalite Rp.7800,- || Pertamax Rp10400,-</marquee>

          <div id="peringatan"></div>
          
        </div><br><br>

      </div>
    </div>

    <section id="card">
      <div class="container">
        <div class="row">

          <div class="col-sm-3 col-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center">Ongkir Hari ini</h5>
                <p class="card-text text-center font-weight-bold">
                  <?php 
                  $result = mysqli_query($conn,"SELECT SUM(ongkos) FROM tbl_transaksi where date(tanggal) = date(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo number_format($row['SUM(ongkos)']);
                   ?>
                </p>
                
              </div>
            </div>
          </div>

          <div class="col-sm-3 col-6">
            <div class="card">
              <div class="card-body2">
                <h5 class="card-title2 text-center">Kiriman Hari ini</h5>
                <p class="card-text text-center font-weight-bold">
                  <?php 
                  $result = mysqli_query($conn, "SELECT COUNT(*) FROM tbl_transaksi where date(Tanggal) = date(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo number_format($row["COUNT(*)"]);
                   ?>
                </p>
                
              </div>
            </div>
          </div>

          <div class="col-sm-3 col-6">
            <div class="card">
              <div class="card-body3">
                <h5 class="card-title3 text-center">NetProfit Bulan ini</h5>
                <p class="card-text text-center font-weight-bold">
                  <?php 
                  $result = mysqli_query($conn,"SELECT SUM(profit) FROM tbl_transaksi where month(tanggal) = month(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo number_format($row['SUM(profit)']);
                   ?>
                </p>
                
              </div>
            </div>
          </div>

          <div class="col-sm-3 col-6">
            <div class="card">
              <div class="card-body4">
                <h5 class="card-title4 text-center">Kiriman Bulan ini</h5>
                <p class="card-text text-center font-weight-bold">
                  <?php 
                  $result = mysqli_query($conn, "SELECT COUNT(*) FROM tbl_transaksi where month(Tanggal) = month(curdate())");
                  $row = mysqli_fetch_assoc($result);
                  echo number_format($row["COUNT(*)"]);
                   ?>
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Data Kiriman Bulan ini</h1>
            <hr>
            <!-- button tambah -->
            <h3 class="text-center">Input Kiriman</h3>
            <div class="container">
              <div class="row text-center">
                <div class="col">
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#inputAuto">Auto</a></br></br>
                </div>
                <div class="col">
                  <a href="#" class="btn-right btn btn-danger" data-toggle="modal" data-target="#inputManual">Manual</a></br></br>
                </div>
              </div>
            </div><br><br><br>
            <!-- Modal Manual -->
          <div class="modal fade" id="inputManual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Manual</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="inputManualClose">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  <form action="" method="post" id="formManual">
                     
                     <div class="form-group">
                      <label for="namaplg"> Customer</label>
                       <select name="namaManual" class="form-control" id="namaManual">
                        <?php
                          $result = mysqli_query($conn, "SELECT * FROM tbl_plg WHERE pembayaran = 'manual' "); 
                          foreach ($result as $key) : ?>
                            <option value="<?php echo $key['namaplg']; ?>"><?php echo $key['namaplg']; ?></option>
                        <?php endforeach; ?>
                       </select>
                     </div>

                     <div class="form-group">
                      <label for="namaplg"> Setoran dari Customer</label>
                        <input type="text" name="profitManual" class="form-control" >
                     </div>

                     <div class="form-group">
                       <label for="modal"> Modal Bensin</label>
                       <input type="text" name="modalInput" class="form-control">
                     </div>

                    <button type="submit" name="SubmitManual" class="btn btn-primary" id="SubmitManual">Tambah</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
            <!-- Modal Auto -->
          <div class="modal fade" id="inputAuto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="inputAutoClose">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  <form action="" method="post" id="formAuto">

                    <div class="form-group">
                      <label for="namaplg"> Nama Pelanggan</label>
                       <select name="namaplg" class="form-control" id="namaplg">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM tbl_plg WHERE pembayaran = 'auto' "); 
                        foreach ($result as $key) : ?>
                        <option value="<?php echo $key['id']; ?>"><?php echo $key['namaplg']; ?></option>
                        <?php endforeach; ?>
                       </select>
                     </div>

                    <button id="SubmitData" type="submit" name="SubmitData" class="btn btn-primary">Tambah</button>

                  </form>


                </div>
              </div>
            </div>
          </div>

          <!-- Modal Pengeluaran -->
          <div class="modal fade" id="pengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="inputPengeluaran">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  <form action="" method="post" id="formPengeluaran">

                    <div class="form-group">
                      <label for="namaplg"> Nama Pengeluaran</label>
                       <input type="text" class="form-control" name="namaPengeluaran" required="">
                     </div>

                     <div class="form-group">
                      <label for="namaplg"> Jumlah Pengeluaran</label>
                       <input type="number" class="form-control" name="hargaPengeluaran">
                     </div>

                    <button type="submit" name="SubmitPengeluaran" class="btn btn-primary" id="SubmitPengeluaran">Tambah</button>

                  </form>
                  
                </div>
              </div>
            </div>
          </div>

            <!-- table -->
            <div id="index-table"></div>
            <!-- end table -->

          </div>  
        </div>
      </div>
    </section>

    <!-- <section id="printout">
      <div id="containerPengeluaran"></div>
    </section> -->

<?php include "footer.php"; ?>