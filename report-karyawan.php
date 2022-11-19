<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login");
}
include 'koneksi.php';
include 'templates/header.php'
?>
<div class="content">
    <div class="container container-ms">
        <div class="container-fluid">
            <div class="card" style="width: 80%;margin: 0 auto">
                <div class="card-body">
                    <canvas id="myChartKaryawan"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table Siswa-->
<div class="container">
    <div class="container-fluid">
        <form action="" method="GET" class="d-flex" role="search">
            <div class="periode">
                Periode
            </div>
            <input type="date" name="dari" class="form-control" required>
            <div class="sampai">
                -
            </div>
            <input type="date" name="ke" class="form-control" required>
            <button class="btn btn-success" type="submit">Search</button>
        </form>
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

                $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

                // Jumlah data per halaman
                $limit = 2;

                $limitStart = ($page - 1) * $limit;


                //jika tanggal dari dan tanggal ke ada maka
                if (isset($_GET['dari']) && isset($_GET['ke'])) {
                    // tampilkan data yang sesuai dengan range tanggal yang dicari 
                    $data = mysqli_query($conn, "SELECT * FROM karyawan WHERE tanggal BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "'");
                } else {
                    //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                    $data = mysqli_query($conn, "select * from karyawan");
                }

                $no = $limitStart + 1;

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
        <?php
        $query_karyawan = "SELECT count(*) AS jumlah FROM karyawan";
        $dewan1 = $conn->prepare($query_karyawan);
        $dewan1->execute();
        $res1 = $dewan1->get_result();
        $row = $res1->fetch_assoc();
        $total_records = $row['jumlah'];
        ?>
        <p>Total baris : <?php echo $total_records; ?></p>
        <nav class="mb-5">
            <ul class="pagination justify-content-end">
                <?php
                $jumlah_page = ceil($total_records / $limit);
                $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;

                if ($page == 1) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
                } else {
                    $link_prev = ($page > 1) ? $page - 1 : 1;
                    echo '<li class="page-item"><a class="page-link" href="?page=1">First</a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=' . $link_prev . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                }

                for ($i = $start_number; $i <= $end_number; $i++) {
                    $link_active = ($page == $i) ? ' active' : '';
                    echo '<li class="page-item ' . $link_active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                if ($page == $jumlah_page) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                } else {
                    $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                    echo '<li class="page-item"><a class="page-link" href="?page=' . $link_next . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=' . $jumlah_page . '">Last</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
<!-- End Table Siswa -->

<?php
include 'templates/footer.php'
?>