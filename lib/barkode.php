<?php
include "koneksi.php";

$nama  = $_POST['nama'];
$alat  = $_POST['alat'];
$query = mysql_query("INSERT INTO label_alat VALUES ('','$nama','$alat')");
if($query){
	header("location:../view/Barkode");
}
else{
	echo"Data Gagal Disimpan";
}
?>