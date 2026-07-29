<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Administrator - DOLAN MAGELANGAN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            min-height: 100vh;

            font-family: 'Segoe UI', sans-serif;

            overflow: hidden;

        }



        /* BACKGROUND BERGERAK */

        body::before {

            content: "";

            position: fixed;

            inset: -40px;

            background: url('<?= base_url('assets_frontend/img/hero-wisata.jpg'); ?>') center/cover;

            animation:
                backgroundMove 20s infinite alternate;

            z-index: -2;

        }



        @keyframes backgroundMove {

            from {

                transform: scale(1);

            }


            to {

                transform: scale(1.15);

            }

        }



        body::after {

            content: "";

            position: fixed;

            inset: 0;

            background:
                rgba(0, 0, 0, .55);

            z-index: -1;

        }





        /* WRAPPER */


        .login-wrapper {

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 30px;

        }





        /* CARD BUKU */


        .login-card {

            width: 100%;

            max-width: 850px;

            min-height: 460px;

            background: white;

            border-radius: 22px;

            overflow: hidden;

            display: flex;

            position: relative;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, .45);

            animation:
                showCard .8s ease;

        }



        .login-card:hover {

            transform:
                translateY(-5px);

            transition: .4s;

            box-shadow:
                0 35px 80px rgba(0, 0, 0, .55);

        }



        @keyframes showCard {

            from {

                opacity: 0;

                transform:
                    translateY(40px) scale(.95);

            }


            to {

                opacity: 1;

                transform:
                    translateY(0) scale(1);

            }

        }




        .login-card::after {

            content: "";

            position: absolute;

            left: 50%;

            top: 0;

            width: 1px;

            height: 100%;

            background:
                rgba(0, 0, 0, .1);

        }





        /* PANEL KIRI */


        .left-panel {

            width: 50%;

            position: relative;

            padding: 35px;

            color: white;

            display: flex;

            align-items: center;

        }



        .left-panel::before {

            content: "";

            position: absolute;

            inset: 0;

            background:

                linear-gradient(rgba(0, 100, 70, .75),
                    rgba(0, 0, 0, .65)),

                url('<?= base_url('assets_frontend/img/hero-wisata.jpg'); ?>') center/cover;

        }



        .left-content {

            position: relative;

            z-index: 2;

        }



        .badge-wisata {

            background: #20c997;

            padding: 7px 16px;

            border-radius: 30px;

            font-size: 13px;

        }



        .left-content h1 {

            margin-top: 20px;

            font-size: 32px;

            font-weight: 800;

        }



        .left-content p {

            font-size: 13px;

            line-height: 1.7;

            margin-top: 15px;

        }





        /* PANEL LOGIN */


        .right-panel {

            width: 50%;

            padding: 55px 35px 30px;

            position: relative;

        }





        /* LOGO */


        .logo {

            width: 75px;

            height: 75px;

            object-fit: contain;

            display: block;

            margin: -35px auto 18px;

            background: white;

            border-radius: 50%;

            padding: 8px;

            box-shadow:

                0 8px 25px rgba(0, 0, 0, .25);

        }





        .title {

            font-size: 22px;

            font-weight: 800;

            color: #198754;

        }



        .subtitle {

            font-size: 12px;

            color: #777;

            margin-bottom: 20px;

        }




        .admin-info {

            background: #eaf8f2;

            padding: 10px;

            border-radius: 10px;

            font-size: 12px;

            margin-bottom: 20px;

        }




        .form-control {

            height: 42px;

            font-size: 14px;

        }



        .input-group-text {

            background: #f8f9fa;

        }




        .btn-login {

            height: 42px;

            border: none;

            font-weight: 600;

            background:

                linear-gradient(135deg,
                    #198754,
                    #20c997);

        }



        .btn-login:hover {

            opacity: .9;

        }




        .toggle-pass {

            cursor: pointer;

        }



        .footer-text {

            margin-top: 15px;

            font-size: 11px;

            color: #777;

        }






        /* RESPONSIVE */


        @media(max-width:850px) {


            body {

                overflow: auto;

            }



            .login-card {

                flex-direction: column;

            }



            .login-card::after {

                display: none;

            }



            .left-panel,
            .right-panel {

                width: 100%;

            }



            .left-panel {

                min-height: 300px;

            }



        }
    </style>

</head>


<body>


    <div class="login-wrapper">


        <div class="login-card">



            <!-- PANEL KIRI -->


            <div class="left-panel">


                <div class="left-content">


                    <span class="badge-wisata">

                        <i class="bi bi-geo-alt"></i>
                        Wisata Magelang

                    </span>



                    <h1>

                        DOLAN
                        <br>
                        MAGELANG

                    </h1>



                    <p>

                        Sistem informasi promosi pariwisata
                        Kabupaten Magelang yang menyediakan
                        informasi destinasi wisata, hotel,
                        galeri, berita, dan rekomendasi perjalanan.

                    </p>


                    <p>

                        Temukan keindahan alam,
                        budaya, dan sejarah Magelang
                        dalam satu platform wisata.

                    </p>



                </div>


            </div>





            <!-- PANEL LOGIN -->


            <div class="right-panel text-center">



                <img src="<?= base_url('assets_frontend/img/stevany.jpeg'); ?>"
                    class="logo">



                <h4 class="title">

                    Administrator

                </h4>


                <div class="subtitle">

                    DOLAN MAGELANG

                </div>




                <div class="admin-info">

                    <i class="bi bi-shield-lock"></i>

                    Login Administrator Website

                </div>




                <?php if ($this->session->flashdata('error')): ?>


                    <div class="alert alert-danger py-2">

                        <?= $this->session->flashdata('error'); ?>


                    </div>


                <?php endif; ?>





                <form action="<?= base_url('login/proses'); ?>"
                    method="post">



                    <div class="mb-3 text-start">


                        <label class="small">

                            Username

                        </label>


                        <div class="input-group">


                            <span class="input-group-text">

                                <i class="bi bi-person"></i>

                            </span>



                            <input type="text"
                                name="username"
                                class="form-control"
                                placeholder="Username"
                                required>


                        </div>


                    </div>





                    <div class="mb-3 text-start">


                        <label class="small">

                            Password

                        </label>


                        <div class="input-group">


                            <span class="input-group-text">

                                <i class="bi bi-lock"></i>

                            </span>



                            <input type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Password"
                                required>



                            <span class="input-group-text toggle-pass"
                                onclick="togglePassword()">


                                <i class="bi bi-eye-slash"
                                    id="iconPass"></i>


                            </span>



                        </div>


                    </div>





                    <button class="btn btn-login text-white w-100">


                        <i class="bi bi-box-arrow-in-right"></i>

                        Masuk Dashboard


                    </button>




                </form>




                <div class="footer-text">

                    © <?= date('Y'); ?>
                    DOLAN MAGELANG

                    <br>

                    Administrator Panel

                </div>



            </div>



        </div>


    </div>





    <script>
        function togglePassword() {


            let pass =
                document.getElementById('password');


            let icon =
                document.getElementById('iconPass');



            if (pass.type === "password") {


                pass.type = "text";


                icon.classList.replace(
                    'bi-eye-slash',
                    'bi-eye'
                );



            } else {


                pass.type = "password";


                icon.classList.replace(
                    'bi-eye',
                    'bi-eye-slash'
                );


            }


        }
    </script>


</body>

</html>