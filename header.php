<?php 
include "conn.php";
include "functions.php"
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet">

    <title>MSG</title>
    <div id="loading">LOADING</div>

    <div id="notif"></div>
  </head>
  
  <style>
.containerBurger {
    display: inline-block;
    cursor: pointer;
}

.bar1, .bar2, .bar3 {
    width: 32px;
    height: 5px;
    background-color: #fff;
    margin: 6px 0;
    transition: 0.4s;
}

.change .bar1 {
    -webkit-transform: rotate(-45deg) translate(-9px, 6px);
    transform: rotate(-45deg) translate(-9px, 6px);
}

.change .bar2 {opacity: 0;}

.change .bar3 {
    -webkit-transform: rotate(45deg) translate(-8px, -8px);
    transform: rotate(45deg) translate(-8px, -8px);
}

.switch{
  transform: translate(0px,0px);
}
</style>

  <body>



    <!-- sidemenu -->
    <div id="mySidenav" class="sidenav">
      <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: white">&times;</a> -->
      <div class="bg">
        <p style="color: white;text-align: center;">Menu</p>
        <a href="bulan.php"><span class="lnr lnr-calendar-full mr-3"></span> Data <?= date("F"); ?></a>
        <a href="list.php"> <span class="lnr lnr-text-align-justify mr-3"></span> Full Data</a>
        <a href="edit.php"> <span class="lnr lnr-highlight mr-3"></span> Edit</a>
        <a href="plist.php"><span class="lnr lnr-exit mr-3"></span> Pengeluaran</a>
        <a href="customer.php"><span class="lnr lnr-users mr-3"></span> Customer</a>
      </div>
    </div>

    <nav class="navbar fixed-top navbar-dark bg-danger">
      <a style="background: white; color: black; padding: 5px; border-radius:3px;height: 30px;" class="navbar-brand" href="index.php">
        <b style="color: red;">M</b>
        <b style="color: blue;">S</b>
        <b style="color: green;">G</b>
      </a>
      <ul class="nav justify-content-end">
        <!-- <li class="nav-item">
          <a class="nav-link" href="bulan.php">Data <?= date("F"); ?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list.php">Full Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="edit.php">Edit</a>
        </li> -->
        <li class="nav-item">
          <div class="containerBurger" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div>
          <!-- <span style="font-size:30px;cursor:pointer;color: white; filter: invert(100);" onclick="openNav()"><img src="img/menu.png" alt="" id="tombolMenu"></span>
          <span style="font-size:30px;cursor:pointer;color: white; filter: invert(100);" onclick="closeNav()"><img src="img/close.png" alt="" id="tombolClose" style="display: none;"></span> -->
        </li>
      </ul>
    </nav>

    <script>
      function myFunction(x) {
          x.classList.toggle("change");
          document.getElementById("mySidenav").classList.toggle("switch");
      }
</script>