<?php
include 'koneksi.php';
include 'templates/header.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login");
}
 

// Total Siswa
$query_siswa = "SELECT count(*) AS jumlah FROM siswa";
$siswa = $conn->prepare($query_siswa);
$siswa->execute();
$res1 = $siswa->get_result();
$row = $res1->fetch_assoc();
$total_records_siswa = $row['jumlah'];

// Total Karyawan
$query_karyawan = "SELECT count(*) AS jumlah FROM karyawan";
$karyawan = $conn->prepare($query_karyawan);
$karyawan->execute();
$res1 = $karyawan->get_result();
$row = $res1->fetch_assoc();
$total_records_karyawan = $row['jumlah'];

?>

<!--Container Main start-->
<div class="content">
  <div class="row">
    <div class="col-sm-4 ">
      <div class="card bg-primary">
        <div class="card-body text-center text-white">
          <h5 class="card-title"><?php echo $total_records_siswa; ?> Pengunjung</h5>
          <p class="card-text">Siswa</p>
          <a href="siswa.php" class="btn btn-success">Tambah Pengunjung</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 ">
      <div class="card bg-primary">
        <div class="card-body text-center text-white">
          <h5 class="card-title"><?php echo $total_records_karyawan; ?> Pengunjung</h5>
          <p class="card-text">Karyawan</p>
          <a href="karyawan.php" class="btn btn-success">Tambah Pengunjung</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Container Main end-->
<!-- Table Siswa-->
<div class="container">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page" style="font-weight: 800;">Daftar Pengunjung Siswa Hari Ini</li>
      </ol>
    </nav>
    <table class="table">
      <thead>
        <tr class="table-dark">
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Kelas</th>
          <th scope="col">Keperluan</th>
          <th scope="col">Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "koneksi.php";
        $data = mysqli_query($conn, "select * from siswa ORDER BY id DESC LIMIT 5");

        $no = 1;

        while ($row = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <th><?= $no++ ?></th>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td><?= $row['keperluan'] ?></td>
            <td><?= date('d-m-Y', strtotime($row["tanggal"]));   ?></td>
          </tr>
      </tbody>
    <?php } ?>
    </table>
  </div>
</div>
<!-- End Table Siswa -->

<!-- Table Guru-->
<div class="container">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page" style="font-weight: 800;">Daftar Pengunjung Karyawn Hari Ini</li>
      </ol>
    </nav>
    <table class="table">
      <thead>
        <tr class="table-dark">
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tipe</th>
          <th scope="col">Keperluan</th>
          <th scope="col">Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "koneksi.php";
        $data = mysqli_query($conn, "select * from karyawan ORDER BY id DESC LIMIT 5");

        $no = 1;

        while ($row = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <th><?= $no++ ?></th>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['tipe'] ?></td>
            <td><?= $row['keperluan'] ?></td>
            <td><?= date('d-m-Y', strtotime($row["tanggal"]));   ?></td>
          </tr>
      </tbody>
    <?php } ?>
    </table>
  </div>
</div>
<!-- End Table Guru -->

<?php
include 'templates/footer.php'
?>