<?php
include "koneksi.php";

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$kota = $_POST['kota'];
$query = mysql_query("UPDATE pembuat SET  kd_pembuat =  '$kode',nama_pembuat =  '$nama',kota =  '$kota' WHERE kd_pembuat =  '$kode' ");
if($query){
	header("location:../view/Pembuat");
}
else{
	echo"Data Gagal Disimpan";
}
?>