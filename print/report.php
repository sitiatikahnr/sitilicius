<?php

include"include/koneksi.php";

$query = "SELECT id_pinjaman,nama_pinjaman,besar_pinjaman,tgl_pengajuan_pinjaman,tgl_pinjaman, tgl_pelunasan from pinjaman where tgl_pelunasan = '2014-02-25' ";
$sql = mysql_query ($query);
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
array_push($data, $row);
}

$judul = "Laporan Angsuran";
$header = array(
array("label"=>"ID Pinjaman ", "length"=>22, "align"=>"L"),
array("label"=>"Nama Pinjaman", "length"=>30, "align"=>"L"),
array("label"=>"Besar Pinjaman", "length"=>30, "align"=>"L"),
array("label"=>"Tanggal Pengajuan", "length"=>35, "align"=>"L"),
array("label"=>"Tanggal Pinjaman", "length"=>30, "align"=>"L"),
array("label"=>"Tanggal Pelunasan", "length"=>35, "align"=>"L"),
);
require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');

$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0',
$kolom['align'], true);
}
$pdf->Ln();

$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0',
$kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}

$pdf->Output();
?>