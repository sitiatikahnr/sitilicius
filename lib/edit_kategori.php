<?php
include "koneksi.php";

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$query = mysql_query("UPDATE kategori SET  kd_kategori =  '$kode',kategori_alat =  '$nama' WHERE kd_kategori =  '$kode'");
if($query){
	header("location:../view/Kategori");
}
else{echo"Data Gagal Disimpan";}
?>