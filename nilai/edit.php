<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$querydata = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_nilai = '$id'");
$data = mysqli_fetch_array($querydata);

if (mysqli_num_rows($querydata) < 1) {
    die("Data ora ketemu...");
}

// Proses Update
if (isset($_POST['update'])) {
    $nis      = $_POST['nis'];
    $id_mapel = $_POST['id_mapel'];
    $nip      = $_POST['nip'];
    $nilai    = $_POST['nilai'];

    $update = mysqli_query($koneksi, "UPDATE nilai SET 
                nis = '$nis', 
                id_mapel = '$id_mapel', 
                nip = '$nip', 
                nilai = '$nilai' 
                WHERE id_nilai = '$id'");

    if ($update) {
        echo "<script>
                alert('Data nilai berhasil diupdate!');
                window.location.href='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengupdate data!');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Nilai</title>
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
        .card { border-radius: 15px; border: none; box-shadow: 0 4px 20px rgba(122,15,66,0.08); }
        .navbar-custom { background: linear-gradient(135deg, var(--berry) 0%, var(--berry-dark) 100%); }
        .text-primary { color: var(--berry) !important; }
        .form-select, .form-control {
            border-radius: 10px;
            border: 1px solid #F3D7CF;
        }
        .form-select:focus, .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(176,23,94,0.2);
            border-color: var(--berry);
        }
        .btn-primary { background: linear-gradient(135deg, var(--strawberry), var(--berry)) !important; border: none !important; }
        .btn-primary:hover, .btn-primary:focus { background: linear-gradient(135deg, var(--berry), var(--berry-dark)) !important; }

        @keyframes float { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-18px) rotate(10deg); } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
        .floaty { position: fixed; font-size: 2rem; opacity: 0.35; pointer-events: none; animation: float 6s ease-in-out infinite; z-index: 0; }
        .card { animation: fadeInUp 0.5s ease-out; position: relative; z-index: 1; }
        @media (prefers-reduced-motion: reduce) { .floaty, .card { animation: none; } }
    </style>
</head>
<body>

<span class="floaty" style="top:8%; left:4%; animation-delay:0.3s;">🍓</span>
<span class="floaty" style="top:85%; left:6%; animation-delay:1.5s;">🍃</span>
<span class="floaty" style="top:10%; left:94%; animation-delay:0.9s;">🍃</span>

<nav class="navbar navbar-expand-lg navbar-custom py-3 shadow-sm mb-5">
    <div class="container px-5">
        <a class="navbar-brand fw-bold text-white" href="index.php"><i class="bi bi-mortarboard-fill"></i> Skanet Aul</a>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 bg-white">
                <h3 class="fw-bold text-primary mb-3"><i class="bi bi-pencil-square"></i> Edit Data Nilai</h3>
                <hr>
                
                <form action="" method="POST">
                    <!-- Siswa -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Siswa</label>
                        <select name="nis" class="form-select" required>
                            <?php 
                            $siswa_sql = mysqli_query($koneksi, "SELECT * FROM siswa");
                            while($s = mysqli_fetch_array($siswa_sql)) {
                                $selected = ($s['nis'] == $data['nis']) ? 'selected' : '';
                                echo "<option value='".$s['nis']."' $selected>".$s['nama']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Mapel -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Mata Pelajaran</label>
                        <select name="id_mapel" class="form-select" required>
                            <?php 
                            $mapel_sql = mysqli_query($koneksi, "SELECT * FROM mapel");
                            while($m = mysqli_fetch_array($mapel_sql)) {
                                $selected = ($m['id_mapel'] == $data['id_mapel']) ? 'selected' : '';
                                echo "<option value='".$m['id_mapel']."' $selected>".$m['nama_mapel']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Guru -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Guru Pengampu</label>
                        <select name="nip" class="form-select" required>
                            <?php 
                            $guru_sql = mysqli_query($koneksi, "SELECT * FROM guru");
                            while($g = mysqli_fetch_array($guru_sql)) {
                                $selected = ($g['nip'] == $data['nip']) ? 'selected' : '';
                                echo "<option value='".$g['nip']."' $selected>".$g['nama']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Nilai -->
                    <div class="mb-3">
                        <label for="nilai" class="form-label fw-bold">Nilai</label>
                        <input type="number" class="form-control" id="nilai" name="nilai" value="<?php echo $data['nilai']; ?>" min="0" max="100" required>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" name="update" class="btn btn-primary px-4">Simpan</button>
                        <a href="index.php" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>