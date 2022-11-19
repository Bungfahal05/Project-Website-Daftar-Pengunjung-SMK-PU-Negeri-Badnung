<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login");
}
include 'templates/header.php'
?>
<!--Container Main start-->
<div class="content">
    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="">
                        <?php
                        include 'koneksi.php';
                        if(isset($_POST['simpan'])) {
                            $nama           = $_POST['nama'];
                            $tipe          = $_POST['tipe'];
                            $keperluan      = $_POST['keperluan'];
                            $tanggal        = $_POST['tanggal'];

                            $sql = "INSERT INTO karyawan (nama, tipe, keperluan, tanggal) value ('$nama', '$tipe', '$keperluan', '$tanggal')";
                            $query = mysqli_query($conn, $sql);
                            if($query) {
                                echo '<div class="alert alert-success" role="alert">
                                Data Berhasil Ditambahkan
                              </div>
                              ';
                            }
                            else {
                                echo '<div class="alert alert-danger" role="alert">
                                Data Gagal Ditambahkan
                              </div>
                              ';
                            }
                        };
                        ?>
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Nama Karyawan</label>
                            <input type="text" name="nama" class="form-control" id="validationCustom01" placeholder="Nama Karyawan" required>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom03" class="form-label">Tipe</label>
                            <select name="tipe" id="validationCustom03" class="form-select form-select-lg-mb-3" aria-label=".form-select-sm example">
                                <option selected disabled>Silahkan Pilih</option>
                                <?php
                                $qry = $conn->query("SELECT * FROM tipe");
                                while ($data = $qry->fetch_assoc()) { ?>
                                    <option value="<?= $data['tipe']; ?>"><?= $data['tipe']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Keperluan</label>
                            <input class="form-control" type="text" name="keperluan" placeholder="Bimbingan">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <button name="simpan" id="simpan" class="btn btn-success">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Container Main -->

<?php
include 'templates/footer.php'
?>