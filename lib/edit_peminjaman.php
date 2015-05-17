<?php
include "../lib/koneksi.php";
$kode 	 = $_POST['kode'];
$karyawan = $_POST['karyawan'];
$petugas = $_POST['petugas'];
$tgl	 = $_POST['tgl'];
$nama	 = $_POST['nama'];
if($karyawan=='0' or $petugas=='0'){
	echo"Data Gagal Disimpan";
}
else{
$query	 = mysql_query("UPDATE inventaris SET  kd_inventaris =  '$kode',kd_karyawan =  '$karyawan',kd_petugas =  '$petugas',
tgl_pinjam =  '$tgl' WHERE  kd_inventaris =  '$kode' ");
if($query){
	header("location:../view/Peminjaman");
}
else{
	echo"Data Gagal Disimpan";
}
}
?>