
// $(window).scroll(function(){

// 	var WS = $(this).scrollTop();

// 	$('.jumbotron h1').css({
// 		'transform' : 'translate(0px, '+ WS/2 +'%)'
// 	});

// 	$('.jumbotron h2').css({
// 		'transform' : 'translate(0px, '+ WS/1 +'%)'
// 	});

// });

//card di home
$(window).on('load', function() { //jquery menjalankan function saat windows load atau refresh
	$('#card .card').each(function(i){ //setiap elemen akan menjalankan funtion berikut
		setTimeout(function(){ 
			$('#card .card').eq(i).addClass('cardMuncul');


		}, 200 * i);

	});

});


//sidebar
$('#tombolMenu').click(function(){
	$(this).hide();
	$('#tombolClose').show();
});

$('#tombolClose').click(function(){
	$(this).hide();
	$('#tombolMenu').show();
});

/* Open the sidenav */
function openNav() {
    document.getElementById("mySidenav").style.transform = "translate(0px,0px)";
};

/* Close/hide the sidenav */
function closeNav() {
    document.getElementById("mySidenav").style.transform = "translate(170px,0px)";
};
//sidebar


    //form full data bulanan
    $(document).ready(function(){
      $("#table-list").load("list-table.php");
      $("#index-table").load("index-table.php");
      $("#containerPengeluaran").load("pengeluaran-table.php");

      //full data by tahun dan bulan
      $('#formInput').submit(function(e){
        e.preventDefault();
          $.ajax({
            'type': 'POST',
            'url': 'test2-table.php',
            'beforeSend': function(){
              $('#loading').show();
              $('#table-bulan').hide();  
            },
            'data': $(this).serialize(),
            'success': function(html){
                $('#loading').hide();
                $('#table-bulan').show();
              $('#table-bulan').html(html);
            }
          });
        });

            //full data by nama pelanggan
            $('#formInputFulldata').submit(function(e){
              e.preventDefault();
              $.ajax({
                'type': 'POST',
                'url': 'list-table.php',
                'beforeSend': function(){
                  $('#loading').show();
                  $('#table-list').hide();  
                },
                'data': $(this).serialize(),
                'success': function(html){
                    $('#loading').hide();
                    $('#table-list').show();
                  $('#table-list').html(html);
                  $('html, body').animate({
                        scrollTop: $('#table-list').offset().top
                    }, 1000);
                }
              });
            });

});

$(document).ready(function(){
  $('.alert-success').hide();
              //MODAL AUTO INPUT
    $('#SubmitData').on('click',function(){
      $('#inputAutoClose').trigger('click');

      $.ajax({
        url:'koneksi-table.php',
        data:$('#formAuto').serialize(),
        dataType:'text',
        type:'post',
        beforeSend:function(){
          $("#loading").show();
        },
        success:function(e){
          console.log(e);
          $("#loading").hide();
          // $("#notif").html(e).slideUp(3000);
        },
        error:function(err){
          console.error(err);
          alert(err);
        }
      });
      return false;
    });

        //MODAL MANUAL INPUT
    $('#SubmitManual').one('click',function(){
      $('#inputManualClose').trigger('click');

      $.ajax({
        url:'koneksi-table.php',
        data:$('#formManual').serialize(),
        dataType:'text',
        type:'post',
        success:function(e){
          console.log(e);
          // $('#notif').html(e).slideUp(3000);
          $('#formManual').trigger("reset");
        },
        error:function(err){
          console.error(err);
          alert(err);
        }
      });
      return false;
    });

        //MODAL PENGELUARAN INPUT
    $('#SubmitPengeluaran').one('click', function(e){
      e.preventDefault();
      $('#inputPengeluaran').trigger('click');

      $.ajax({
        url:'koneksi-table.php',
        data:$('#formPengeluaran').serialize(),
        dataType:'text',
        type:'post',
        success:function(e){
          console.log(e);
          alert(e);
          $('#formPengeluaran').trigger("reset");
        },
        error:function(err){
          console.error(err);
          alert(err);
        }
      });
    });

    document.getElementById('SubmitData').onclick = function() {
      setTimeout(function(){
        $('#index-table').load("index-table.php").fadeIn("slow");
          $('#containerPengeluaran').load("pengeluaran-table.php").fadeIn("slow");
          $('#peringatan').load('peringatan.php').fadeIn("slow");
          alert("Berhasil Di Tambahkan");
       }, 1000);
       console.log("Submit Auto Berhasil");
    };

    document.getElementById('SubmitManual').onclick = function() {
      setTimeout(function(){
        $('#index-table').load("index-table.php").fadeIn("slow");
          $('#containerPengeluaran').load("pengeluaran-table.php").fadeIn("slow");
          $('#peringatan').load('peringatan.php').fadeIn("slow");
          alert("Berhasil Di Tambahkan");
       }, 1000);
      console.log("Submit Manual Berhasil");
    };

});

$(document).ready(function(){
  $('#peringatan').load('peringatan.php');
});


//scrolling
$(document).ready(function() {
  
  var scrollLink = $('.scroll');
  
  // Smooth scrolling
  scrollLink.click(function(e) {
    e.preventDefault();
    $('body,html').animate({
      scrollTop: $(this.hash).offset().top - 66
    }, 500, 'swing' );
  });

    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
        });  
  
});