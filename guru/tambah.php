<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Guru 🎀</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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
        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
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
        .card-custom:hover {
            transform: translateY(-4px);
        }

        .title-cute { color: var(--hotpink) !important; font-weight: 700; }

        .alert-info-custom {
            background: linear-gradient(135deg, #FFE1EF, #FFF0DC);
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
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-12deg); }
            75% { transform: rotate(12deg); }
        }

        .btn { border-radius: 999px !important; transition: transform 0.2s ease; }
        .btn:hover { transform: translateY(-2px); }
        .btn-primary {
            background: linear-gradient(135deg, var(--peach), var(--hotpink)) !important;
            border: none !important;
            box-shadow: 0 6px 16px rgba(255, 61, 130, 0.35);
        }
        .btn-primary:hover {
            transform: translateY(-3px) scale(1.03) rotate(-1deg);
            box-shadow: 0 10px 22px rgba(255, 61, 130, 0.45);
        }
        .btn-secondary {
            background: #FFEAF2 !important;
            color: var(--bubblegum-dark) !important;
            border: 2px solid var(--candy) !important;
            font-weight: 600;
        }
        .btn-secondary:hover {
            background: var(--candy) !important;
            color: white !important;
        }

        .form-label {
            font-weight: 700;
            color: var(--bubblegum-dark);
            font-family: 'Baloo 2', cursive;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .form-control {
            border-radius: 14px;
            border: 2px solid #FFE1EF;
            padding: 10px 14px;
            transition: all 0.2s ease;
            background-color: #FFFBFD;
        }
        .form-control:focus {
            border-color: var(--hotpink);
            box-shadow: 0 0 0 4px rgba(255, 61, 130, 0.15);
            background-color: #ffffff;
        }

        @media (prefers-reduced-motion: reduce) {
            .floaty, .sparkle, .card-custom, .navbar-brand .bounce-icon,
            .alert-info-custom i, .btn, .form-control {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body>

<span class="floaty" style="top:8%; left:3%; animation-delay:0.2s;">📚</span>
<span class="floaty" style="top:80%; left:4%; animation-delay:1.3s;">🌸</span>
<span class="floaty" style="top:12%; left:94%; animation-delay:0.7s;">🍎</span>
<span class="sparkle" style="top:20%; left:20%; animation-delay:0.4s;">✨</span>
<span class="sparkle" style="top:35%; left:80%; animation-delay:1.1s;">✨</span>
<span class="sparkle" style="top:60%; left:10%; animation-delay:1.7s;">💫</span>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a href="index.php" class="navbar-brand fw-bold">
            <span class="bounce-icon"><i class="bi bi-mortarboard-fill"></i></span> Data Guru 🎀
        </a>
    </div>
</nav>

<div class="container py-5" style="position: relative; z-index: 1;">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card card-custom">

                <div class="card-body p-4">

                    <h2 class="text-center title-cute fw-bold mb-4 d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-person-plus-fill"></i>
                        Tambah Data Guru <span>👩‍🏫</span>
                    </h2>

                    <div class="alert alert-info-custom d-flex align-items-center gap-2">
                        <i class="bi bi-stars fs-5"></i>
                        Silakan lengkapi data guru di bawah ini yaa~ 💕
                    </div>

                    <form action="simpan.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-credit-card-2-front-fill"></i>
                                NIP
                            </label>
                            <input
                                type="text"
                                name="nip"
                                class="form-control"
                                placeholder="Masukkan NIP"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-person-fill"></i>
                                Nama Guru
                            </label>
                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Masukkan Nama Guru"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-geo-alt-fill"></i>
                                Alamat
                            </label>
                            <textarea
                                name="alamat"
                                class="form-control"
                                rows="3"
                                placeholder="Masukkan Alamat Guru"
                                required></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary fw-semibold">
                                <i class="bi bi-save-fill"></i>
                                Simpan Data
                            </button>

                            <a href="index.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>