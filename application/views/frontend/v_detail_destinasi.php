<div class="intro intro-single route bg-image"
    style="background-image: url('<?= !empty($destinasi->destinasi_gambar) ? base_url('uploads/destinasi/' . $destinasi->destinasi_gambar) : base_url('assets_frontend/img/post-3.jpg'); ?>')">

    <div class="overlay-mf"></div>

    <div class="intro-content display-table">

        <div class="table-cell">

            <div class="container">

                <h2 class="intro-title mb-4 text-white">
                    <?= $destinasi->destinasi_nama; ?>
                </h2>

                <ol class="breadcrumb d-flex justify-content-center">

                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="<?= base_url('wisata'); ?>">
                            Destinasi
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        <?= $destinasi->destinasi_nama; ?>
                    </li>

                </ol>

            </div>

        </div>

    </div>

</div>

<section class="blog-wrapper sect-pt4">

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <div class="post-box">

                    <div class="post-thumb">

                        <img src="<?= !empty($destinasi->destinasi_gambar)
                                        ? base_url('uploads/destinasi/' . $destinasi->destinasi_gambar)
                                        : base_url('assets_frontend/img/no-image.jpg'); ?>"
                            class="img-fluid w-100">

                    </div>

                    <div class="post-meta mt-4">

                        <h1 class="article-title">
                            <?= $destinasi->destinasi_nama; ?>
                        </h1>

                        <ul>
                            <li>
                                <span class="fa fa-tag"></span>
                                <?= $destinasi->kategori_nama; ?>
                            </li>
                        </ul>

                    </div>

                    <div class="article-content">

                        <div class="row mb-4">

                            <div class="col-md-6">

                                <div class="card p-3">

                                    <strong>Alamat</strong>

                                    <hr>

                                    <?= $destinasi->destinasi_alamat; ?>

                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="card p-3 text-center">

                                    <strong>Tiket</strong>

                                    <hr>

                                    <?= $destinasi->harga_tiket; ?>

                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="card p-3 text-center">

                                    <strong>Jam Buka</strong>

                                    <hr>

                                    <?= $destinasi->jam_operasional; ?>

                                </div>

                            </div>

                        </div>

                        <h4>Deskripsi Destinasi</h4>

                        <hr>

                        <?= $destinasi->destinasi_deskripsi; ?>

                    </div>

                </div>

                <?php if (!empty($destinasi->maps)) : ?>

                    <?php
                    $link_maps = $destinasi->maps;

                    if (strpos($destinasi->maps, '<iframe') !== false) {
                        preg_match('/src="([^"]+)"/', $destinasi->maps, $match);
                        $link_maps = isset($match[1]) ? $match[1] : '#';
                    }
                    ?>

                    <div class="widget-sidebar mt-4">

                        <h5 class="sidebar-title">
                            Lokasi Destinasi
                        </h5>

                        <div class="sidebar-content text-center">

                            <p>
                                Klik tombol di bawah untuk melihat lokasi destinasi di Google Maps.
                            </p>

                            <a href="<?= $link_maps; ?>"
                                target="_blank"
                                class="btn btn-success btn-lg">

                                <i class="fa fa-map-marker"></i>
                                Buka Google Maps

                            </a>

                        </div>

                    </div>

                <?php endif; ?>

            </div>

            <div class="col-md-4">

                <?php if (!empty($related)) : ?>

                    <div class="widget-sidebar">

                        <h5 class="sidebar-title">
                            Destinasi Terkait
                        </h5>

                        <div class="sidebar-content">

                            <ul class="list-sidebar">

                                <?php foreach ($related as $r) : ?>

                                    <li>

                                        <a href="<?= base_url('destinasi/detail/' . $r->destinasi_id); ?>">

                                            <?= $r->destinasi_nama; ?>

                                        </a>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    </div>

                <?php endif; ?>

                <div class="widget-sidebar mt-4">

                    <h5 class="sidebar-title">
                        Navigasi
                    </h5>

                    <div class="sidebar-content">

                        <a href="<?= base_url('wisata'); ?>"
                            class="btn btn-primary btn-block mb-2">

                            Semua Destinasi

                        </a>

                        <a href="<?= base_url(); ?>"
                            class="btn btn-secondary btn-block">

                            Kembali ke Beranda

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>