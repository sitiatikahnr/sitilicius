<?php
include "koneksi.php";

$username=	$_POST['username'];
$pass=		$_POST['password'];
$query =	mysql_query("SELECT * FROM petugas where user='$username' AND password='$pass' ");
$data=		mysql_num_rows($query);
if($data==0)
{header("location:../view/Login");}
else{ $array=mysql_fetch_array($query);
session_start();
$_SESSION['username'] = $array['user'];
$_SESSION['level'] = $array['hak_akses'];
$_SESSION['id'] = $array['kd_petugas'];
header("location:../view/Beranda");
}
?>
	