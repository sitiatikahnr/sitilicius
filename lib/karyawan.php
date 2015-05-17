<?php
include "koneksi.php";

$status = $_POST['status'];
$nama 	= $_POST['nama'];
$ruang	= $_POST['ruang'];
$tgl	= $_POST['tgl'];
$jk		= $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$tlp	= $_POST['tlp'];
$query = mysql_query("INSERT INTO karyawan VALUES ('', '$status', '$nama', '$ruang', '$tgl', '$jk', '$alamat', '$tlp');");
if($query){
	header("location:../view/Karyawan");
}
else{
	echo"Data Gagal Disimpan";
}
?>