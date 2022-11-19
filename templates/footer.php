<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["TITL", "TKRO", "TPM", "TKJ", "DPIB", "GEO"],
            datasets: [{
                label: 'Hidden Bar',
                data: [
                    <?php
                    $jml_TITL = mysqli_query($conn, "SELECT * FROM siswa where jurusan='TITL'");
                    echo mysqli_num_rows($jml_TITL);
                    ?>,
                    <?php
                    $jml_TKRO = mysqli_query($conn, "SELECT * FROM siswa where jurusan='TKRO'");
                    echo mysqli_num_rows($jml_TKRO);
                    ?>,
                    <?php
                    $jml_TPM = mysqli_query($conn, "SELECT * FROM siswa where jurusan='TPM'");
                    echo mysqli_num_rows($jml_TPM);
                    ?>,
                    <?php
                    $jml_TKJ = mysqli_query($conn, "SELECT * FROM siswa where jurusan='TKJ'");
                    echo mysqli_num_rows($jml_TKJ);
                    ?>,
                    <?php
                    $jml_DPIB = mysqli_query($conn, "SELECT * FROM siswa where jurusan='DPIB'");
                    echo mysqli_num_rows($jml_DPIB);
                    ?>,
                    <?php
                    $jml_GEO = mysqli_query($conn, "SELECT * FROM siswa where jurusan='GEO'");
                    echo mysqli_num_rows($jml_GEO);
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById("myChartKaryawan");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Guru", "Staff"],
            datasets: [{
                label: 'Hidden Bar',
                data: [
                    <?php
                    $jml_TITL = mysqli_query($conn, "SELECT * FROM karyawan where tipe='Guru'");
                    echo mysqli_num_rows($jml_TITL);
                    ?>,
                    <?php
                    $jml_TKRO = mysqli_query($conn, "SELECT * FROM karyawan where tipe='Staff'");
                    echo mysqli_num_rows($jml_TKRO);
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= 'style/javascript.js' ?>"></script>
<script src="<?= 'style/js/Chart.js' ?>"></script>
</body>

</html>