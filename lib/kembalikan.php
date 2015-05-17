<?php
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$date = date('now');
mysql_query("insert into pengembalian values('','$_GET[kode]',now(),'$_GET[nama]')");
mysql_query("update detail_inventaris set status='1' where id='$_GET[id]'");
header("location:../view/Pengembalian");
?>