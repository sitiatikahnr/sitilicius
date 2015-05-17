<?php
include "koneksi.php";

$model = $_POST['model'];
$kategori = $_POST['kode_kategori'];
$merk	  = $_POST['merk'];
$pembuat  = $_POST['kode_pembuat'];
$nama	  = $_POST['nama'];
$thn	  = $_POST['thn'];
if($kategori=='0' or $pembuat=='0'){
	echo"Data Gagal Disimpan";
}
else{
	$query	  = mysql_query("INSERT INTO alat VALUES ('','$nama', '$model', '$kategori', '$merk', '$pembuat', '$thn')");
if($query){
	header("location:../view/Barang");
}
else{echo"Data Gagal Disimpan";}
}
?>