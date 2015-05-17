<?php
include "koneksi.php";

$nama 	 = $_POST['nama'];
$jk		 = $_POST['jenis_kelamin'];
$alamat	 = $_POST['alamat'];
$tlp	 = $_POST['tlp'];
$user	 = $_POST['user'];
$pass	 = $_POST['pass'];
$query	 = mysql_query("INSERT INTO petugas VALUES ('', '$nama', '$jk', '$alamat', '$tlp', '$user', '$pass', '0')");
	if($query){
		header("location:../view/Petugas");}
		else{
			echo "Data gagal disimpan";}
?>