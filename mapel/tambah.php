<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skanet Aul - Tambah Mata Pelajaran 🎀</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
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

        * { font-family: 'Quicksand', sans-serif; }
        h2, h3, h4, .navbar-brand { font-family: 'Baloo 2', cursive; }

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
            0%, 100% { transform: translateY(0) rotate(-6deg) scale(1); }
            50% { transform: translateY(-22px) rotate(8deg) scale(1.08); }
        }
        @keyframes sparkleTwinkle {
            0%, 100% { opacity: 0.2; transform: scale(0.8) rotate(0deg); }
            50% { opacity: 1; transform: scale(1.2) rotate(180deg); }
        }
        .sparkle {
            position: fixed;
            font-size: 1.1rem;
            pointer-events: none;
            animation: sparkleTwinkle 3s ease-in-out infinite;
            z-index: 0;
        }

        .navbar-custom {
            background: linear-gradient(135deg, var(--bubblegum) 0%, var(--hotpink) 55%, var(--bubblegum-dark) 100%) !important;
            box-shadow: 0 6px 18px rgba(255, 61, 130, 0.25);
        }
        .navbar-custom .navbar-brand .bounce-icon {
            display: inline-block;
            animation: gentleBounce 2.2s ease-in-out infinite;
        }
        @keyframes gentleBounce {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-4px) rotate(-8deg); }
        }
        .navbar-custom .nav-link {
            border-radius: 999px;
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .navbar-custom .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .card-custom {
            border-radius: 28px;
            border: 3px solid #FFE1EF;
            box-shadow: 0 10px 30px rgba(255, 111, 165, 0.18);
            background-color: #ffffff;
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
            background: radial-gradient(circle, rgba(255,182,217,0.5), transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        @keyframes popIn {
            0% { opacity: 0; transform: translateY(30px) scale(0.96); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .text-primary { color: var(--hotpink) !important; }
        .text-secondary { color: var(--bubblegum-dark) !important; }

        .bg-primary.bg-opacity-10 {
            background: linear-gradient(135deg, #FFE1EF, #FFD6E8) !important;
            color: var(--hotpink) !important;
        }

        .form-control, .form-select {
            border-radius: 14px;
            padding: 10px 15px;
            border: 2px solid #FFE1EF;
            background-color: #FFFBFD;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 4px rgba(255, 61, 130, 0.15);
            border-color: var(--hotpink);
            background-color: #ffffff;
        }
        .form-label {
            font-family: 'Baloo 2', cursive;
            font-weight: 600;
            color: var(--bubblegum-dark) !important;
        }

        .btn {
            border-radius: 999px !important;
            transition: transform 0.2s ease;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-custom-primary {
            background: linear-gradient(135deg, var(--peach), var(--hotpink));
            color: white;
            font-weight: 600;
            border: none;
            box-shadow: 0 6px 16px rgba(255, 61, 130, 0.35);
        }
        .btn-custom-primary:hover {
            background: linear-gradient(135deg, var(--hotpink), var(--bubblegum-dark));
            color: white;
            transform: translateY(-3px) scale(1.03);
        }
        .btn-custom-secondary {
            background-color: #FFEAF2;
            color: var(--bubblegum-dark);
            font-weight: 600;
            border: 2px solid var(--candy);
        }
        .btn-custom-secondary:hover {
            background-color: var(--candy);
            color: white;
        }

        @media (prefers-reduced-motion: reduce) {
            .floaty, .sparkle, .card-custom, .navbar-brand .bounce-icon, .btn, .form-control, .form-select {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body>

<span class="floaty" style="top:8%; left:3%; animation-delay:0.2s;">📖</span>
<span class="floaty" style="top:80%; left:4%; animation-delay:1.3s;">🌸</span>
<span class="floaty" style="top:12%; left:94%; animation-delay:0.7s;">✏️</span>
<span class="sparkle" style="top:20%; left:20%; animation-delay:0.4s;">✨</span>
<span class="sparkle" style="top:35%; left:80%; animation-delay:1.1s;">✨</span>
<span class="sparkle" style="top:60%; left:10%; animation-delay:1.7s;">💫</span>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="index.php">
            <span class="bounce-icon"><i class="bi bi-mortarboard-fill me-2"></i></span>Skanet Aul 🎀
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav gap-2">
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75" href="../siswa/index.php"><i class="bi bi-people-fill me-1"></i> Data Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75" href="../guru/index.php"><i class="bi bi-person-badge-fill me-1"></i> Data Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active fw-semibold" href="index.php"><i class="bi bi-book-half me-1"></i> Data Mapel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75" href="../nilai/index.php"><i class="bi bi-journal-text me-1"></i> Data Nilai</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5" style="position: relative; z-index: 1;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-custom p-4 p-md-5">

                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary me-3">
                        <i class="bi bi-book-half fs-3"></i>
                    </div>
                    <div>
                        <h2 class="text-primary fw-bold mb-1">Tambah Mata Pelajaran <span>📖</span></h2>
                        <p class="text-secondary mb-0">Masukkan data mata pelajaran beserta relasi siswa dan guru pengampu yaa~ 💕</p>
                    </div>
                </div>

                <form action="simpan.php" method="POST">

                    <div class="mb-4">
                        <label for="id_mapel" class="form-label">ID Mapel</label>
                        <input type="text" class="form-control" id="id_mapel" name="id_mapel" required placeholder="Contoh: M001">
                    </div>

                    <div class="mb-4">
                        <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required placeholder="Contoh: Bahasa Indonesia">
                    </div>

                        <div class="mb-4">
                            <label for="nama_siswa" class="form-label">Nama Siswa</label>
                            <select class="form-select" id="nama_siswa" name="nama_siswa" required>
                                <option value="" disabled selected>-- Pilih Siswa --</option>
                                <?php
                                $query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
                                if (!$query_siswa) {
                                    echo "<option value='' disabled>Query Error: " . mysqli_error($koneksi) . "</option>";
                                } elseif (mysqli_num_rows($query_siswa) == 0) {
                                    echo "<option value='' disabled>Tabel siswa kosong</option>";
                                } else {
                                    while ($siswa = mysqli_fetch_assoc($query_siswa)) {
                                        echo "<option value='" . htmlspecialchars($siswa['nama']) . "'>" . htmlspecialchars($siswa['nama']) . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="nama_guru" class="form-label">Nama Guru Pengampu</label>
                            <select class="form-select" id="nama_guru" name="nama_guru" required>
                                <option value="" disabled selected>-- Pilih Guru Pengampu --</option>
                                <?php
                                $query_guru = mysqli_query($koneksi, "SELECT * FROM guru");
                                if (!$query_guru) {
                                    echo "<option value='' disabled>Query Error: " . mysqli_error($koneksi) . "</option>";
                                } elseif (mysqli_num_rows($query_guru) == 0) {
                                    echo "<option value='' disabled>Tabel guru kosong</option>";
                                } else {
                                    while ($guru = mysqli_fetch_assoc($query_guru)) {
                                        echo "<option value='" . htmlspecialchars($guru['nama']) . "'>" . htmlspecialchars($guru['nama']) . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    <div class="d-flex justify-content-end gap-2 mt-5">
                        <a href="index.php" class="btn btn-custom-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" name="submit" class="btn btn-custom-primary">
                            <i class="bi bi-save me-2"></i>Simpan Data
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>