<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$koneksi = mysqli_connect("localhost", "root", "", "skanet_aul");
require('lib/fpdf.php');

$id = isset($_GET['id']) ? trim($_GET['id']) : '';

$baseQuery = "SELECT nilai.*, siswa.nama AS nama_siswa, mapel.nama_mapel AS nama_mapel, guru.nama AS nama_guru
              FROM nilai
              LEFT JOIN siswa ON nilai.nis = siswa.nis
              LEFT JOIN mapel ON nilai.id_mapel = mapel.id_mapel
              LEFT JOIN guru ON nilai.nip = guru.nip";

if ($id !== '') {
    $stmt = mysqli_prepare($koneksi, $baseQuery . " WHERE nilai.id_nilai = ?");
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $sql = mysqli_stmt_get_result($stmt);
} else {
    $sql = mysqli_query($koneksi, $baseQuery);
}

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(277, 20, 'Data Nilai Siswa', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(25, 10, 'ID Nilai', 1, 0, 'C');
$pdf->Cell(70, 10, 'Nama Siswa', 1, 0, 'C');
$pdf->Cell(65, 10, 'Mata Pelajaran', 1, 0, 'C');
$pdf->Cell(70, 10, 'Nama Guru', 1, 0, 'C');
$pdf->Cell(47, 10, 'Nilai', 1, 1, 'C');

$pdf->SetFont('Arial', '', 11);

$ada_data = false;
while ($data = mysqli_fetch_array($sql)) {
    $ada_data = true;
    $pdf->Cell(25, 10, $data['id_nilai'], 1, 0, 'C');
    $pdf->Cell(70, 10, $data['nama_siswa'], 1, 0);
    $pdf->Cell(65, 10, $data['nama_mapel'], 1, 0);
    $pdf->Cell(70, 10, $data['nama_guru'], 1, 0);
    $pdf->Cell(47, 10, $data['nilai'], 1, 1, 'C');
}

if (!$ada_data) {
    $pdf->Cell(277, 10, 'Data tidak ditemukan.', 1, 1, 'C');
}

$pdf->Output();
?>