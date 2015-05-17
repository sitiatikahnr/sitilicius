<?php
include "koneksi.php";
$petugas = $_POST['petugas'];
$nama 	 = $_POST['nama'];
$jk		 = $_POST['jenis_kelamin'];
$alamat	 = $_POST['alamat'];
$tlp	 = $_POST['tlp'];
$user	 = $_POST['user'];
$pass	 = $_POST['pass'];
$query	 = mysql_query("UPDATE petugas SET  kd_petugas =  '$petugas',nama_petugas =  '$nama',alamat =  '$alamat',tlp =  '$tlp',
user =  '$user',password =  '$pass',hak_akses =  '0',jenis_kelamin =  '$jk' WHERE  kd_petugas =  '$petugas' ;");
	if($query){
		header("location:../view/Petugas");}
		else{
			echo "Data gagal disimpan";}
?>