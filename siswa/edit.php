<?php
include "koneksi.php";

$nis = $_GET['nis'];
$result = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis = '$nis'");
$data = mysqli_fetch_array($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', alamat='$alamat' WHERE nis='$nis'");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa 🎀</title>
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
            background: linear-gradient(135deg, var(--bubblegum) 0%, var(--hotpink) 55%, var(--bubblegum-dark) 100%);
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
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-4px) rotate(-8deg); }
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
        .navbar-custom .nav-link i { margin-right: 6px; }
        .user-dropdown .btn {
            color: #ffffff;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            border-radius: 999px;
            transition: transform 0.25s ease;
        }
        .user-dropdown .btn:hover { transform: rotate(90deg) scale(1.1); }
        .user-dropdown .btn.no-caret::after { display: none; }

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
            background: radial-gradient(circle, rgba(255,182,217,0.5), transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        @keyframes popIn {
            0% { opacity: 0; transform: translateY(30px) scale(0.96); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .title-cute { color: var(--hotpink) !important; font-weight: 700; }
        .subtitle-cute { color: var(--text-soft); font-weight: 500; }

        .btn { border-radius: 999px !important; }
        .btn-primary {
            background: linear-gradient(135deg, var(--peach), var(--hotpink)) !important;
            border: none !important;
            box-shadow: 0 6px 16px rgba(255, 61, 130, 0.35);
            transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.2s ease;
        }
        .btn-primary:hover {
            transform: translateY(-3px) scale(1.04) rotate(-1deg);
            box-shadow: 0 10px 22px rgba(255, 61, 130, 0.45);
        }
        .btn-primary:active { transform: scale(0.97); }
        .btn-outline-secondary {
            border-radius: 999px !important;
            border: 2px solid var(--candy) !important;
            color: var(--bubblegum-dark) !important;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn-outline-secondary:hover {
            background: var(--candy) !important;
            color: white !important;
            transform: translateY(-2px);
        }

        .form-label {
            font-weight: 700;
            color: var(--bubblegum-dark);
            font-family: 'Baloo 2', cursive;
        }
        .form-control {
            border-radius: 14px;
            border: 2px solid #FFE1EF;
            padding: 12px 16px;
            transition: all 0.2s ease;
            background-color: #FFFBFD;
        }
        .form-control:focus {
            border-color: var(--hotpink);
            box-shadow: 0 0 0 4px rgba(255, 61, 130, 0.15);
            background-color: #ffffff;
        }
        .form-control:disabled {
            background-color: #FFEAF2;
            color: var(--text-soft);
            opacity: 0.8;
        }
        .input-icon-wrap { position: relative; }
        .input-icon-wrap i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--bubblegum);
            z-index: 5;
        }
        .input-icon-wrap .form-control { padding-left: 42px; }

        @media (prefers-reduced-motion: reduce) {
            .floaty, .sparkle, .card-custom, .navbar-brand .bounce-icon,
            .btn-primary, .btn-outline-secondary, .form-control {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body>

<span class="floaty" style="top:8%; left:3%; animation-delay:0.2s;">🍓</span>
<span class="floaty" style="top:80%; left:4%; animation-delay:1.3s;">🌸</span>
<span class="floaty" style="top:12%; left:94%; animation-delay:0.7s;">🍡</span>
<span class="floaty" style="top:70%; left:95%; animation-delay:1.9s;">🎀</span>
<span class="sparkle" style="top:20%; left:20%; animation-delay:0.4s;">✨</span>
<span class="sparkle" style="top:35%; left:80%; animation-delay:1.1s;">✨</span>
<span class="sparkle" style="top:60%; left:10%; animation-delay:1.7s;">💫</span>

<nav class="navbar navbar-expand-lg navbar-custom py-3 shadow-sm mb-5">
    <div class="container-fluid px-5">
        <a class="navbar-brand d-flex align-items-center gap-2" href="../index.php">
            <span class="bounce-icon"><i class="bi bi-mortarboard-fill"></i></span> Skanet Aul 🎀
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
            <ul class="navbar-nav align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php"><i class="bi bi-person-badge-fill"></i> Data Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../guru/index.php"><i class="bi bi-person-badge-fill"></i> Data Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../mapel/index.php"><i class="bi bi-journal-bookmark-fill"></i> Data Mapel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../nilai/index.php"><i class="bi bi-person-badge-fill"></i> Data Nilai</a>
                </li>
                <li class="nav-item dropdown user-dropdown ms-lg-2">
                    <button class="btn dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical fs-5"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="../login.php"><i class="bi bi-person-fill-gear me-2"></i>Akun</a></li>
                        <li><a class="dropdown-item text-danger" href="../register.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mb-5" style="position: relative; z-index: 1;">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card card-custom p-4 bg-white">
                <h2 class="fw-bold title-cute d-flex align-items-center gap-2 mb-1">
                    <i class="bi bi-pencil-square"></i> Edit Siswa <span>🧁</span>
                </h2>
                <p class="subtitle-cute mb-4">Ubah data siswa di bawah ini, jangan sampai typo yaa~ 💕</p>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <div class="input-icon-wrap">
                            <i class="bi bi-hash"></i>
                            <input type="text" class="form-control" value="<?php echo $data['nis']; ?>" disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <div class="input-icon-wrap">
                            <i class="bi bi-person-fill"></i>
                            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat</label>
                        <div class="input-icon-wrap">
                            <i class="bi bi-geo-alt-fill"></i>
                            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="index.php" class="btn btn-outline-secondary px-4 py-2">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" name="update" class="btn btn-primary px-4 py-2 fw-semibold">
                            <i class="bi bi-check-circle-fill"></i> Update
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