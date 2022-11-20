<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengunjung Perpus</title>
    <link rel="shortcut icon" href="style/img/Logo_PU.png">
    <link rel="stylesheet" href="style/style.css">
    <script src="<?= 'style/js/Chart.bundle.js' ?>"></script>
    <script src="<?= 'style/js/jquery.min.js' ?>"></script>
    <script src="https://kit.fontawesome.com/4eb1f1dd1e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="<?= 'style/img/Logo_PU.png' ?>" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="index" class="nav_logo">
                    <img src="<?= 'style/img/Logo_PU.png' ?>" alt="LOGO PU">
                    <span class="nav_logo-name">Daftar <br /> Pengunjung</span>
                </a>
                <div class="nav_list">
                    <a href="<?= 'index' ?>" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="siswa" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Siswa</span>
                    </a>
                    <a href="karyawan" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Karyawan</span>
                    </a>
                    <a href="top-pengunjung" class="nav_link">
                        <i class="fa-solid fa-trophy"></i>
                        <span class="nav_name">Top Pengunjung</span>
                    </a>
                    <a href="report-siswa" class="nav_link">
                        <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Report Siswa</span>
                    </a>
                    <a href="report-karyawan" class="nav_link">
                        <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Report karyawan</span>
                    </a>
                </div>
            </div>
            <a href="logout" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>