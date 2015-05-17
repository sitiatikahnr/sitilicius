<?php

include"koneksi.php";

$query = mysql_query("SELECT inventaris.kd_inventaris,karyawan.nama_karyawan, detail_inventaris.kd_alat,alat.label_alat
FROM karyawan, alat, inventaris, detail_inventaris
WHERE karyawan.kd_karyawan = inventaris.kd_karyawan
AND detail_inventaris.kd_inventaris = inventaris.kd_inventaris
AND alat.kd_alat = detail_inventaris.kd_alat");
$data = array();
while ($row = mysql_fetch_assoc($query)) {
array_push($data, $row);
}

$judul = "Laporan Peminjaman Barang";
$header = array(
array("label"=>"Kode Inventaris ", "length"=>30, "align"=>"L"),
array("label"=>"Nama Karyawan", "length"=>40, "align"=>"L"),
array("label"=>"Kode Barang", "length"=>30, "align"=>"L"),
array("label"=>"Nama Barang", "length"=>45, "align"=>"L"),
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