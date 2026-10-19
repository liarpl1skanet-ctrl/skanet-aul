<?php

include "koneksi.php";

require_once "../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$query = "SELECT nilai.*, siswa.nama AS nama_siswa, mapel.nama_mapel AS nama_mapel, guru.nama AS nama_guru
          FROM nilai
          LEFT JOIN siswa ON nilai.nis = siswa.nis
          LEFT JOIN mapel ON nilai.id_mapel = mapel.id_mapel
          LEFT JOIN guru ON nilai.nip = guru.nip";

$sql = mysqli_query($koneksi, $query);

if (!$sql) {
    die("Query Error: " . mysqli_error($koneksi));
}

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$sheet->setTitle("Data Nilai");

$sheet->setCellValue('A1', 'ID Nilai');
$sheet->setCellValue('B1', 'Nama Siswa');
$sheet->setCellValue('C1', 'Mapel');
$sheet->setCellValue('D1', 'Nama Guru');
$sheet->setCellValue('E1', 'Nilai');

$baris = 2;

while ($data = mysqli_fetch_assoc($sql)) {

    $sheet->setCellValue('A' . $baris, $data['id_nilai']);
    $sheet->setCellValue('B' . $baris, $data['nama_siswa']);
    $sheet->setCellValue('C' . $baris, $data['nama_mapel']);
    $sheet->setCellValue('D' . $baris, $data['nama_guru']);
    $sheet->setCellValue('E' . $baris, $data['nilai']);

    $baris++;
}

$sheet->getStyle('A1:E1')->getFont()->setBold(true);

$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('E')->setAutoSize(true);

$sheet->getStyle('A1:E' . ($baris - 1))
      ->getBorders()
      ->getAllBorders()
      ->setBorderStyle(
          \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
      );

$folder = __DIR__ . "/export";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

$file = $folder . "/data_nilai.xlsx";

$writer = new Xlsx($spreadsheet);
$writer->save($file);

$fullPath = realpath($file);

$command = 'start "" "' . $fullPath . '"';

exec($command);

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Membuka Excel...</title>
</head>

<body>

<script>
    window.location.href = "index.php";
</script>

</body>
</html>
