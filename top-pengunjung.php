<?php
include 'koneksi.php';
include './templates/header.php';

?>

<div class="content">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5><i class="fa-solid fa-award"></i> Top Pengunjung Perpus SMK PU Negeri Bandung</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Total Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT *, COUNT( * ) AS total FROM siswa GROUP BY nama ORDER BY total DESC LIMIT 10");
                        $no = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= date('d-m-Y', strtotime($row["tanggal"]));   ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['total'] ?></td>
                            </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include './templates/footer.php';
?>