<!-- HERO GALERI -->
<section class="intro intro-single route bg-image"
    style="background-image:url('<?= !empty($galeri->foto) ? base_url('uploads/galeri/' . $galeri->foto) : base_url('assets_frontend/img/no-image.jpg'); ?>')">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <h2 class="intro-title mb-4 text-white">
                    <?= htmlspecialchars($galeri->destinasi_nama ?? ''); ?>
                </h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('galeri/semua'); ?>">Galeri</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?= htmlspecialchars($galeri->judul_foto ?? ''); ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- DETAIL GALERI -->
<section class="sect-pt4">
    <div class="container">
        <div class="row">

            <!-- KONTEN -->
            <div class="col-lg-8">

                <div class="box-shadow-full">

                    <a href="<?= base_url('uploads/galeri/' . $galeri->foto); ?>" data-lightbox="galeri">

                        <img src="<?= base_url('uploads/galeri/' . $galeri->foto); ?>"
                            class="img-fluid rounded mb-4 w-100">

                    </a>

                    <h3 class="title-left mb-4">
                        <?= htmlspecialchars($galeri->judul_foto ?? ''); ?>
                    </h3>

                    <p>
                        Dokumentasi foto wisata
                        <strong><?= htmlspecialchars($galeri->destinasi_nama ?? ''); ?></strong>
                        yang menampilkan keindahan alam, suasana, dan berbagai sudut menarik dari destinasi wisata Kabupaten Magelang.
                    </p>

                </div>


                <div class="box-shadow-full mt-4">

                    <h3 class="title-left mb-4">
                        Koleksi Foto <?= htmlspecialchars($galeri->destinasi_nama ?? ''); ?>
                    </h3>

                    <div class="row">

                        <?php if (!empty($album)): ?>

                            <?php foreach ($album as $foto): ?>

                                <div class="col-md-4 mb-4">

                                    <a href="<?= base_url('uploads/galeri/' . $foto->foto); ?>"
                                        data-lightbox="galeri"
                                        data-title="<?= htmlspecialchars($foto->judul_foto ?? ''); ?>">

                                        <img src="<?= base_url('uploads/galeri/' . $foto->foto); ?>"
                                            class="img-fluid rounded"
                                            style="height:180px;width:100%;object-fit:cover;">

                                    </a>

                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <div class="col-md-12">
                                <p class="text-muted">
                                    Belum ada koleksi foto lainnya.
                                </p>
                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>


            <!-- SIDEBAR -->
            <div class="col-lg-4">

                <div class="widget-sidebar">

                    <h5 class="sidebar-title">
                        Informasi Galeri
                    </h5>

                    <div class="sidebar-content">

                        <ul class="list-ico">

                            <li>
                                <span class="fa fa-camera"></span>
                                <?= htmlspecialchars($galeri->judul_foto ?? ''); ?>
                            </li>

                            <li>
                                <span class="fa fa-map-marker"></span>
                                <?= htmlspecialchars($galeri->destinasi_nama ?? ''); ?>
                            </li>

                            <li>
                                <span class="fa fa-tag"></span>
                                <?= htmlspecialchars($galeri->kategori_nama ?? ''); ?>
                            </li>

                        </ul>

                    </div>

                </div>


                <div class="widget-sidebar">

                    <h5 class="sidebar-title">
                        Tentang Galeri
                    </h5>

                    <div class="sidebar-content">

                        <p>
                            Galeri ini berisi kumpulan dokumentasi wisata
                            <strong><?= htmlspecialchars($galeri->destinasi_nama ?? ''); ?></strong>
                            yang memperlihatkan berbagai keindahan dan pengalaman wisata.
                        </p>

                        <a href="<?= base_url('home/detail_destinasi/' . $galeri->destinasi_id); ?>"
                            class="btn btn-primary btn-block">

                            <i class="fa fa-map-marker"></i>
                            Lihat Detail Destinasi

                        </a>

                    </div>

                </div>


                <?php if (!empty($related)): ?>

                    <div class="widget-sidebar">

                        <h5 class="sidebar-title">
                            Galeri Destinasi Lain
                        </h5>

                        <div class="sidebar-content">

                            <ul class="list-sidebar">

                                <?php foreach ($related as $r): ?>

                                    <li>
                                        <a href="<?= base_url('galeri/detail/' . $r->galeri_id); ?>">
                                            <?= htmlspecialchars($r->destinasi_nama ?? ''); ?>
                                        </a>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    </div>

                <?php endif; ?>


                <div class="widget-sidebar text-center">

                    <a href="<?= base_url('galeri/semua'); ?>"
                        class="btn btn-primary btn-lg btn-block mb-3">

                        <i class="fa fa-images"></i>
                        Semua Galeri

                    </a>

                    <a href="<?= base_url(); ?>"
                        class="btn btn-outline-secondary btn-lg btn-block">

                        <i class="fa fa-home"></i>
                        Kembali Beranda

                    </a>

                </div>

            </div>

        </div>
    </div>
</section>