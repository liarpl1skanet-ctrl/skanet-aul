<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Dashboard Data Nilai 🎀</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --bubblegum: #FF6FA5;
        --bubblegum-dark: #E8467F;
        --hotpink: #FF3D82;
        --candy: #FFB6D9;
        --cream: #FFF6F9;
        --mint: #A8E6CF;
        --lavender: #E4C1F9;
        --gold: #FFD966;
        --peach: #FFCBA4;
        --text-soft: #7A4B63;
    }

    * {
        font-family: 'Quicksand', sans-serif;
    }

    h2, h3, h4, .navbar-brand {
        font-family: 'Baloo 2', cursive;
    }

    body {
        background:
            radial-gradient(circle at 6% 12%, rgba(255,217,102,0.35) 0, transparent 28%),
            radial-gradient(circle at 94% 10%, rgba(168,230,207,0.35) 0, transparent 26%),
            radial-gradient(circle at 50% 100%, rgba(228,193,249,0.3) 0, transparent 35%),
            var(--cream);

        min-height: 100vh;
        overflow-x: hidden;
    }

    .floaty {
        position: fixed;
        font-size: 2rem;
        opacity: 0.55;
        pointer-events: none;
        animation: floatBob 5s ease-in-out infinite;
        z-index: 0;
        filter: drop-shadow(0 4px 6px rgba(255,111,165,0.25));
    }

    @keyframes floatBob {
        0%, 100% {
            transform: translateY(0) rotate(-6deg) scale(1);
        }

        50% {
            transform: translateY(-22px) rotate(8deg) scale(1.08);
        }
    }

    @keyframes sparkleTwinkle {
        0%, 100% {
            opacity: 0.2;
            transform: scale(0.8) rotate(0deg);
        }

        50% {
            opacity: 1;
            transform: scale(1.2) rotate(180deg);
        }
    }

    .sparkle {
        position: fixed;
        font-size: 1.1rem;
        pointer-events: none;
        animation: sparkleTwinkle 3s ease-in-out infinite;
        z-index: 0;
    }

    .navbar-custom {
        background: linear-gradient(
            135deg,
            var(--bubblegum) 0%,
            var(--hotpink) 55%,
            var(--bubblegum-dark) 100%
        );

        box-shadow: 0 6px 18px rgba(255, 61, 130, 0.25);
    }

    .navbar-custom .navbar-brand {
        font-weight: 700;
        font-size: 1.55rem;
        color: #ffffff !important;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .navbar-custom .navbar-brand .bounce-icon {
        display: inline-block;
        animation: gentleBounce 2.2s ease-in-out infinite;
    }

    @keyframes gentleBounce {
        0%, 100% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-4px) rotate(-8deg);
        }
    }

    .navbar-custom .nav-link {
        color: #ffffff !important;
        font-weight: 600;
        padding: 8px 16px !important;
        border-radius: 999px;
        transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .navbar-custom .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.25);
        transform: translateY(-2px) scale(1.05);
    }

    .navbar-custom .nav-link.active {
        background-color: rgba(255, 255, 255, 0.3);
    }

    .navbar-custom .nav-link i {
        margin-right: 6px;
    }

    .user-dropdown .btn {
        color: #ffffff;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        border-radius: 999px;
        transition: transform 0.25s ease;
    }

    .user-dropdown .btn:hover {
        transform: rotate(90deg) scale(1.1);
        color: #ffffff;
    }

    .user-dropdown .btn.no-caret::after {
        display: none;
    }

    .card-custom {
        border-radius: 28px;
        border: 3px solid #FFE1EF;
        box-shadow: 0 10px 30px rgba(255, 111, 165, 0.18);
        animation: popIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }

    .card-custom::before {
        content: "";
        position: absolute;
        top: -60px;
        right: -60px;
        width: 160px;
        height: 160px;
        background: radial-gradient(
            circle,
            rgba(255,182,217,0.5),
            transparent 70%
        );

        border-radius: 50%;
        pointer-events: none;
    }

    @keyframes popIn {
        0% {
            opacity: 0;
            transform: translateY(30px) scale(0.96);
        }

        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .title-cute {
        color: var(--hotpink) !important;
        font-weight: 700;
    }

    .subtitle-cute {
        color: var(--text-soft);
        font-weight: 500;
    }

    .btn {
        border-radius: 999px !important;
    }

    .btn-primary {
        background: linear-gradient(
            135deg,
            var(--peach),
            var(--hotpink)
        ) !important;

        border: none !important;

        box-shadow: 0 6px 16px rgba(255, 61, 130, 0.35);

        transition:
            transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1),
            box-shadow 0.2s ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px) scale(1.04) rotate(-1deg);
        box-shadow: 0 10px 22px rgba(255, 61, 130, 0.45);
    }

    .btn-primary:active {
        transform: scale(0.97);
    }

    .btn-warning {
        background: linear-gradient(
            135deg,
            var(--gold),
            #ffb347
        ) !important;

        border: none !important;

        transition: transform 0.2s ease;
    }

    .btn-warning:hover {
        transform: translateY(-2px) scale(1.05);
    }

    .btn-danger {
        background: linear-gradient(
            135deg,
            #FF8FA3,
            var(--hotpink)
        ) !important;

        border: none !important;

        transition: transform 0.2s ease;
    }

    .btn-danger:hover {
        transform: translateY(-2px) scale(1.05);
    }

    .btn-success {
        background: linear-gradient(
            135deg,
            #A8E6CF,
            #6FA860
        ) !important;

        border: none !important;
        color: #ffffff !important;

        box-shadow: 0 6px 16px rgba(111,168,96,0.25);

        transition: transform 0.2s ease;
    }

    .btn-success:hover {
        transform: translateY(-2px) scale(1.05);
    }

    .alert-info-custom {
        background: linear-gradient(
            135deg,
            #FFE1EF,
            #FFF0DC
        );

        border: 2px dashed var(--candy);
        color: var(--bubblegum-dark);
        border-radius: 16px;
        font-weight: 600;
    }

    .alert-info-custom i {
        animation: wiggle 1.6s ease-in-out infinite;
        display: inline-block;
    }

    @keyframes wiggle {
        0%, 100% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(-12deg);
        }

        75% {
            transform: rotate(12deg);
        }
    }

    .table th {
        font-weight: 700;
        color: var(--bubblegum-dark);
        border-bottom: 3px solid #FFD6E8 !important;
        font-family: 'Baloo 2', cursive;
    }

    .table td {
        padding: 16px 10px;
        vertical-align: middle;
    }

    .table tbody tr {
        transition: all 0.2s ease;
        border-radius: 14px;
    }

    .table tbody tr:hover {
        background-color: #FFF0F6 !important;
        transform: scale(1.01);
    }

    .badge-nilai {
        background: linear-gradient(
            135deg,
            var(--bubblegum),
            var(--hotpink)
        );

        color: white;
        padding: 7px 14px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 0.9rem;

        box-shadow: 0 3px 8px rgba(255,61,130,0.3);
    }

    .badge-id {
        background: #FFE1EF;
        color: var(--bubblegum-dark);
        padding: 7px 12px;
        border-radius: 999px;
        font-weight: 700;
    }

    .text-primary {
        color: var(--hotpink) !important;
    }

    .text-soft {
        color: var(--text-soft);
    }

    @media (max-width: 768px) {

        .container-fluid {
            padding-left: 20px !important;
            padding-right: 20px !important;
        }

        .navbar-custom .navbar-brand {
            font-size: 1.3rem;
        }

        .card-custom {
            border-radius: 22px;
            padding: 20px !important;
        }

        .table {
            min-width: 900px;
        }

        .header-buttons {
            width: 100%;
        }

        .header-buttons .btn {
            flex: 1;
            justify-content: center;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .floaty,
        .sparkle,
        .card-custom,
        .navbar-brand .bounce-icon,
        .alert-info-custom i,
        .btn-primary,
        .btn-warning,
        .btn-danger,
        .btn-success {
            animation: none !important;
            transition: none !important;
        }
    }
</style>
```

</head>

<body>

<span class="floaty" style="top:8%; left:3%; animation-delay:0.2s;">🍓</span> <span class="floaty" style="top:80%; left:4%; animation-delay:1.3s;">🌸</span> <span class="floaty" style="top:12%; left:94%; animation-delay:0.7s;">🍡</span> <span class="floaty" style="top:70%; left:95%; animation-delay:1.9s;">🎀</span>

<span class="sparkle" style="top:20%; left:20%; animation-delay:0.4s;">✨</span> <span class="sparkle" style="top:35%; left:80%; animation-delay:1.1s;">✨</span> <span class="sparkle" style="top:60%; left:10%; animation-delay:1.7s;">💫</span> <span class="sparkle" style="top:88%; left:60%; animation-delay:0.9s;">✨</span>

<nav class="navbar navbar-expand-lg navbar-custom py-3 shadow-sm mb-5">

```
<div class="container-fluid px-5">

    <a class="navbar-brand d-flex align-items-center gap-2" href="../index.php">

        <span class="bounce-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </span>

        Skanet Aul 🎀

    </a>


    <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#mainNavbar">

        <span class="navbar-toggler-icon"></span>

    </button>


    <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">

        <ul class="navbar-nav align-items-lg-center gap-lg-1">

            <li class="nav-item">

                <a class="nav-link" href="../siswa/index.php">
                    <i class="bi bi-person-badge-fill"></i>
                    Data Siswa
                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link" href="../guru/index.php">
                    <i class="bi bi-person-badge-fill"></i>
                    Data Guru
                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link" href="../mapel/index.php">
                    <i class="bi bi-journal-bookmark-fill"></i>
                    Data Mapel
                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link active fw-bold" href="../nilai/index.php">
                    <i class="bi bi-award-fill"></i>
                    Data Nilai
                </a>

            </li>


            <li class="nav-item dropdown user-dropdown ms-lg-2">

                <button
                    class="btn dropdown-toggle no-caret"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                    <i class="bi bi-three-dots-vertical fs-5"></i>

                </button>


                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <span class="dropdown-item-text">
                            <i class="bi bi-person-fill-gear me-2"></i>
                            <?= $_SESSION['username'] ?? '' ?>
                        </span>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item text-danger" href="../logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout
                        </a>
                    </li>

                </ul>

            </li>

        </ul>

    </div>

</div>
```

</nav>

<div class="container mb-5" style="position: relative; z-index: 1;">

```
<div class="card card-custom p-4 bg-white">

    <div class="d-flex justify-content-between align-items-start mb-2 flex-wrap gap-3">

        <div>

            <h2 class="fw-bold title-cute d-flex align-items-center gap-2 mb-1">

                <i class="bi bi-award-fill"></i>

                Data Nilai

                <span>🏆</span>

            </h2>

            <p class="subtitle-cute mb-0">
                Daftar seluruh nilai siswa yang tersimpan dengan rapi dan gemesss~ 💕
            </p>

        </div>

<div class="d-flex gap-2 flex-wrap header-buttons">

    <a
        href="export.php"
        class="btn btn-success px-4 py-2 fw-semibold d-flex align-items-center gap-2">

        <i class="bi bi-file-earmark-excel-fill"></i>
        Export Data

    </a>

    <a
        href="../cetakpdf/cetak.php"
        target="_blank"
        class="btn btn-success px-4 py-2 fw-semibold d-flex align-items-center gap-2">

        <i class="bi bi-printer-fill"></i>
        Cetak Semua

    </a>

    <a
        href="tambah.php"
        class="btn btn-primary px-4 py-2 fw-semibold d-flex align-items-center gap-2">

        <i class="bi bi-plus-circle-fill"></i>
        Tambah Nilai

    </a>

</div>

    </div>


    <div class="alert alert-info-custom d-flex align-items-center gap-2 py-3 px-3 mb-4">

        <i class="bi bi-stars fs-5"></i>

        <div>
            Kelola data nilai siswa dengan mudah melalui dashboard imut ini yaa~ 🌷
        </div>

    </div>


    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th width="13%">ID Nilai</th>

                    <th width="20%">Nama Siswa</th>

                    <th width="18%">Mapel</th>

                    <th width="18%">Nama Guru</th>

                    <th width="10%">Nilai</th>

                    <th width="21%" class="text-center">Aksi</th>

                </tr>

            </thead>


            <tbody>

                <?php

                $query = "SELECT nilai.*, siswa.nama AS nama_siswa, mapel.nama_mapel AS nama_mapel, guru.nama AS nama_guru
                          FROM nilai
                          LEFT JOIN siswa ON nilai.nis = siswa.nis
                          LEFT JOIN mapel ON nilai.id_mapel = mapel.id_mapel
                          LEFT JOIN guru ON nilai.nip = guru.nip";

                $sql = mysqli_query($koneksi, $query);


                if (!$sql) {

                    die("<tr><td colspan='6'>Query Error: " . mysqli_error($koneksi) . "</td></tr>");

                }


                while ($data = mysqli_fetch_array($sql)) {

                ?>

                <tr>

                    <td>

                        <span class="badge-id">

                            <?php echo $data['id_nilai']; ?>

                        </span>

                    </td>


                    <td class="fw-semibold text-soft">

                        <i class="bi bi-person-fill text-primary me-2"></i>

                        <?php echo $data['nama_siswa']; ?>

                    </td>


                    <td class="text-soft">

                        <i class="bi bi-book-fill me-2" style="color: var(--hotpink);"></i>

                        <?php echo $data['nama_mapel']; ?>

                    </td>


                    <td class="text-soft">

                        <i class="bi bi-person-badge-fill me-2" style="color: var(--hotpink);"></i>

                        <?php echo $data['nama_guru']; ?>

                    </td>


                    <td>

                        <span class="badge-nilai">

                            <?php echo $data['nilai']; ?>

                        </span>

                    </td>


                    <td class="text-center">

                        <div class="d-flex justify-content-center gap-2 flex-wrap">

                            <a
                                href="edit.php?id=<?php echo $data['id_nilai']; ?>"
                                class="btn btn-warning btn-sm px-3 fw-semibold text-dark d-flex align-items-center gap-1">

                                <i class="bi bi-pencil-square"></i>
                                Edit

                            </a>


                            <a
                                href="hapus.php?id=<?php echo $data['id_nilai']; ?>"
                                class="btn btn-danger btn-sm px-3 fw-semibold text-white d-flex align-items-center gap-1"
                                onclick="return confirm('Yakin pengen mbusak data nilai iki? 🥺')">

                                <i class="bi bi-trash-fill"></i>
                                Hapus

                            </a>


                            <a
                                href="../cetakpdf/cetak.php?id=<?php echo $data['id_nilai']; ?>"
                                target="_blank"
                                class="btn btn-success btn-sm px-3 fw-semibold d-flex align-items-center gap-1">

                                <i class="bi bi-printer-fill"></i>
                                Cetak

                            </a>

                        </div>

                    </td>

                </tr>

                <?php

                }

                ?>

            </tbody>

        </table>

    </div>

</div>
```

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
