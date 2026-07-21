<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Explore Magelang</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470') no-repeat center center;
            background-size: cover;
            position: relative;
        }

        /* overlay gelap biar teks jelas */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.55);
        }

        .login-wrapper {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 25px 50px rgba(0,0,0,.3);
        }

        .logo {
            width: 70px;
            margin-bottom: 10px;
        }

        .title {
            font-weight: 700;
            color: #198754;
        }

        .subtitle {
            font-size: 13px;
            color: #666;
            margin-bottom: 25px;
        }

        .form-control {
            height: 45px;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 .2rem rgba(25,135,84,.2);
        }

        .input-group-text {
            background: #f8f9fa;
        }

        .btn-login {
            height: 45px;
            font-weight: 600;
            background: linear-gradient(135deg, #198754, #20c997);
            border: none;
        }

        .btn-login:hover {
            opacity: .9;
        }

        .toggle-pass {
            cursor: pointer;
        }

        .footer-text {
            font-size: 12px;
            color: #777;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="login-box text-center">

        <!-- LOGO -->
        <img src="<?= base_url('assets/img/magelang-logo.png') ?>" class="logo" alt="Logo">

        <h4 class="title">Explore Magelang</h4>
        <div class="subtitle">
            Sistem Informasi Promosi Pariwisata Kota Magelang
        </div>

        <!-- ALERT ERROR -->
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div><?= $this->session->flashdata('error') ?></div>
            </div>
        <?php endif; ?>

        <!-- FORM -->
        <form action="<?= base_url('login/proses') ?>" method="post">

            <!-- USERNAME -->
            <div class="mb-3 text-start">
                <label>Username</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="mb-3 text-start">
                <label>Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>

                    <input type="password" id="password" name="password"
                        class="form-control" placeholder="Masukkan password" required>

                    <span class="input-group-text toggle-pass" onclick="togglePassword()">
                        <i class="bi bi-eye-slash" id="iconPass"></i>
                    </span>
                </div>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn btn-login text-white w-100">
                Masuk
            </button>

        </form>

        <div class="footer-text">
            © <?= date('Y') ?> Explore Magelang • Discover Beauty of Java
        </div>

    </div>

</div>

<script>
function togglePassword() {
    const pass = document.getElementById('password');
    const icon = document.getElementById('iconPass');

    if (pass.type === 'password') {
        pass.type = 'text';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    } else {
        pass.type = 'password';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    }
}
</script>

</body>
</html>