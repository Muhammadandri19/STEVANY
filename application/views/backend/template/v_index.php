<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <b>Dashboard</b> <small>Wisata Magelang</small>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- BOX STATISTIK -->
            <div class="row">

                <!-- Destinasi -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_destinasi; ?></h3>
                            <p>Destinasi Wisata</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <a href="<?= base_url('destinasi'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Hotel -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jumlah_hotel; ?></h3>
                            <p>Hotel</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hotel"></i>
                        </div>
                        <a href="<?= base_url('hotel'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <!-- Oleh-Oleh -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlah_oleh_oleh; ?></h3>
                            <p>Oleh-Oleh</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <a href="<?= base_url('oleh_oleh'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Pernak-Pernik -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $jumlah_pernak_pernik; ?></h3>
                            <p>Pernak-Pernik</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <a href="<?= base_url('pernak_pernik'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Berita -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?= $jumlah_berita; ?></h3>
                            <p>Berita Wisata</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <a href="<?= base_url('berita'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Pengguna -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3><?= $jumlah_pengguna; ?></h3>
                            <p>Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="<?= base_url('pengguna'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- WELCOME PANEL -->
            <div class="row">
                <section class="col-lg-12 connectedSortable">

                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-home"></i> Dashboard Informasi
                            </h3>
                        </div>

                        <div class="card-body">

                            <h3>Selamat Datang !</h3>

                            <div class="table-responsive">
                                <table class="table table-borderless table-hover">

                                    <tr>
                                        <th width="15%">Nama</th>
                                        <th width="1%">:</th>
                                        <td>
                                            <?= isset($user->pengguna_nama) ? $user->pengguna_nama : 'Guest'; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Username</th>
                                        <th>:</th>
                                        <td>
                                            <?= isset($user->pengguna_username) ? $user->pengguna_username : '-'; ?>
                                        </td>
                                    </tr>
 

                                    <tr>
                                        <th>Status</th>
                                        <th>:</th>
                                        <td>
                                            <span class="badge badge-success">
                                                Aktif
                                            </span>
                                        </td>
                                    </tr>

                                </table>
                            </div>

                        </div>

                    </div>

                </section>
            </div>

        </div>
    </section>

</div>