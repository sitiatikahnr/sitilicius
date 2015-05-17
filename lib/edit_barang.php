<?php
include "koneksi.php";
$kode  = $_POST['kode_alat'];
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
$query	  = mysql_query("UPDATE alat SET  kd_alat =  '$kode',label_alat =  '$nama',model =  '$model',kd_kategori =  '$kategori',merk =  '$merk',
kd_pembuat =  '$pembuat',thn_buat =  '$thn' WHERE  kd_alat ='$kode'");
if($query){
	header("location:../view/Barang");
}
else{echo"Data Gagal Disimpan";}
}
?>
?>