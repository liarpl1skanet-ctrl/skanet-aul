<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$koneksi = mysqli_connect("localhost", "root", "", "skanet_aul");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = trim($_GET['id']);

$stmt_cek = mysqli_prepare($koneksi, "SELECT * FROM mapel WHERE id_mapel = ?");
mysqli_stmt_bind_param($stmt_cek, "s", $id);
mysqli_stmt_execute($stmt_cek);
$query_cek = mysqli_stmt_get_result($stmt_cek);
$data = mysqli_fetch_assoc($query_cek);

if (!$data) {
    die("Data tidak ditemukan di dalam database.");
}

if (isset($_POST['update'])) {
    $nama_mapel = trim($_POST['nama_mapel']);
    $nama_guru  = trim($_POST['nama_guru']);

    if ($nama_mapel === '' || $nama_guru === '') {
        echo "<script>alert('Gagal memperbarui data: Semua formulir harus diisi!');</script>";
    } else {
        $stmt = mysqli_prepare($koneksi, "UPDATE mapel SET nama_mapel = ?, nama_guru = ? WHERE id_mapel = ?");
        mysqli_stmt_bind_param($stmt, "sss", $nama_mapel, $nama_guru, $id);
        $update = mysqli_stmt_execute($stmt);

        if ($update) {
            echo "<script>
                    alert('Data berhasil diperbarui!');
                    window.location.href='index.php';
                  </script>";
            exit;
        } else {
            $error_mysql = mysqli_error($koneksi);
            echo "<script>
                    alert('Gagal! Error: $error_mysql');
                  </script>";
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skanet Aul - Edit Mata Pelajaran 🎀</title>
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

        * { font-family: 'Quicksand', sans-serif; }
        h2, h3, h4, .navbar-brand { font-family: 'Baloo 2', cursive; }

        body {
            background:
                radial-gradient(circle at 8% 10%, rgba(255,217,102,0.35) 0, transparent 30%),
                radial-gradient(circle at 92% 8%, rgba(168,230,207,0.3) 0, transparent 26%),
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
            background: linear-gradient(135deg, var(--bubblegum) 0%, var(--hotpink) 55%, var(--bubblegum-dark) 100%);
            box-shadow: 0 6px 18px rgba(255, 61, 130, 0.25);
        }
        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: #ffffff !important;
        }
        .navbar-custom .navbar-brand .bounce-icon {
            display: inline-block;
            animation: gentleBounce 2.2s ease-in-out infinite;
        }
        @keyframes gentleBounce {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-4px) rotate(-8deg); }
        }

        .card {
            border-radius: 28px !important;
            border: 3px solid #FFE1EF !important;
            box-shadow: 0 10px 30px rgba(255, 111, 165, 0.18) !important;
            animation: popIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
        }
        .card::before {
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
        .text-muted { color: var(--text-soft) !important; }

        hr {
            border-top: 2px dashed var(--candy);
            opacity: 1;
        }

        .form-label { font-family: 'Baloo 2', cursive; color: var(--bubblegum-dark) !important; }
        .form-control {
            border-radius: 14px !important;
            border: 2px solid #FFE1EF;
            background-color: #FFFBFD;
            transition: all 0.2s ease;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(255, 61, 130, 0.15);
            border-color: var(--hotpink);
            background-color: #ffffff;
        }
        .form-control.bg-light {
            background-color: #FFEAF2 !important;
            color: var(--text-soft);
        }

        .btn {
            border-radius: 999px !important;
            transition: transform 0.2s ease;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-primary {
            background: linear-gradient(135deg, var(--peach), var(--hotpink)) !important;
            border: none !important;
            box-shadow: 0 6px 16px rgba(255, 61, 130, 0.35);
        }
        .btn-primary:hover { transform: translateY(-3px) scale(1.03); }
        .btn-secondary {
            background-color: #FFEAF2 !important;
            color: var(--bubblegum-dark) !important;
            border: 2px solid var(--candy) !important;
            font-weight: 600;
        }
        .btn-secondary:hover {
            background-color: var(--candy) !important;
            color: white !important;
        }

        @media (prefers-reduced-motion: reduce) {
            .floaty, .sparkle, .card, .navbar-brand .bounce-icon, .btn, .form-control {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body>

    <span class="floaty" style="top:8%; left:4%; animation-delay:0.3s;">📖</span>
    <span class="floaty" style="top:85%; left:6%; animation-delay:1.5s;">🌸</span>
    <span class="floaty" style="top:10%; left:94%; animation-delay:0.9s;">✏️</span>
    <span class="sparkle" style="top:25%; left:15%; animation-delay:0.6s;">✨</span>
    <span class="sparkle" style="top:65%; left:90%; animation-delay:1.4s;">💫</span>

    <nav class="navbar navbar-expand-lg navbar-custom py-3 shadow-sm mb-5">
        <div class="container-fluid px-5">
            <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
                <span class="bounce-icon"><i class="bi bi-mortarboard-fill"></i></span> Skanet Aul 🎀
            </a>
        </div>
    </nav>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 bg-white rounded">
                    <h3 class="text-primary fw-bold mb-3">
                        <i class="bi bi-pencil-square me-2"></i>Edit Mata Pelajaran <span>🧁</span>
                    </h3>
                    <p class="text-muted">Ubah informasi mata pelajaran di bawah ini yaa~ 💕</p>
                    <hr>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Mapel</label>
                            <input type="text" class="form-control bg-light" value="<?php echo htmlspecialchars($data['id_mapel']); ?>" readonly>
                            <small class="text-muted">*ID Mapel tidak dapat diubah.</small>
                        </div>

                        <div class="mb-3">
                            <label for="nama_mapel" class="form-label fw-bold">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="<?php echo htmlspecialchars($data['nama_mapel']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_guru" class="form-label fw-bold">Nama Guru Pengampu</label>
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo htmlspecialchars($data['nama_guru']); ?>" required>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" name="update" class="btn btn-primary px-4 fw-semibold">
                                <i class="bi bi-save-fill me-1"></i> Simpan Perubahan
                            </button>
                            <a href="index.php" class="btn btn-secondary px-4">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>