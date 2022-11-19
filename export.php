<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login");
}
include('koneksi.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Kelas');
$sheet->setCellValue('D1', 'Jurusan');
$sheet->setCellValue('E1', 'Keperluan');
$sheet->setCellValue('F1', 'Tanggal');

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = [
  'font' => ['bold' => true], // Set font nya jadi bold
  'alignment' => [
    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ],
  'borders' => [
    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
  ]
];

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = [
  'alignment' => [
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ],
  'borders' => [
    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
  ]
];

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$sheet->getStyle('A1')->applyFromArray($style_col);
$sheet->getStyle('B1')->applyFromArray($style_col);
$sheet->getStyle('C1')->applyFromArray($style_col);
$sheet->getStyle('D1')->applyFromArray($style_col);
$sheet->getStyle('E1')->applyFromArray($style_col);
$sheet->getStyle('F1')->applyFromArray($style_col);

// $dari = $_GET['dari'];
// $ke = $_GET['ke'];
if (isset($_GET['dari']) && isset($_GET['ke'])) {
  // tampilkan data yang sesuai dengan range tanggal yang dicari 
  $data = mysqli_query($conn, "SELECT * FROM siswa WHERE tanggal BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "'");
} else {
  //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
  $data = mysqli_query($conn, "select * from siswa");
}
// $data = mysqli_query($conn,"select * from siswa");
$i = 2;
$no = 1;
while ($d = mysqli_fetch_array($data)) {
  $sheet->setCellValue('A' . $i, $no++);
  $sheet->setCellValue('B' . $i, $d['nama']);
  $sheet->setCellValue('C' . $i, $d['kelas']);
  $sheet->setCellValue('D' . $i, $d['jurusan']);
  $sheet->setCellValue('E' . $i, $d['keperluan']);
  $sheet->setCellValue('F' . $i, $d['tanggal']);
  $i++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('Report Pengunjung Perpus.xlsx');
echo "<script>window.location = 'Report Pengunjung Perpus.xlsx'</script>";
