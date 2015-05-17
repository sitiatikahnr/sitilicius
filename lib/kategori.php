<?php
include "koneksi.php";


$nama = $_POST['nama'];
$query = mysql_query("INSERT INTO kategori VALUES('','$nama')");
if($query){
	header("location:../view/Kategori");
}
else{echo"Data Gagal Disimpan";}
?>