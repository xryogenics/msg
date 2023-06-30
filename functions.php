<?php 

function cuaca(){

  date_default_timezone_set('Asia/Jakarta');
  $date = date("G:i");

  if($date <= 8){
    echo "Pagi";
  }else if($date <= 10){
    echo "Pagi Menjelang siang";
  }else if ($date <= 15) {
    echo "Siang";
  }else if ($date <= 18) {
    echo "Sore";
  }else if ($date <= 24) {
    echo "Malam";
  }

}

// function notifDelete(){
// 	echo "<div class="alert alert-success" id="success-alert" style="position: fixed; width: 100%; margin-top: 10%; z-index:1000;">
//           <button type="button" class="close" data-dismiss="alert">x</button>
//             <strong>Success! </strong>
//               Berhasil Di Hapus!
//         </div>";
// }

 ?>