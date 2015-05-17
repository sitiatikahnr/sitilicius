<?php
include "../lib/koneksi.php";
session_start();
if(empty($_SESSION['username'])){
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
      <div class="col-md-4" style="margin:0px;padding:0px;">
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
              <h3 class="panel-title">
              Data Barang &nbsp&nbsp&nbsp<span class="glyphicon glyphicon-hand-right"></span>&nbsp&nbsp&nbsp<a href="Barang" style="text-decoration:none; color:blue;">Tambah Data Barang</a>
              </h3>
            </div>

            <div class="panel-body">
            <form class="navbar-form pull-right" action="Cari_Barang" method="post">
              <div class="form-group" style='margin-right:0px;padding-right:0px;margin-left:30px;'>
              <input type="text" class="form-control" placeholder="Search" name="cari" size='30'>
              </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
              <h3 style="margin:0px; padding:0px;">Hasil Cari</h3><hr>
              <table class='table table-striped'>
              <tr><th>No</th><th>Nama Barang</th><th>Kategori</th><th>Merk</th><th>Pembuat</th><th>Tahun Buat</th><th>Aksi</th></tr>
                        <?php
                        $a = mysql_query("select * from alat where label_alat like '%$_POST[cari]%'");
                        $hitung = mysql_num_rows($a);
                        $no=1;
                        if($hitung==0){echo"Data yang anda cari tidak ada";}
                          else{
                            while($b = mysql_fetch_array($a)){
                              $ru=mysql_fetch_array(mysql_query("select * from kategori where kd_kategori='$b[kd_kategori]'"));
                              $re=mysql_fetch_array(mysql_query("select * from pembuat where kd_pembuat='$b[kd_pembuat]'"));
                            echo"
                                <tr>
                                <td>$no</td>
                                <td>$b[label_alat]</td>
                                <td>$ru[kategori_alat]</td>
                                <td>$b[merk]</td>
                                <td>$re[nama_pembuat]</td>
                                <td>$b[thn_buat]</td>
                                <td>
                                <a href='Edit_Barang.php?id=$b[kd_alat]'><span class='glyphicon glyphicon-pencil'></span></a>
                                <a href='../lib/hapus.php?lib=barang&id=$b[kd_alat]'><span class='glyphicon glyphicon-trash'></span></a>
                                ";
                                $no++;
                        }
                        }
                        ?>
                </td>
                </tr>
              </table>
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