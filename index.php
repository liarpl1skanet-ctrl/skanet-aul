<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard | SKANET AUL</title>

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

* {
    font-family: 'Nunito', sans-serif;
}

h2, h3, h4 {
    font-family: 'Fredoka', sans-serif;
}

body {
    background:
        radial-gradient(circle at 8% 10%, rgba(255,201,74,0.35) 0, transparent 30%),
        radial-gradient(circle at 92% 8%, rgba(111,168,96,0.25) 0, transparent 26%),
        var(--cream);
    min-height: 100vh;
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
.hero{
    background: #ffffff;
    border-radius: 20px;
    padding: 45px;
    margin-top: 35px;
    box-shadow: 0 10px 25px rgba(122,15,66,.10);
    position: relative;
    overflow: hidden;
}
.hero::before {
    content: "";
    position: absolute;
    top: -70px;
    right: -70px;
    width: 180px;
    height: 180px;
    background: var(--gold);
    border-radius: 50%;
    opacity: 0.12;
}
.hero h2{
    font-weight: 600;
    color: var(--berry-dark);
}
.hero p{
    color: #7a6570;
}
.btn{
    border-radius: 12px !important;
}
.btn-primary {
    background: linear-gradient(135deg, var(--strawberry), var(--berry));
    border: none;
}
.btn-primary:hover,
.btn-primary:focus {
    background: linear-gradient(135deg, var(--berry), var(--berry-dark));
}
.hero .bi-buildings-fill {
    color: var(--berry) !important;
}
footer{
    margin-top: 50px;
    color: #8a5a6b;
    padding: 20px;
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

@keyframes bounceSoft {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
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
    animation: fadeInUp 0.6s ease-out;
}

.hero-bear {
    display: inline-block;
    animation: bounceSoft 3s ease-in-out infinite;
}

@media (prefers-reduced-motion: reduce) {
    .floaty, .hero, .hero-bear {
        animation: none;
    }
}
</style>

</head>

<body>

<span class="floaty" style="top:8%; left:5%; animation-delay:0.4s;">🍃</span>
<span class="floaty" style="top:82%; left:8%; animation-delay:1.6s;">🍓</span>
<span class="floaty" style="top:12%; left:92%; animation-delay:1s;">🍓</span>
<span class="floaty" style="top:86%; left:90%; animation-delay:2.2s;">🍃</span>

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
                     <a class="nav-link" href="mapel/">
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
                        <li>
                            <span class="dropdown-item-text">
                                <i class="bi bi-person-fill-gear me-2"></i>
                                <?= $_SESSION['username']; ?>
                            </span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container">

<div class="hero">

<div class="row align-items-center">

<div class="col-md-8">

<h2>
Selamat Datang, <?= $_SESSION['username']; ?> 👋
</h2>

<p class="mt-3">
Selamat datang di Sistem Informasi Sekolah.
Kelola seluruh data sekolah dengan mudah, cepat, dan efisien.
Klik tombol <b>Mulai Sekarang</b> untuk masuk ke menu utama.
</p>

<a href="menu.php" class="btn btn-primary btn-lg mt-3">
<i class="bi bi-arrow-right-circle-fill"></i>
Mulai Sekarang
</a>

</div>

<div class="col-md-4 text-center">
<svg viewBox="0 0 220 240" width="180" height="196" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="hero-bear">
    <ellipse cx="65" cy="188" rx="26" ry="30" fill="#F2A6C4"/>
    <ellipse cx="155" cy="188" rx="26" ry="30" fill="#F2A6C4"/>
    <ellipse cx="65" cy="196" rx="15" ry="12" fill="#FFF4E8"/>
    <ellipse cx="155" cy="196" rx="15" ry="12" fill="#FFF4E8"/>
    <ellipse cx="110" cy="150" rx="62" ry="58" fill="#E0447C"/>
    <ellipse cx="55" cy="140" rx="20" ry="26" fill="#F2A6C4" transform="rotate(-18 55 140)"/>
    <ellipse cx="165" cy="140" rx="20" ry="26" fill="#F2A6C4" transform="rotate(18 165 140)"/>
    <circle cx="82" cy="52" r="18" fill="#F2A6C4"/>
    <circle cx="138" cy="52" r="18" fill="#F2A6C4"/>
    <circle cx="82" cy="52" r="9" fill="#FCE0EC"/>
    <circle cx="138" cy="52" r="9" fill="#FCE0EC"/>
    <circle cx="110" cy="86" r="50" fill="#F2A6C4"/>
    <ellipse cx="110" cy="98" rx="32" ry="27" fill="#FFF4E8"/>
    <circle cx="92" cy="76" r="5.5" fill="#5A3245"/>
    <circle cx="128" cy="76" r="5.5" fill="#5A3245"/>
    <circle cx="82" cy="96" r="8" fill="#F27CA1" opacity="0.55"/>
    <circle cx="138" cy="96" r="8" fill="#F27CA1" opacity="0.55"/>
    <ellipse cx="110" cy="98" rx="9" ry="7" fill="#B0175E"/>
    <path d="M98 110 Q110 119 122 110" stroke="#B0175E" stroke-width="3.5" fill="none" stroke-linecap="round"/>
</svg>
</div>

</div>

</div>

</div>

<footer class="text-center">
<hr>
<p>
© 2026 Sistem Informasi Sekolah
<br>
SMK Negeri Takeran
</p>
</footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>