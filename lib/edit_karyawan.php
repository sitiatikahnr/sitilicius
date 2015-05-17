<?php
include "koneksi.php";

$kode = $_POST['kode'];
$status = $_POST['status'];
$nama 	= $_POST['nama'];
$ruang	= $_POST['ruang'];
$tgl	= $_POST['tgl'];
$jk		= $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$tlp	= $_POST['tlp'];
$query = mysql_query("UPDATE  karyawan SET  kd_karyawan =  '$kode',status =  '$status',nama_karyawan =  '$nama',
ruang =  '$ruang',tgl_daftar =  '$tgl',jenis_kelamin =  '$jk',alamat =  '$alamat',tlp =  '$tlp' WHERE  kd_karyawan =  '$kode'");
if($query){
	header("location:../view/Karyawan");
}
else{
	echo"Data Gagal Disimpan";
}
?>