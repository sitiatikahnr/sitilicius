<?php 
include "../lib/koneksi.php";
session_start();
if (empty ($_SESSION['username'])){
  header("location:Login");
}
else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Inventaris</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/offcanvas.css" rel="stylesheet">
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    
  </head>

  <body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container" >
        <div class="col-md-8">
        <div class="navbar-header">
          <a class="navbar-brand" href="Beranda"><img src="../image/logo.png" class="logo"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="Beranda"><span class="glyphicon glyphicon-home"></span>&nbsp&nbspBeranda</a></li>
            <li><a href="Profil"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspProfil</a></li>
            <li><a href="../lib/logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp&nbspKeluar</a></li>
          </ul>
               
        </div><!--/.nav-collapse -->
      </div>
      
      </div>
    </div>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            
            <?php
                if($_SESSION['level']==1){
                  echo"<img class='foto' src='../image/2.png' alt='Generic placeholder image'''>Admin $_SESSION[username]";

                }
                else{
                  echo"<img class='foto' src='../image/1.png' alt='Generic placeholder image'''>Petugas  $_SESSION[username]";
                }
            ?>
            
            <a href="Barang" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp&nbspBarang/Alat</a>
            <a href="Kategori" class="list-group-item"><span class="glyphicon glyphicon-tag"></span>&nbsp&nbspKategori</a>
            <a href="Pembuat" class="list-group-item"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspPembuat</a>
            <?php 
            if($_SESSION['level']==1){
              echo"<a href='Petugas' class='list-group-item'><span class='glyphicon glyphicon-user'></span>&nbsp&nbspPetugas</a>";
            }
            else{
              echo"";
            }
            ?>
            
            <a href="Karyawan" class="list-group-item"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspKaryawan</a>
            <a href="Peminjaman" class="list-group-item"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp&nbspPeminjaman</a>
            <a href="Detail_Peminjaman" class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbspDetail Peminjaman</a>
            <a href="Pengembalian" class="list-group-item"><span class="glyphicon glyphicon-cloud-download"></span>&nbsp&nbspPengembalian</a>
            
          </div>
        </div><!--/span-->

        <div class="col-xs-12 col-sm-9">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Beranda </h3>
            </div>
                  
            <div class="panel-body">
              <h3 style="margin:0px; padding:0px;">Beranda</h3><hr>
                <div class="form-group">
                  <div class="tbl1">
                    <center>
                    <h1 class="h1">
                      <?php
                        $query = mysql_query("select * from karyawan");
                        $cek = mysql_num_rows($query);
                        echo"$cek";
                      ?>
                    </h1>
                    <h3>Total Karyawan</h3>
                    </center>
                  </div>
                  <div class="tbl3">
                    <center>
                    <h1 class="h1">
                      <?php
                        $query = mysql_query("select * from petugas");
                        $cek = mysql_num_rows($query);
                        echo"$cek";
                      ?>
                    </h1>
                    <h3>Total Petugas</h3>
                    </center>
                  </div>
                  <div class="tbl3">
                    <center>
                    <h1 class="h1">
                      <?php
                        $query = mysql_query("select * from alat");
                        $cek = mysql_num_rows($query);
                        echo"$cek";
                      ?>
                    </h1>
                    <h3>Total Barang</h3>
                    </center>
                  </div>
                  <div class="tbl2">
                    <center>
                    <h1 class="h1">
                      <?php
                        $query = mysql_query("select * from kategori");
                        $cek = mysql_num_rows($query);
                        echo"$cek";
                      ?>
                    </h1>
                    <h3>Total Kategori</h3>
                    </center>
                  </div>
                   <div class="col-xs-6" style="margin-top:20px; margin-left:-20px;">
                     <div class="panel panel-info" style="margin-right:-32px;">
                        <div class="panel-heading">Barang Terbaru</div>
                       <table class="table table-striped">
                      <tr class="tr">
                       <th>No</th><th>Nama Barang</th></tr>
                        <?php
                        $query = mysql_query("select * from alat order by kd_alat desc limit 5 ");
                        $no=1;
                        while($b =mysql_fetch_array($query)){
                          echo"<tr>
                               <td>$no</td>
                               <td>$b[label_alat]</td>
                               </tr>
                              ";
                              $no++;
                        }
                        ?>
                      </table>
                    </div>
                   </div>
                   <div class="col-xs-6" style="margin-top:20px; margin-left:7px;">
                     <div class="panel panel-info" style="margin-right:-35px;">
                        <div class="panel-heading">Peminjaman</div>
                       <table class="table table-striped">
                       <tr class="tr">
                        <th>No</th><th>Kode Peminjaman</th></tr>
                        <?php
                        $query = mysql_query("select * from inventaris order by kd_inventaris desc limit 5");
                        $no=1;
                        while($b =mysql_fetch_array($query)){
                          echo"<tr>
                               <td>$no</td>
                               <td>$b[kd_inventaris]</td>
                               </tr>
                              ";
                              $no++;
                        }
                        ?>
                      </table>
                    </div>
                   </div>
                   <div class="col-xs-6" style="margin-top:20px; margin-left:-20px;">
                     <div class="panel panel-info" style="margin-right:-32px;">
                        <div class="panel-heading">Petugas Baru</div>
                       <table class="table table-striped">
                       <tr class="tr">
                       <th>No</th><th>Nama Petugas</th></tr>
                        <?php
                        $query = mysql_query("select * from petugas where hak_akses='0' order by kd_petugas desc limit 5");
                        $no=1;
                        while($b =mysql_fetch_array($query)){
                          echo"<tr>
                               <td>$no</td>
                               <td>$b[nama_petugas]</td>
                               </tr>
                              ";
                              $no++;
                        }
                        ?>
                      </table>
                    </div>
                   </div>
                   <div class="col-xs-6" style="margin-top:20px; margin-left:7px;">
                     <div class="panel panel-info" style="margin-right:-35px;">
                        <div class="panel-heading">Karyawan Baru</div>
                       <table class="table table-striped">
                       <tr class="tr">
                       <th>No</th><th>Nama Karyawan</th></tr>
                        <?php
                        $query = mysql_query("select * from karyawan order by kd_karyawan desc limit 5");
                        $no=1;
                        while($b =mysql_fetch_array($query)){
                          echo"<tr>
                               <td>$no</td>
                               <td>$b[nama_karyawan]</td>
                               </tr>
                              ";
                              $no++;
                        }
                        ?>
                      </table>
                    </div>
                   </div>
                </div>
              <br><br>
            </div>
          </div>
        </div><!--/span-->

        
      </div><!--/row-->

      <hr>

      <footer>
       <p>&copy; Siti Atikah N R || 12 RPL B</p>
      </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>
<?php } ?>