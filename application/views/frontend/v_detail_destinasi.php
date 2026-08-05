<!-- =========================================================
HERO DESTINASI
========================================================= -->

<section class="hero-detail"
    style="background-image:url('<?= !empty($destinasi->destinasi_gambar)
                                        ? base_url('uploads/destinasi/' . $destinasi->destinasi_gambar)
                                        : base_url('assets_frontend/img/no-image.jpg'); ?>');">

    <div class="container">

        <div class="hero-content">

            <nav aria-label="breadcrumb">

                <ol class="breadcrumb breadcrumb-custom">

                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>">
                            <i class="fa fa-home"></i>
                            Beranda
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="<?= base_url('home/destinasi_selengkapnya'); ?>">
                            Destinasi
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        <?= $destinasi->destinasi_nama; ?>
                    </li>

                </ol>

            </nav>

            <div class="hero-category">

                <i class="fa fa-map-marker"></i>

                <?= !empty($destinasi->kategori_nama)
                    ? $destinasi->kategori_nama
                    : 'Destinasi Wisata'; ?>

            </div>

            <h1 class="hero-title">

                <?= $destinasi->destinasi_nama; ?>

            </h1>

            <p class="hero-desc">

                <?= word_limiter(strip_tags($destinasi->destinasi_deskripsi), 35); ?>

            </p>

            <div class="hero-action">

                <a href="#tentang" class="btn btn-primary btn-hero">

                    <i class="fa fa-info-circle"></i>

                    Jelajahi Destinasi

                </a>

                <?php if (!empty($destinasi->maps)): ?>

                    <?php
                    $maps = $destinasi->maps;

                    if (strpos($maps, '<iframe') !== false) {

                        preg_match('/src="([^"]+)"/', $maps, $match);

                        $maps = isset($match[1]) ? $match[1] : '#';
                    }
                    ?>

                    <a href="<?= $maps; ?>"
                        target="_blank"
                        class="btn btn-outline-light btn-hero">

                        <i class="fa fa-map-marker"></i>

                        Google Maps

                    </a>

                <?php endif; ?>

            </div>

        </div>

    </div>

    <a href="#quick-info" class="hero-scroll">

        <span>Scroll</span>

        <i class="fa fa-angle-down"></i>

    </a>

</section>



<!-- =========================================================
QUICK INFO
========================================================= -->

<section class="quick-info" id="quick-info">

    <div class="container">

        <div class="quick-box">

            <div class="row">

                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="quick-item">

                        <i class="fa fa-ticket"></i>

                        <h5>Harga Tiket</h5>

                        <p>

                            <?= !empty($destinasi->harga_tiket)
                                ? $destinasi->harga_tiket
                                : 'Gratis'; ?>

                        </p>

                    </div>

                </div>



                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="quick-item">

                        <i class="fa fa-clock-o"></i>

                        <h5>Jam Operasional</h5>

                        <p>

                            <?= !empty($destinasi->jam_operasional)
                                ? $destinasi->jam_operasional
                                : '-'; ?>

                        </p>

                    </div>

                </div>



                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="quick-item">

                        <i class="fa fa-map-marker"></i>

                        <h5>Lokasi</h5>

                        <p>

                            <?= word_limiter($destinasi->destinasi_alamat, 8); ?>

                        </p>

                    </div>

                </div>



                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="quick-item">

                        <i class="fa fa-building"></i>

                        <h5>Fasilitas</h5>

                        <p>

                            <?= count($fasilitas); ?>

                            Fasilitas

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================================
TENTANG DESTINASI
========================================================= -->

<section class="section-space" id="tentang">

    <div class="container">

        <div class="row align-items-center">

            <!-- FOTO -->

            <div class="col-lg-6 mb-5 mb-lg-0">

                <div class="about-image">

                    <img src="<?= !empty($destinasi->destinasi_gambar)
                                    ? base_url('uploads/destinasi/' . $destinasi->destinasi_gambar)
                                    : base_url('assets_frontend/img/no-image.jpg'); ?>"
                        class="img-fluid rounded-4 shadow-lg w-100"
                        alt="<?= $destinasi->destinasi_nama; ?>">

                </div>

            </div>



            <!-- DESKRIPSI -->

            <div class="col-lg-6">

                <span class="section-badge">

                    <i class="fa fa-map-marker"></i>

                    Tentang Destinasi

                </span>

                <h2 class="section-title mt-3">

                    <?= $destinasi->destinasi_nama; ?>

                </h2>

                <div class="section-line mb-4"></div>

                <div class="destination-description">

                    <?= nl2br($destinasi->destinasi_deskripsi); ?>

                </div>

                <div class="row mt-5">

                    <div class="col-md-6 mb-3">

                        <div class="info-card">

                            <div class="info-icon bg-primary">

                                <i class="fa fa-ticket"></i>

                            </div>

                            <div>

                                <small>Harga Tiket</small>

                                <h6 class="mb-0">

                                    <?= !empty($destinasi->harga_tiket)
                                        ? $destinasi->harga_tiket
                                        : 'Gratis'; ?>

                                </h6>

                            </div>

                        </div>

                    </div>



                    <div class="col-md-6 mb-3">

                        <div class="info-card">

                            <div class="info-icon bg-success">

                                <i class="fa fa-clock-o"></i>

                            </div>

                            <div>

                                <small>Jam Operasional</small>

                                <h6 class="mb-0">

                                    <?= !empty($destinasi->jam_operasional)
                                        ? $destinasi->jam_operasional
                                        : '-'; ?>

                                </h6>

                            </div>

                        </div>

                    </div>



                    <div class="col-md-6 mb-3">

                        <div class="info-card">

                            <div class="info-icon bg-danger">

                                <i class="fa fa-map-marker"></i>

                            </div>

                            <div>

                                <small>Alamat</small>

                                <h6 class="mb-0">

                                    <?= !empty($destinasi->destinasi_alamat)
                                        ? word_limiter($destinasi->destinasi_alamat, 8)
                                        : '-'; ?>

                                </h6>

                            </div>

                        </div>

                    </div>



                    <div class="col-md-6 mb-3">

                        <div class="info-card">

                            <div class="info-icon bg-warning">

                                <i class="fa fa-building"></i>

                            </div>

                            <div>

                                <small>Jumlah Fasilitas</small>

                                <h6 class="mb-0">

                                    <?= count($fasilitas); ?> Fasilitas

                                </h6>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================================
FASILITAS DESTINASI
========================================================= -->

<?php if (!empty($fasilitas)) : ?>

    <section class="section-space bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-badge">

                    <i class="fa fa-building"></i>

                    Fasilitas

                </span>

                <h2 class="section-title mt-3">

                    Fasilitas Destinasi

                </h2>

                <p class="section-subtitle">

                    Berbagai fasilitas yang tersedia untuk menunjang kenyamanan pengunjung selama berwisata.

                </p>

            </div>



            <div class="row">

                <?php foreach ($fasilitas as $f) : ?>

                    <div class="col-xl-4 col-lg-4 col-md-6 mb-4">

                        <div class="card facility-card h-100 border-0 shadow-sm">

                            <div class="facility-image">

                                <img src="<?= !empty($f->foto)
                                                ? base_url('uploads/fasilitas/' . $f->foto)
                                                : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                    class="card-img-top"
                                    alt="<?= $f->nama_fasilitas; ?>">

                            </div>

                            <div class="card-body">

                                <h5 class="facility-title">

                                    <i class="fa fa-check-circle text-success mr-2"></i>

                                    <?= $f->nama_fasilitas; ?>

                                </h5>

                                <p class="facility-desc">

                                    <?= !empty($f->deskripsi)
                                        ? word_limiter(strip_tags($f->deskripsi), 20)
                                        : 'Fasilitas tersedia untuk menunjang kenyamanan pengunjung.'; ?>

                                </p>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<!-- =========================================================
LOKASI DESTINASI
========================================================= -->

<?php if (!empty($destinasi->maps)) : ?>

    <?php
    $link_maps = $destinasi->maps;

    if (strpos($destinasi->maps, '<iframe') !== false) {

        preg_match('/src="([^"]+)"/', $destinasi->maps, $match);

        $link_maps = isset($match[1]) ? $match[1] : '#';
    }
    ?>

    <section class="section-space">

        <div class="container">

            <div class="row align-items-center">

                <!-- INFORMASI -->

                <div class="col-lg-5 mb-4 mb-lg-0">

                    <span class="section-badge">

                        <i class="fa fa-map-marker"></i>

                        Lokasi

                    </span>

                    <h2 class="section-title mt-3">

                        Lokasi Destinasi

                    </h2>

                    <p class="section-subtitle">

                        Temukan lokasi wisata dengan mudah melalui Google Maps.

                    </p>

                    <div class="location-card">

                        <div class="location-item">

                            <i class="fa fa-map-marker text-danger"></i>

                            <div>

                                <strong>Alamat</strong>

                                <p class="mb-0">

                                    <?= !empty($destinasi->destinasi_alamat)
                                        ? $destinasi->destinasi_alamat
                                        : '-'; ?>

                                </p>

                            </div>

                        </div>

                        <a href="<?= $link_maps; ?>"
                            target="_blank"
                            class="btn btn-success btn-lg btn-block mt-4">

                            <i class="fa fa-map-marker"></i>

                            Buka Google Maps

                        </a>

                    </div>

                </div>



                <!-- GOOGLE MAPS -->

                <div class="col-lg-7">

                    <div class="map-card shadow">

                        <?php if (strpos($destinasi->maps, '<iframe') !== false) : ?>

                            <?= $destinasi->maps; ?>

                        <?php else : ?>

                            <iframe
                                src="<?= $link_maps; ?>"
                                width="100%"
                                height="450"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy">
                            </iframe>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

<?php endif; ?>

<!-- =========================================================
HOTEL SEKITAR DESTINASI
========================================================= -->

<?php if (!empty($hotel)) : ?>

    <section class="section-space bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-badge">

                    <i class="fa fa-bed"></i>

                    Penginapan

                </span>

                <h2 class="section-title mt-3">

                    Hotel & Penginapan

                </h2>

                <p class="section-subtitle">

                    Pilihan hotel dan penginapan yang berada di sekitar destinasi wisata.

                </p>

            </div>

            <div class="row">

                <?php foreach ($hotel as $h) : ?>

                    <div class="col-lg-12 mb-4">

                        <div class="card hotel-card border-0 shadow-sm">

                            <div class="row g-0 align-items-center">

                                <!-- FOTO -->

                                <div class="col-lg-4">

                                    <div class="hotel-image">

                                        <img src="<?= !empty($h->gambar)
                                                        ? base_url('uploads/hotel/' . $h->gambar)
                                                        : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                            class="img-fluid"
                                            alt="<?= $h->nama_hotel; ?>">

                                    </div>

                                </div>

                                <!-- INFORMASI -->

                                <div class="col-lg-8">

                                    <div class="card-body p-4">

                                        <h3 class="hotel-title">

                                            <?= $h->nama_hotel; ?>

                                        </h3>

                                        <div class="hotel-rating mb-3">

                                            <i class="fa fa-star text-warning"></i>

                                            <strong>

                                                <?= !empty($h->rating)
                                                    ? $h->rating
                                                    : '-'; ?>

                                            </strong>

                                        </div>

                                        <p class="hotel-address">

                                            <i class="fa fa-map-marker text-danger"></i>

                                            <?= $h->alamat; ?>

                                        </p>

                                        <p class="hotel-price">

                                            <i class="fa fa-money text-success"></i>

                                            Mulai

                                            <strong>

                                                <?= !empty($h->harga_mulai)
                                                    ? $h->harga_mulai
                                                    : '-'; ?>

                                            </strong>

                                        </p>

                                        <?php if (!empty($h->deskripsi)) : ?>

                                            <p class="hotel-desc">

                                                <?= word_limiter(strip_tags($h->deskripsi), 28); ?>

                                            </p>

                                        <?php endif; ?>

                                        <div class="mt-4">

                                            <a href="<?= base_url('hotel/detail/' . $h->hotel_id); ?>"
                                                class="btn btn-primary">

                                                <i class="fa fa-eye"></i>

                                                Detail Hotel

                                            </a>

                                            <?php if (!empty($h->maps)) : ?>

                                                <a href="<?= $h->maps; ?>"
                                                    target="_blank"
                                                    class="btn btn-success ml-2">

                                                    <i class="fa fa-map-marker"></i>

                                                    Google Maps

                                                </a>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<!-- =========================================================
KULINER SEKITAR DESTINASI
========================================================= -->

<?php if (!empty($kuliner)) : ?>

    <section class="section-space">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-badge">

                    <i class="fa fa-cutlery"></i>

                    Kuliner

                </span>

                <h2 class="section-title mt-3">

                    Kuliner Sekitar Destinasi

                </h2>

                <p class="section-subtitle">

                    Jangan lewatkan berbagai pilihan kuliner khas yang berada di sekitar destinasi wisata.

                </p>

            </div>

            <div class="row">

                <?php foreach ($kuliner as $k) : ?>

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card modern-card h-100 border-0 shadow-sm">

                            <div class="modern-card-image">

                                <img src="<?= !empty($k->foto)
                                                ? base_url('uploads/kuliner/' . $k->foto)
                                                : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                    class="card-img-top"
                                    alt="<?= $k->nama_kuliner; ?>">

                            </div>

                            <div class="card-body">

                                <h5 class="modern-card-title">

                                    <?= $k->nama_kuliner; ?>

                                </h5>

                                <p class="text-success font-weight-bold mb-2">

                                    <i class="fa fa-money"></i>

                                    <?= !empty($k->harga) ? $k->harga : '-'; ?>

                                </p>

                                <p class="text-muted">

                                    <i class="fa fa-map-marker text-danger"></i>

                                    <?= word_limiter($k->alamat, 10); ?>

                                </p>

                                <?php if (!empty($k->deskripsi)) : ?>

                                    <p class="modern-card-desc">

                                        <?= word_limiter(strip_tags($k->deskripsi), 18); ?>

                                    </p>

                                <?php endif; ?>

                            </div>

                            <div class="card-footer bg-white border-0">

                                <?php if (!empty($k->maps)) : ?>

                                    <a href="<?= $k->maps; ?>"
                                        target="_blank"
                                        class="btn btn-success btn-block">

                                        <i class="fa fa-map-marker"></i>

                                        Lihat Lokasi

                                    </a>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<!-- =========================================================
OLEH-OLEH KHAS DESTINASI
========================================================= -->

<?php if (!empty($oleh_oleh)) : ?>

    <section class="section-space bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-badge">

                    <i class="fa fa-shopping-bag"></i>

                    Oleh-Oleh

                </span>

                <h2 class="section-title mt-3">

                    Oleh-Oleh Khas Destinasi

                </h2>

                <p class="section-subtitle">

                    Temukan berbagai oleh-oleh khas yang dapat Anda bawa pulang sebagai kenang-kenangan.

                </p>

            </div>

            <div class="row">

                <?php foreach ($oleh_oleh as $o) : ?>

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card modern-card h-100 border-0 shadow-sm">

                            <div class="modern-card-image">

                                <img src="<?= !empty($o->foto)
                                                ? base_url('uploads/oleh_oleh/' . $o->foto)
                                                : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                    class="card-img-top"
                                    alt="<?= $o->nama_produk; ?>">

                            </div>

                            <div class="card-body">

                                <h5 class="modern-card-title">

                                    <?= $o->nama_produk; ?>

                                </h5>

                                <?php if (!empty($o->nama_toko)) : ?>

                                    <p class="mb-2 text-primary">

                                        <i class="fa fa-store"></i>

                                        <?= $o->nama_toko; ?>

                                    </p>

                                <?php endif; ?>

                                <p class="text-success font-weight-bold mb-2">

                                    <i class="fa fa-money"></i>

                                    <?= !empty($o->harga) ? $o->harga : '-'; ?>

                                </p>

                                <p class="text-muted">

                                    <i class="fa fa-map-marker text-danger"></i>

                                    <?= word_limiter($o->alamat, 10); ?>

                                </p>

                                <?php if (!empty($o->deskripsi)) : ?>

                                    <p class="modern-card-desc">

                                        <?= word_limiter(strip_tags($o->deskripsi), 18); ?>

                                    </p>

                                <?php endif; ?>

                            </div>

                            <div class="card-footer bg-white border-0">

                                <?php if (!empty($o->maps)) : ?>

                                    <a href="<?= $o->maps; ?>"
                                        target="_blank"
                                        class="btn btn-success btn-block">

                                        <i class="fa fa-map-marker"></i>

                                        Lihat Lokasi

                                    </a>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<!-- =========================================================
PERNAK-PERNIK / SOUVENIR
========================================================= -->

<?php if (!empty($pernak_pernik)) : ?>

    <section class="section-space">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-badge">

                    <i class="fa fa-gift"></i>

                    Souvenir

                </span>

                <h2 class="section-title mt-3">

                    Pernak-Pernik & Souvenir

                </h2>

                <p class="section-subtitle">

                    Lengkapi perjalanan Anda dengan berbagai souvenir unik dan menarik khas destinasi wisata.

                </p>

            </div>

            <div class="row">

                <?php foreach ($pernak_pernik as $p) : ?>

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card modern-card h-100 border-0 shadow-sm">

                            <div class="modern-card-image">

                                <img src="<?= !empty($p->foto)
                                                ? base_url('uploads/pernak_pernik/' . $p->foto)
                                                : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                    class="card-img-top"
                                    alt="<?= $p->nama_produk; ?>">

                            </div>

                            <div class="card-body">

                                <h5 class="modern-card-title">

                                    <?= $p->nama_produk; ?>

                                </h5>

                                <?php if (!empty($p->nama_toko)) : ?>

                                    <p class="mb-2 text-primary">

                                        <i class="fa fa-store"></i>

                                        <?= $p->nama_toko; ?>

                                    </p>

                                <?php endif; ?>

                                <p class="text-success font-weight-bold mb-2">

                                    <i class="fa fa-money"></i>

                                    <?= !empty($p->harga) ? $p->harga : '-'; ?>

                                </p>

                                <p class="text-muted">

                                    <i class="fa fa-map-marker text-danger"></i>

                                    <?= word_limiter($p->alamat, 10); ?>

                                </p>

                                <?php if (!empty($p->deskripsi)) : ?>

                                    <p class="modern-card-desc">

                                        <?= word_limiter(strip_tags($p->deskripsi), 18); ?>

                                    </p>

                                <?php endif; ?>

                            </div>

                            <div class="card-footer bg-white border-0">

                                <?php if (!empty($p->maps)) : ?>

                                    <a href="<?= $p->maps; ?>"
                                        target="_blank"
                                        class="btn btn-success btn-block">

                                        <i class="fa fa-map-marker"></i>

                                        Lihat Lokasi

                                    </a>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<!-- =========================================================
DESTINASI LAINNYA
========================================================= -->

<?php if (!empty($destinasi_lainnya)) : ?>

    <section class="section-space bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-badge">

                    <i class="fa fa-map"></i>

                    Rekomendasi

                </span>

                <h2 class="section-title mt-3">

                    Destinasi Lainnya

                </h2>

                <p class="section-subtitle">

                    Jelajahi destinasi wisata menarik lainnya yang mungkin Anda sukai.

                </p>

            </div>

            <div class="row">

                <?php foreach ($destinasi_lainnya as $d) : ?>

                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="card modern-card h-100 border-0 shadow-sm">

                            <div class="modern-card-image">

                                <img src="<?= !empty($d->destinasi_gambar)
                                                ? base_url('uploads/destinasi/' . $d->destinasi_gambar)
                                                : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                    class="card-img-top"
                                    alt="<?= $d->destinasi_nama; ?>">

                            </div>

                            <div class="card-body d-flex flex-column">

                                <h5 class="modern-card-title">

                                    <?= $d->destinasi_nama; ?>

                                </h5>

                                <p class="text-muted mb-3">

                                    <i class="fa fa-map-marker text-danger"></i>

                                    <?= word_limiter($d->destinasi_alamat, 8); ?>

                                </p>

                                <p class="modern-card-desc">

                                    <?= word_limiter(strip_tags($d->destinasi_deskripsi), 15); ?>

                                </p>

                                <div class="mt-auto">

                                    <a href="<?= base_url('home/detail_destinasi/' . $d->destinasi_id); ?>"
                                        class="btn btn-primary btn-block">

                                        <i class="fa fa-eye"></i>

                                        Lihat Detail

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<!-- =========================================================
CALL TO ACTION
========================================================= -->

<section class="section-space">

    <div class="container">

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="card-body text-center py-5 px-4">

                <span class="badge badge-primary px-3 py-2 mb-3">

                    <i class="fa fa-compass"></i>

                    Jelajahi Lebih Banyak

                </span>

                <h2 class="mb-3">

                    Masih Banyak Destinasi Menarik Menanti Anda

                </h2>

                <p class="text-muted mx-auto mb-4" style="max-width:700px;">

                    Temukan berbagai destinasi wisata lainnya, lengkap dengan informasi fasilitas, hotel, kuliner, oleh-oleh, dan souvenir untuk melengkapi perjalanan wisata Anda.

                </p>

                <div class="d-flex justify-content-center flex-wrap">

                    <a href="<?= base_url('home/destinasi_selengkapnya'); ?>"
                        class="btn btn-primary btn-lg mr-2 mb-2">

                        <i class="fa fa-map"></i>

                        Semua Destinasi

                    </a>

                    <a href="<?= base_url(); ?>"
                        class="btn btn-outline-primary btn-lg mb-2">

                        <i class="fa fa-home"></i>

                        Kembali ke Beranda

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================================
END DETAIL DESTINASI
========================================================= -->

<a href="#"
    id="backToTop"
    class="back-to-top">

    <i class="fa fa-chevron-up"></i>

</a>