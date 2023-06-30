          
          <?php
          include "conn.php"; 
          $sqlNama = mysqli_query($conn, "SELECT namaplg from tbl_plg");

          foreach ($sqlNama as $rm) :

          // $rowNamaPlg = $rm["namaplg"];
          $rowNamaPlg = $rm["namaplg"];
          $sql = mysqli_query($conn, "SELECT tanggal as tanggal FROM tbl_transaksi where namaplg = '$rowNamaPlg' ORDER BY id DESC LIMIT 1 ");

          $row = mysqli_fetch_assoc($sql); //mengambil array
          $row = $row['tanggal']; //mengambil tanggal di array

          $datesql = strtotime($row); //mengubah menjadi milisecond
          $datenow = strtotime(date("Y-M-d")); //mengubah menjadi milisecond
          $selisih = ($datenow - $datesql)/86400; //menghitung selisih hari

          if ($datesql+(60*60*24*3) <= $datenow):?>
          <div class="alert alert-danger shakeClass" role="alert">
            <b class="alert-link" style="color: black;"><?= $rm['namaplg']; ?></b> Sudah <?= $selisih;  ?> Hari Tidak Ngisi!!
          </div>

        <?php 
         endif; 
         endforeach; 
         ?>