<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('dashboard'); ?>" class="brand-link text-center">
        <span class="brand-text font-weight-light">
            STEVANY TRAVELING
        </span>
    </a>

    <div class="sidebar">

        <?php
        $id_user = $this->session->userdata('id');

        $user = $this->db
            ->get_where(
                'pengguna',
                [
                    'pengguna_id' => $id_user
                ]
            )
            ->row();

        $foto = 'default.png';

        if ($user && !empty($user->pengguna_foto)) {
            $foto = $user->pengguna_foto;
        }
        ?>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('uploads/pengguna/' . $foto); ?>"
                    class="img-circle elevation-2"
                    style="width:34px;height:34px;object-fit:cover;">
            </div>

            <div class="info">
                <a href="<?= base_url('profil'); ?>" class="d-block">
                    <?= $user ? $user->pengguna_nama : 'Administrator'; ?>
                </a>

                <small class="text-success">
                    <i class="fas fa-circle"></i> Online
                </small>
            </div>
        </div>

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-header">DASHBOARD</li>

                <li class="nav-item">
                    <a href="<?= base_url('dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MASTER DATA</li>

                <li class="nav-item">
                    <a href="<?= base_url('kategori'); ?>"
                        class="nav-link <?= ($this->uri->segment(1) == 'kategori') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Kategori Wisata</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('destinasi'); ?>"
                        class="nav-link <?= ($this->uri->segment(1) == 'destinasi') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>Destinasi Wisata</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('fasilitas'); ?>"
                        class="nav-link <?= ($this->uri->segment(1) == 'fasilitas') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>Fasilitas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('hotel'); ?>"
                        class="nav-link <?= ($this->uri->segment(1) == 'hotel') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>Hotel / Penginapan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('oleh_oleh'); ?>"
                        class="nav-link <?= ($this->uri->segment(1) == 'oleh_oleh') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>Oleh-Oleh</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('pernak_pernik'); ?>"
                        class="nav-link <?= ($this->uri->segment(1) == 'pernak_pernik') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-gift"></i>
                        <p>Pernak-Pernik</p>
                    </a>
                </li>

                <li class="nav-header">KONTEN WEBSITE</li>

                <li class="nav-item">
                    <a href="<?= base_url('tentang'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>Tentang Kami</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('berita'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('galeri'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Galeri</p>
                    </a>
                </li>

                <li class="nav-header">LAYANAN</li>

                <li class="nav-item">
                    <a href="<?= base_url('kontak'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Kontak Masuk</p>
                    </a>
                </li>

                <li class="nav-header">PENGATURAN</li>

                <?php if ($this->session->userdata('level') == 'superadmin') : ?>

                    <li class="nav-item">
                        <a href="<?= base_url('pengguna'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>

                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url('profil'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil Saya</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('password'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>Ganti Password</p>
                    </a>
                </li>

                <a href="javascript:void(0);" onclick="konfirmasiLogout()" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>

            </ul>

        </nav>

    </div>

</aside>