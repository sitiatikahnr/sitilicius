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
              Tambah Peminjaman &nbsp&nbsp&nbsp<span class="glyphicon glyphicon-hand-right"></span>&nbsp&nbsp&nbsp<a href="Data_Peminjaman" style="text-decoration:none; color:blue;">Lihat Data Peminjaman</a>
              </h3>
            </div>
            <div class="panel-body">
              <h3 style="margin:0px; padding:0px;">Tambah Peminjaman</h3><hr>
              <form role="form" action="../lib/edit_peminjaman.php" method="post">
                                         <?php
                                          $a = mysql_query("select inventaris.kd_inventaris,karyawan.nama_karyawan,petugas.nama_petugas,inventaris.tgl_pinjam,petugas.kd_petugas,karyawan.kd_karyawan from inventaris,karyawan,petugas
                                          where kd_inventaris='$_GET[id]'");
                                          $e = mysql_fetch_array($a);
                                          
                                          ?>
                <div class="form-group">
                 <table border="0" cellpadding="1" cellspacing="2" width="550">
                  <td height="19" colspan="2" align="center" valign="middle">
                  <tr><td width="50"></td>
                  <td width="100">
                  <tr><td>Kode Inventaris</td><td><input type="hidden" name="kode" class="form-control" size="10px"
                                                  <?php echo"value='$e[kd_inventaris]'";?>><?php echo"$e[kd_inventaris]";?></td></tr>
                  <tr><td>Karyawan</td><td><select name="karyawan" class="form-control">
                                            <option<?php echo"value='$e[kd_karyawan]'";?>><?php echo"$e[nama_karyawan]";?></option>
                                            <?php
                                            $query = mysql_query("select * from karyawan");
                                            while($b=mysql_fetch_array($query)){
                                              echo"<option value='$b[kd_karyawan]'>$b[nama_karyawan]</option>";
                                            }
                                            ?>
                                           </select></td></tr>
                  <tr><td>Petugas</td><td><?php
                                            if($_SESSION['level']==1){
                                              echo"
                                              <select name='petugas' class='form-control'>
                                              <option value='$e[kd_petugas]'>$e[nama_petugas]</option>
                                              ";
                                              $query = mysql_query("select * from petugas");
                                              while ($b = mysql_fetch_array($query)) {
                                               echo"<option value='$b[kd_petugas]'>$b[nama_petugas]</option>";
                                              }
                                            }else{
                                              echo"
                                              <input type='hidden' name='petugas' class='form-control' size='10px' value=$e[inven_petugas]>$e[inven_petugas]
                                              ";
                                            }

                                            ?>
                                          </select></td></tr>
                  <tr><td>Tanggal Pinjam</td><td><input type="date" name="tgl" class="form-control"
                                                 <?php echo"value='$e[tgl_pinjam]'";?>></td></tr>
                  
                  </table>
                </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <br><br>

              <table class="table table-striped">
                <tr><th>Kode Inventaris</th><th>Nama Peminjam</th><th>Petugas</th><th>Tgl Pinjam</th><th>Aksi</th></tr>
                                <?php
                                 $a=mysql_query("select inventaris.kd_inventaris,karyawan.nama_karyawan,petugas.nama_petugas,inventaris.tgl_pinjam from inventaris,karyawan,petugas
                        where inventaris.kd_karyawan=karyawan.kd_karyawan and inventaris.kd_petugas=petugas.kd_petugas order by kd_inventaris desc limit 5");
                                    while($d=mysql_fetch_array($a)){
                                      echo"
                                          <tr>
                                          <td>$d[kd_inventaris]</td>
                                          <td>$d[nama_karyawan]</td>
                                          <td>$d[nama_petugas]</td>
                                          <td>$d[tgl_pinjam]</td>
                                          <td>
                                          <a href='Edit_Peminjaman?id=$d[kd_inventaris]'><span class='glyphicon glyphicon-pencil'></span></a>&nbsp
                                          <a href='../lib/hapus.php?lib=peminjaman&id=$d[kd_inventaris]'><span class='glyphicon glyphicon-trash'></span></a>
                                      ";
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