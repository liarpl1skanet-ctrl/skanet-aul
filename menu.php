<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Menu Utama | SKANET AUL</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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

    body {
        font-family: 'Nunito', sans-serif;
        background:
            radial-gradient(circle at 8% 10%, rgba(255,201,74,0.35) 0, transparent 30%),
            radial-gradient(circle at 92% 8%, rgba(111,168,96,0.25) 0, transparent 26%),
            var(--cream);
        min-height: 100vh;
    }

    h2, h3, h4 {
        font-family: 'Fredoka', sans-serif;
    }

    .card {
        border-radius: 15px !important;
        box-shadow: 0 4px 6px rgba(122,15,66,0.06) !important;
    }

    .btn {
        border-radius: 8px !important;
    }

    .table th {
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #f0d9e1 !important;
    }

    .navbar-custom {
        background: linear-gradient(135deg, var(--berry) 0%, var(--berry-dark) 100%);
    }

    .navbar-custom .navbar-brand {
        font-family: 'Fredoka', sans-serif;
        font-weight: 700;
        font-size: 1.4rem;
        color: #ffffff !important;
    }

    .navbar-custom .nav-link {
        color: #ffffff !important;
        font-weight: 500;
        padding: 8px 16px !important;
        border-radius: 8px;
        transition: background-color 0.2s ease;
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .nav-link.active {
        background-color: rgba(255, 255, 255, 0.18);
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
    }

    .user-dropdown .btn:hover,
    .user-dropdown .btn:focus {
        color: #ffffff;
    }

    .user-dropdown .btn.no-caret::after {
        display: none;
    }

    .card-custom {
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 20px rgba(122,15,66,0.08);
    }

    .badge-nis {
        background-color: var(--berry);
        color: white;
        padding: 6px 10px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 0.85rem;
    }

    .table td {
        padding: 15px 10px;
        vertical-align: middle;
    }

    .alert-info-custom {
        background-color: #FBE3EC;
        border: none;
        color: var(--berry-dark);
        border-radius: 10px;
    }

    .hero h2 {
        color: var(--berry-dark);
    }

    .menu-card {
        border: none;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .menu-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px -8px rgba(176,23,94,0.25) !important;
    }

    .menu-icon {
        font-size: 2.4rem;
    }

    .menu-icon.text-primary,
    .menu-icon.text-success {
        color: var(--berry) !important;
    }

    .btn-success {
        background: linear-gradient(135deg, var(--strawberry), var(--berry));
        border: none;
    }

    .btn-success:hover,
    .btn-success:focus {
        background: linear-gradient(135deg, var(--berry), var(--berry-dark));
    }

    .btn-outline-secondary {
        color: var(--berry-dark);
        border-color: var(--berry);
    }

    .btn-outline-secondary:hover {
        background-color: var(--berry);
        border-color: var(--berry);
    }

    footer p {
        color: #8a5a6b;
    }

    footer hr {
        border-top: 1px solid #f0d9e1;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-18px) rotate(10deg); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .floaty {
        position: fixed;
        font-size: 2rem;
        opacity: 0.4;
        pointer-events: none;
        animation: float 6s ease-in-out infinite;
        z-index: 0;
    }

    .hero {
        animation: fadeInUp 0.5s ease-out;
    }

    .menu-card {
        animation: fadeInUp 0.6s ease-out both;
    }

    .row.mt-5 > div:nth-child(1) .menu-card { animation-delay: 0.05s; }
    .row.mt-5 > div:nth-child(2) .menu-card { animation-delay: 0.15s; }
    .row.mt-5 > div:nth-child(3) .menu-card { animation-delay: 0.25s; }
    .row.mt-5 > div:nth-child(4) .menu-card { animation-delay: 0.35s; }

    .menu-icon i {
        display: inline-block;
        transition: transform 0.25s ease;
    }

    .menu-card:hover .menu-icon i {
        transform: scale(1.15) rotate(-6deg);
    }

    @media (prefers-reduced-motion: reduce) {
        .floaty, .hero, .menu-card {
            animation: none;
        }
    }
</style>

</head>

<body>

<span class="floaty" style="top:6%; left:4%; animation-delay:0.2s;">🍓</span>
<span class="floaty" style="top:85%; left:6%; animation-delay:1.4s;">🍃</span>
<span class="floaty" style="top:10%; left:94%; animation-delay:0.8s;">🍃</span>
<span class="floaty" style="top:88%; left:92%; animation-delay:2s;">🍓</span>

<nav class="navbar navbar-expand-lg navbar-custom py-3 shadow-sm mb-5">
    <div class="container-fluid px-5">

        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
            <i class="bi bi-mortarboard-fill"></i> Skanet Aul
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
            <ul class="navbar-nav align-items-lg-center gap-lg-1">

                <li class="nav-item">
                    <a class="nav-link" href="siswa/">
                        <i class="bi bi-person-badge-fill"></i> Data Siswa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="guru/">
                        <i class="bi bi-person-badge-fill"></i> Data Guru
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bold" href="mapel/">
                        <i class="bi bi-journal-bookmark-fill"></i> Data Mapel
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="nilai/">
                        <i class="bi bi-person-badge-fill"></i> Data Nilai
                    </a>
                </li>

                <li class="nav-item dropdown user-dropdown ms-lg-2">
                    <button class="btn dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical fs-5"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="../login.php"><i class="bi bi-person-fill-gear me-2"></i>Akun</a></li>
                        <li><a class="dropdown-item text-danger" href="register.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="hero text-center">
        <h2 class="fw-bold">Pilih Menu</h2>
        <p class="text-muted">Silakan pilih menu yang ingin dikelola.</p>
    </div>

    <div class="row mt-5">

        <div class="col-md-6 mb-4">
            <div class="card menu-card p-4 text-center">
                <div class="menu-icon text-primary">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h3 class="mt-3">Data Siswa</h3>
                <p>Kelola seluruh data siswa.</p>
                <a href="siswa/" class="btn btn-success w-100">
                    <i class="bi bi-arrow-right-circle"></i> Masuk Data Siswa
                </a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card menu-card p-4 text-center">
                <div class="menu-icon text-success">
                    <i class="bi bi-person-workspace"></i>
                </div>
                <h3 class="mt-3">Data Guru</h3>
                <p>Kelola seluruh data guru.</p>
                <a href="guru/" class="btn btn-success w-100">
                    <i class="bi bi-arrow-right-circle"></i> Masuk Data Guru
                </a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card menu-card p-4 text-center">
                <div class="menu-icon text-success">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </div>
                <h3 class="mt-3">Data Mapel</h3>
                <p>Kelola seluruh data mapel.</p>
                <a href="mapel/" class="btn btn-success w-100">
                    <i class="bi bi-arrow-right-circle"></i> Masuk Data Mapel
                </a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card menu-card p-4 text-center">
                <div class="menu-icon text-success">
                    <i class="bi bi-award-fill"></i>
                </div>
                <h3 class="mt-3">Data Nilai</h3>
                <p>Kelola seluruh data Nilai.</p>
                <a href="nilai/" class="btn btn-success w-100">
                    <i class="bi bi-arrow-right-circle"></i> Masuk Data Nilai
                </a>
            </div>
        </div>

    </div>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <footer class="text-center">
        <hr>
        <p>
            © 2026 Sistem Informasi Sekolah
            <br>
            SMK Negeri
        </p>
    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>