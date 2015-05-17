<?php
include "koneksi.php";
switch($_GET['lib']){
	case"barang":
	mysql_query("delete from alat where kd_alat='$_GET[id]'");
	header("location:../view/Barang");
	break;
	
	case"petugas":
	mysql_query("delete from petugas where kd_petugas='$_GET[id]'");
	header("location:../view/Petugas");
	break;
	
	case"pembuat":
	mysql_query("delete from pembuat where kd_pembuat='$_GET[id]'");
	header("location:../view/Pembuat");
	break;
	
	case"kategori":
	mysql_query("delete from kategori where kd_kategori='$_GET[id]'");
	header("location:../view/Kategori");
	break;
	
	case"karyawan":
	mysql_query("delete from karyawan where kd_karyawan='$_GET[id]'");
	header("location:../view/Karyawan");
	break;

	case"peminjaman":
	mysql_query("delete from inventaris where kd_inventaris='$_GET[id]'");
	header("location:../view/Peminjaman");
	break;

	case"detail":
	mysql_query("delete from detail_inventaris where kd_inventaris='$_GET[id]'");
	header("location:../view/Data_Detail");
	break;
	}
?>