<?php
include "koneksi.php";

$nama = $_POST['nama'];
$kota = $_POST['kota'];
$query = mysql_query("INSERT INTO pembuat VALUES('','$nama','$kota')");
if($query){
	header("location:../view/Pembuat");
}
else{
	echo"Data Gagal Disimpan";
}
?>