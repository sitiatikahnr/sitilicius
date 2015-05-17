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
              Tambah Karyawan &nbsp&nbsp&nbsp<span class="glyphicon glyphicon-hand-right"></span>&nbsp&nbsp&nbsp<a href="Data_Karyawan" style="text-decoration:none; color:blue;">Lihat Data Karyawan</a>
              </h3>
            </div>
            <div class="panel-body">
              <h3 style="margin:0px; padding:0px;">Tambah Karyawan</h3><hr>
                                  <?php
                                 
                                  $a = mysql_query("select * from karyawan where kd_karyawan='$_GET[id]'");
                                  $b = mysql_fetch_array($a);
                                  ?>
              <form role="form" action="../lib/edit_karyawan.php" method="post">
                <div class="form-group">
                  <table border="0" cellpadding="1" cellspacing="2" width="550">
                  <td height="19" colspan="2" align="center" valign="middle">
                  <tr><td width="50"></td>
                  <td width="100">
                  <tr><td></td><td><input type="hidden" name="kode" class="form-control" size="10px"
                  <?php echo"value='$b[kd_karyawan]'";?>></td></tr>
                  <tr><td>Jabatan</td><td><input type="text" name="status" class="form-control" 
                  <?php echo"value='$b[status]'";?>></td></tr>
                  <tr><td>Nama Karyawan</td><td><input type="text" name="nama" class="form-control"
                  <?php echo"value='$b[nama_karyawan]'";?>></td></tr>
                  <tr><td>Ruang</td><td><input type="text" name="ruang" class="form-control"
                  <?php echo"value='$b[ruang]'";?>></td></tr>
                  <tr><td>Tgl Daftar</td><td><input type="text" name="tgl" class="form-control" 
                  <?php echo"value='$b[tgl_daftar]'";?>></td></tr>
                  <tr><td>Jenis Kelamin</td><td>
                  <?php
                  if($b['jenis_kelamin']==L){
                    echo" <p><input type='radio' name='jenis_kelamin' value='L' checked>&nbspLaki-laki
                          <input type='radio' name='jenis_kelamin' value='P'>&nbspPerempuan</p>";
                  }
                  else{
                    echo"<p><input type='radio' name='jenis_kelamin' value='L'>&nbspLaki-laki
                         <input type='radio' name='jenis_kelamin' value='P' checked>&nbspPerempuan</p>";
                  }
                  ?>
                  </td></tr>
                  <tr><td>Alamat</td><td><textarea name="alamat" class="form-control" rows="3"><?php echo"$b[alamat]";?></textarea></td></tr>
                  <tr><td>Telepon</td><td><input type="text" name="tlp" class="form-control" 
                  <?php echo"value='$b[tlp]'";?>></td></tr>
                  </table>
                </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <br><br>

              <table class="table table-striped">
                <tr><th>No</th><th>Nama Karyawan</th><th>Alamat</th><th>No Tlp</th><th>Aksi</th></tr>
                          <?php
                           
                            $a=mysql_query("select * from karyawan");
                            while($b=mysql_fetch_array($a)){
                              echo"
                                    <tr>
                                    <td>$b[kd_karyawan]</td>
                                    <td>$b[nama_karyawan]</td>
                                    <td>$b[alamat]</td>
                                    <td>$b[tlp]</td>
                                    <td>
                                    <a href='Edit_Karyawan?id=$b[kd_karyawan]'><span class='glyphicon glyphicon-pencil'></span></a>&nbsp
                                    <a href='../lib/hapus.php?lib=karyawan&id=$b[kd_karyawan]'><span class='glyphicon glyphicon-trash'></span></a>
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