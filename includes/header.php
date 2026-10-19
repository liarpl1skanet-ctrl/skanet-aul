<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: /login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Sekolah | SKANET AUL</title>

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
* { font-family: 'Nunito', sans-serif; }
h2, h3, h4 { font-family: 'Fredoka', sans-serif; }
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
.navbar-custom .navbar-brand { font-family: 'Fredoka', sans-serif; font-weight: 700; font-size: 1.4rem; color: #ffffff !important; }
.navbar-custom .nav-link { color: #ffffff !important; font-weight: 500; padding: 8px 16px !important; border-radius: 8px; transition: background-color 0.2s ease; }
.navbar-custom .nav-link:hover, .navbar-custom .nav-link.active { background-color: rgba(255, 255, 255, 0.18); }
.navbar-custom .nav-link i { margin-right: 6px; }
.user-dropdown .btn { color: #ffffff; font-weight: 600; display: flex; align-items: center; gap: 8px; }
.user-dropdown .btn.no-caret::after { display: none; }
.btn{ border-radius: 12px !important; }
.btn-primary { background: linear-gradient(135deg, var(--strawberry), var(--berry)); border: none; }
.btn-primary:hover { background: linear-gradient(135deg, var(--berry), var(--berry-dark)); }
footer{ margin-top: 50px; color: #8a5a6b; padding: 20px; }
footer hr { border-top: 1px solid #f0d9e1; }
.floaty { position: fixed; font-size: 2rem; opacity: 0.4; pointer-events: none; animation: float 6s ease-in-out infinite; z-index: 0; }
@keyframes float { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-18px) rotate(10deg); } }
</style>
</head>
<body>

<span class="floaty" style="top:8%; left:5%; animation-delay:0.4s;">🍃</span>
<span class="floaty" style="top:82%; left:8%; animation-delay:1.6s;">🍓</span>
<span class="floaty" style="top:12%; left:92%; animation-delay:1s;">🍓</span>
<span class="floaty" style="top:86%; left:90%; animation-delay:2.2s;">🍃</span>

<nav class="navbar navbar-expand-lg navbar-custom py-3 shadow-sm mb-5">
    <div class="container-fluid px-5">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/index.php">
            <i class="bi bi-mortarboard-fill"></i> Skanet Aul
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
            <ul class="navbar-nav align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link" href="/siswa/"><i class="bi bi-person-badge-fill"></i> Data Siswa</a></li>
                <li class="nav-item"><a class="nav-link" href="/guru/"><i class="bi bi-person-badge-fill"></i> Data Guru</a></li>
                <li class="nav-item"><a class="nav-link" href="/mapel/"><i class="bi bi-journal-bookmark-fill"></i> Data Mapel</a></li>
                <li class="nav-item"><a class="nav-link" href="/nilai/"><i class="bi bi-person-badge-fill"></i> Data Nilai</a></li>
                <li class="nav-item dropdown user-dropdown ms-lg-2">
                    <button class="btn dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical fs-5"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><span class="dropdown-item-text"><i class="bi bi-person-fill-gear me-2"></i><?= $_SESSION['username']; ?></span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">