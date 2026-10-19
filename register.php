<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
            min-height: 100vh;
            margin: 0;
            background:
                radial-gradient(circle at 12% 15%, rgba(255,201,74,0.55) 0, transparent 32%),
                radial-gradient(circle at 88% 20%, rgba(111,168,96,0.35) 0, transparent 28%),
                radial-gradient(circle at 20% 85%, rgba(232,72,60,0.35) 0, transparent 30%),
                linear-gradient(160deg, var(--berry) 0%, var(--magenta) 55%, #F27CA1 100%);
            background-attachment: fixed;
        }

        .register-card {
            border: none;
            border-radius: 28px;
            background: var(--cream);
            box-shadow: 0 25px 50px -12px rgba(122,15,66,0.45);
            overflow: hidden;
            position: relative;
        }

        .register-card::before {
            content: "";
            position: absolute;
            top: -60px;
            left: -60px;
            width: 150px;
            height: 150px;
            background: var(--leaf);
            border-radius: 50%;
            opacity: 0.12;
        }

        .card-header-berry {
            background: linear-gradient(135deg, var(--berry) 0%, var(--berry-dark) 100%);
            color: #fff;
            text-align: center;
            padding: 2.25rem 1.5rem 2rem;
            border-radius: 28px 28px 45% 45% / 28px 28px 20px 20px;
        }

        .card-header-berry .seed {
            font-size: 2.1rem;
            display: block;
            margin-bottom: 0.25rem;
        }

        .card-header-berry h4 {
            font-family: 'Fredoka', sans-serif;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin: 0;
        }

        .card-header-berry small {
            opacity: 0.85;
        }

        .form-label, label {
            font-family: 'Fredoka', sans-serif;
            font-weight: 500;
            color: var(--berry-dark);
        }

        .form-control {
            border: 2px solid #F3D7CF;
            border-radius: 14px;
            background: #fff;
        }

        .form-control:focus {
            border-color: var(--berry);
            box-shadow: 0 0 0 0.2rem rgba(176,23,94,0.2);
        }

        .btn-berry {
            font-family: 'Fredoka', sans-serif;
            font-weight: 600;
            letter-spacing: 0.5px;
            background: linear-gradient(135deg, var(--strawberry), var(--berry));
            border: none;
            border-radius: 14px;
            color: #fff;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .btn-berry:hover, .btn-berry:focus {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px -6px rgba(176,23,94,0.5);
            color: #fff;
        }

        .login-link {
            color: var(--berry);
            font-weight: 700;
            text-decoration: none;
        }

        .login-link:hover {
            color: var(--strawberry);
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row vh-100 align-items-center justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card register-card shadow-lg">

                <div class="card-header-berry">
                    <span class="seed">🍓</span>
                    <h4>Daftar Akun</h4>
                    <small>Buat akun baru, semanis stroberi</small>
                </div>

                <div class="card-body p-5">

                    <form action="proses_register.php" method="POST">

                        <div class="mb-4">
                            <label class="form-label">Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control form-control-lg"
                                   placeholder="Masukkan username"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control form-control-lg"
                                   placeholder="Masukkan password"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-berry btn-lg w-100">
                            Daftar
                        </button>

                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">
                            Sudah punya akun?
                            <a href="login.php" class="login-link">Login</a>
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

</body>
</html>