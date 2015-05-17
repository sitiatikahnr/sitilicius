<?php
include "koneksi.php";
$kode = $_POST['kode'];
$nama = $_POST['nama'];

$query = mysql_query("update detail_inventaris set kd_inventaris='$kode', kd_alat='$nama' where kd_inventaris='$kode'");
if($query){
	header("location:../view/Cari_Peminjaman");
}
else{
	header("location:../view/Edit_Detail");
}
?>