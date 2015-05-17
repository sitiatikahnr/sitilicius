<?php
include "koneksi.php";

$kode 	 = $_POST['kode'];
$karyawan = $_POST['karyawan'];
$petugas = $_POST['petugas'];
$tgl	 = $_POST['tgl'];
if($karyawan=='0' or $petugas=='0'){
	echo"Data Gagal Disimpan";
}
else{
$query	 = mysql_query("INSERT INTO inventaris VALUES ('$kode','$karyawan','$petugas','$tgl')");
if($query){
	header("location:../view/Peminjaman");
}
else{
	echo"Data Gagal Disimpan";
}
}
?>