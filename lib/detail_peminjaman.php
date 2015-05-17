<?php
include "koneksi.php";
$kode   = $_POST['kode'];
$barang = $_POST['barang'];

$query = mysql_query("insert into detail_inventaris values('','$kode','$barang','0')");
if($query){
	header("location:../view/Detail_Peminjaman");
}
else{
	echo"";
}
?>