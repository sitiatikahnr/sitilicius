<?php
   include "../lib/koneksi.php";
   session_start();
   if(empty ($_SESSION['username'])){
    
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Inventaris Barang</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    <link href="../css/jumbotron-narrow.css" rel="stylesheet">

  </head>

  <body>

    <div class="container" >
     <div class="jumbotron" style="background-color:#CCCCFF;">
       <h1 style="font-family:'Courier New'; color:#09C; "><span class="jumbotron;">
       <img src="../image/3.png" style=" height:150px; width:150px;"></span>LOGIN</h1>
     
        <form action="../lib/login.php" method="post" >
        <form class="form-signin" role="form">
        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus size="70px;">
        <input type="password" class="form-control" name="password" placeholder="Password" required size="70px;">
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      </div>

     

    </div> <!-- /container -->


   
  </body>
</html>
<?php 
   }
   else{ header("location:Beranda");} ?>