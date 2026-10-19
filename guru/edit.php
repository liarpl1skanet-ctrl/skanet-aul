<?php
include "koneksi.php";
$nip = $_GET['nip'];
$query = mysqli_query($koneksi, "SELECT * FROM guru WHERE nip='$nip'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Guru 🎀</title>
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

        .navbar-custom {
            background: linear-gradient(135deg, var(--bubblegum) 0%, var(--hotpink) 55%, var(--bubblegum-dark) 100%);
            padding-top: 15px;
            padding-bottom: 12px;
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

        .card-custom {
            border-radius: 28px;
            border: 3px solid #FFE1EF;
            box-shadow: 0 10px 30px rgba(255, 111, 165, 0.18);
            max-width: 550px;
            margin: 14px auto 50px auto;
            position: relative;
            z-index: 10;
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

        .form-label {
            font-family: 'Baloo 2', cursive;
            font-weight: 600;
            color: var(--bubblegum-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .form-control {
            border-radius: 14px;
            border: 2px solid #FFE1EF;
            background-color: #FFFBFD;
        }
        .form-control:focus {
            border-color: var(--hotpink);
            box-shadow: 0 0 0 4px rgba(255, 61, 130, 0.15);
            background-color: #ffffff;
        }
        .form-control[readonly] {
            background-color: #FFEAF2 !important;
            color: var(--text-soft);
        }

        .text-primary { color: var(--hotpink) !important; }

        .btn { border-radius: 999px !important; transition: transform 0.2s ease; }
        .btn:hover { transform: translateY(-2px); }
        .btn-custom-submit {
            background: linear-gradient(135deg, var(--peach), var(--hotpink));
            border: none;
            color: white;
            font-weight: 700;
            box-shadow: 0 6px 16px rgba(255, 61, 130, 0.35);
        }
        .btn-custom-submit:hover {
            background: linear-gradient(135deg, var(--hotpink), var(--bubblegum-dark));
            color: white;
            transform: translateY(-3px) scale(1.02);
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

        @keyframes float { 0%, 100% { transform: translateY(0) rotate(-6deg); } 50% { transform: translateY(-22px) rotate(8deg); } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes sparkleTwinkle {
            0%, 100% { opacity: 0.2; transform: scale(0.8) rotate(0deg); }
            50% { opacity: 1; transform: scale(1.2) rotate(180deg); }
        }
        .floaty { position: fixed; font-size: 2rem; opacity: 0.55; pointer-events: none; animation: float 5s ease-in-out infinite; z-index: 0; filter: drop-shadow(0 4px 6px rgba(255,111,165,0.25)); }
        .sparkle { position: fixed; font-size: 1.1rem; pointer-events: none; animation: sparkleTwinkle 3s ease-in-out infinite; z-index: 0; }
        .card-custom { animation: fadeInUp 0.5s ease-out; }
        @media (prefers-reduced-motion: reduce) { .floaty, .sparkle, .card-custom, .navbar-brand .bounce-icon, .alert-info-custom i, .btn { animation: none; transition: none; } }
    </style>
</head>
<body>

    <span class="floaty" style="top:8%; left:4%; animation-delay:0.3s;">📚</span>
    <span class="floaty" style="top:85%; left:6%; animation-delay:1.5s;">🌸</span>
    <span class="floaty" style="top:10%; left:94%; animation-delay:0.9s;">🍎</span>
    <span class="sparkle" style="top:25%; left:15%; animation-delay:0.6s;">✨</span>
    <span class="sparkle" style="top:65%; left:90%; animation-delay:1.4s;">💫</span>

    <nav class="navbar navbar-custom shadow-sm">
        <div class="container-fluid px-5">
            <span class="navbar-brand text-white fw-bold fs-4 d-flex align-items-center gap-2">
                <span class="bounce-icon"><i class="bi bi-mortarboard-fill"></i></span> Data Guru 🎀
            </span>
        </div>
    </nav>


    <div class="container" style="position: relative; z-index: 1;">
        <div class="card card-custom p-4 bg-white">


            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary d-flex align-items-center justify-content-center gap-2 mb-1">
                    <i class="bi bi-person-gear"></i> Edit Data Guru <span>🧁</span>
                </h2>
            </div>


            <div class="alert alert-info-custom d-flex align-items-center gap-2 py-3 px-3 mb-4" role="alert">
                <i class="bi bi-stars fs-5"></i>
                <div>Silakan ubah data guru di bawah ini, jangan sampai typo yaa~ 💕</div>
            </div>


            <form action="update.php" method="POST">


                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-card-list"></i> NIP</label>
                    <input type="text" name="nip" class="form-control form-control-lg rounded-3" value="<?php echo $data['nip']; ?>" readonly>
                    <small class="text-muted ps-1">*NIP tidak dapat diubah saat proses edit</small>
                </div>


                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-person-fill"></i> Nama Guru</label>
                    <input type="text" name="nama" class="form-control form-control-lg rounded-3" value="<?php echo $data['nama']; ?>" required>
                </div>


                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-geo-alt-fill"></i> Alamat</label>
                    <textarea name="alamat" class="form-control form-control-lg rounded-3" rows="3" required><?php echo $data['alamat']; ?></textarea>
                </div>


                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-custom-submit btn-lg py-2 rounded-3 d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-box-arrow-down"></i> Simpan Data
                    </button>
                    <a href="index.php" class="btn btn-secondary btn-lg py-2 rounded-3 d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>