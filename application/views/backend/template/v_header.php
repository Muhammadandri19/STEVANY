<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= isset($title) ? $title : 'Wisata Magelang'; ?></title>

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">

  <!-- AdminLTE -->
  <link rel="stylesheet"
    href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">

  <!-- DataTables -->
  <link rel="stylesheet"
    href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">

  <!-- SweetAlert2 -->
  <link rel="stylesheet"
    href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">

  <!-- Toastr -->
  <link rel="stylesheet"
    href="<?= base_url('assets/plugins/toastr/toastr.min.css'); ?>">

  <style>
    .main-sidebar .sidebar {
      height: calc(100vh - 80px);
      overflow-y: auto;
    }

    .main-sidebar .sidebar::-webkit-scrollbar {
      width: 6px;
    }

    .main-sidebar .sidebar::-webkit-scrollbar-thumb {
      background: #6c757d;
      border-radius: 10px;
    }

    .main-sidebar .sidebar::-webkit-scrollbar-track {
      background: transparent;
    }

    .content-wrapper {
      min-height: calc(100vh - 114px) !important;
    }
  </style>


</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <?php
      $id_user = $this->session->userdata('id');

      $user = $this->db
        ->get_where('pengguna', [
          'pengguna_id' => $id_user
        ])
        ->row();

      $foto = 'default.png';

      if ($user && !empty($user->pengguna_foto)) {
        $foto = $user->pengguna_foto;
      }
      ?>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"
            data-widget="pushmenu"
            href="#"
            role="button">

            <i class="fas fa-bars"></i>

          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown user-menu">

          <a href="#"
            class="nav-link dropdown-toggle"
            data-toggle="dropdown">

            <img src="<?= base_url('uploads/pengguna/' . $foto); ?>"
              class="user-image img-circle elevation-2"
              style="width:35px;height:35px;object-fit:cover;">

            <span class="d-none d-md-inline">

              <?= $user ? $user->pengguna_nama : 'Administrator'; ?>

            </span>

          </a>

          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <li class="user-header bg-primary">

              <img src="<?= base_url('uploads/pengguna/' . $foto); ?>"
                class="img-circle elevation-2"
                style="width:90px;height:90px;object-fit:cover;">

              <p>

                <?= $user ? $user->pengguna_nama : 'Administrator'; ?>

                <small>

                  <?= $user ? strtoupper($user->pengguna_level) : 'ADMIN'; ?>

                </small>

              </p>

            </li>

            <li class="user-footer">

              <a href="<?= base_url('profil'); ?>"
                class="btn btn-default btn-flat">

                Profil

              </a>

              <a href="<?= base_url('login/logout'); ?>"
                class="btn btn-danger btn-flat float-right">

                Logout

              </a>

            </li>

          </ul>

        </li>

      </ul>

    </nav>
    <!-- /.navbar -->