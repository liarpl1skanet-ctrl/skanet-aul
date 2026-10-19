<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --berry: #B0175E;
            --berry-dark: #7A0F42;
            --magenta: #E0447C;
            --cream: #FFF4E8;
            --strawberry: #E8483C;
            --leaf: #6FA860;
            --gold: #FFC94A;
        }
        * { font-family: 'Nunito', sans-serif; }
        h2, h3, h4 { font-family: 'Fredoka', sans-serif; }
        body {
            background:
                radial-gradient(circle at 8% 10%, rgba(255,201,74,0.35) 0, transparent 30%),
                radial-gradient(circle at 92% 8%, rgba(111,168,96,0.25) 0, transparent 26%),
                var(--cream);
            min-height: 100vh;
        }
        .navbar-custom { background: linear-gradient(135deg, var(--berry) 0%, var(--berry-dark) 100%); }
        .card-custom {
            border-radius: 20px;
            border: none;
            box-shadow: 0 4px 20px rgba(122,15,66,0.08);
            max-width: 600px;
            margin: 0 auto;
        }
        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #F3D7CF;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(176,23,94,0.2);
            border-color: var(--berry);
        }
        .alert-info-custom {
            background-color: #FBE3EC;
            border: none;
            color: var(--berry-dark);
            border-radius: 10px;
        }
        .form-label {
            font-family: 'Fredoka', sans-serif;
            font-weight: 500;
            color: var(--berry-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-primary { background: linear-gradient(135deg, var(--strawberry), var(--berry)) !important; border: none !important; }
        .btn-primary:hover, .btn-primary:focus { background: linear-gradient(135deg, var(--berry), var(--berry-dark)) !important; }

        @keyframes float { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-18px) rotate(10deg); } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
        .floaty { position: fixed; font-size: 2rem; opacity: 0.35; pointer-events: none; animation: float 6s ease-in-out infinite; z-index: 0; }
        .card-custom { animation: fadeInUp 0.5s ease-out; position: relative; z-index: 1; }
        @media (prefers-reduced-motion: reduce) { .floaty, .card-custom { animation: none; } }
    </style>
</head>
<body>

    <span class="floaty" style="top:8%; left:4%; animation-delay:0.3s;">🍓</span>
    <span class="floaty" style="top:85%; left:6%; animation-delay:1.5s;">🍃</span>
    <span class="floaty" style="top:10%; left:94%; animation-delay:0.9s;">🍃</span>

    <nav class="navbar navbar-custom py-3 shadow-sm mb-5">
        <div class="container-fluid px-5">
            <span class="navbar-brand text-white fw-bold fs-4 d-flex align-items-center gap-2">
                <i class="bi bi-award-fill"></i> Data Nilai
            </span>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="card card-custom p-4 bg-white">

            <div class="text-center mb-4">
                <h2 class="fw-bold d-flex align-items-center justify-content-center gap-2 mb-1">
                    <i class="bi bi-journal-plus"></i> Tambah Data Nilai
                </h2>
            </div>

            <div class="alert alert-info-custom d-flex align-items-center gap-2 py-3 px-3 mb-4" role="alert">
                <i class="bi bi-info-circle-fill fs-5"></i>
                <div>Silakan lengkapi data nilai siswa di bawah ini.</div>
            </div>

            <form action="simpan.php" method="POST">

                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-person-fill"></i> Nama Siswa</label>
                    <select name="nis" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Siswa --</option>
                        <?php
                        $query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
                        while ($siswa = mysqli_fetch_array($query_siswa)) {
                            echo "<option value='" . htmlspecialchars($siswa['nis']) . "'>" . htmlspecialchars($siswa['nis']) . " - " . htmlspecialchars($siswa['nama']) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-book-half"></i> Mata Pelajaran</label>
                    <select name="id_mapel" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Mata Pelajaran --</option>
                        <?php
                        $query_mapel = mysqli_query($koneksi, "SELECT * FROM mapel");
                        while ($mapel = mysqli_fetch_array($query_mapel)) {
                            echo "<option value='" . htmlspecialchars($mapel['id_mapel']) . "'>" . htmlspecialchars($mapel['nama_mapel']) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-person-video3"></i> Guru Pengampu</label>
                    <select name="nip" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Guru --</option>
                        <?php
                        $query_guru = mysqli_query($koneksi, "SELECT * FROM guru");
                        while ($guru = mysqli_fetch_array($query_guru)) {
                            echo "<option value='" . htmlspecialchars($guru['nip']) . "'>" . htmlspecialchars($guru['nama']) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-pencil-square"></i> Nilai</label>
                    <input type="number" name="nilai" class="form-control" placeholder="Masukkan Angka Nilai (0-100)" min="0" max="100" required>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="index.php" class="btn btn-light px-4 py-2 rounded-3 fw-semibold border">Batal</a>
                    <button type="submit" name="simpan" class="btn btn-primary px-4 py-2 rounded-3 fw-semibold shadow-sm">
                        <i class="bi bi-save-fill"></i> Simpan Data
                    </button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>