<!-- =========================
HERO DESTINASI
========================= -->

<section class="intro intro-single route bg-image"
    style="background-image:url('<?= !empty($destinasi->destinasi_gambar) ? base_url('uploads/destinasi/' . $destinasi->destinasi_gambar) : base_url('assets_frontend/img/no-image.jpg'); ?>')">

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
                        <a href="<?= base_url('home/destinasi_selengkapnya'); ?>">
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

</section>



<!-- =========================
CONTENT DETAIL
========================= -->

<section class="sect-pt4">

    <div class="container">

        <div class="row">


            <!-- CONTENT UTAMA -->

            <div class="col-lg-8">



                <!-- FOTO + DESKRIPSI -->

                <div class="box-shadow-full">


                    <img src="<?= !empty($destinasi->destinasi_gambar)
                                    ? base_url('uploads/destinasi/' . $destinasi->destinasi_gambar)
                                    : base_url('assets_frontend/img/no-image.jpg'); ?>"
                        class="img-fluid rounded mb-4 w-100"
                        alt="<?= $destinasi->destinasi_nama; ?>">



                    <h3 class="title-left mb-4">
                        Tentang <?= $destinasi->destinasi_nama; ?>
                    </h3>



                    <p>
                        <?= $destinasi->destinasi_deskripsi; ?>
                    </p>


                </div>





                <!-- INFORMASI DESTINASI -->

                <div class="box-shadow-full mt-4">


                    <h3 class="title-left mb-4">
                        Informasi Destinasi
                    </h3>



                    <div class="row">



                        <div class="col-md-6 mb-3">

                            <div class="card p-3 h-100">


                                <h6>
                                    <i class="fa fa-map-marker text-danger"></i>
                                    Alamat
                                </h6>


                                <hr>


                                <p>
                                    <?= !empty($destinasi->destinasi_alamat)
                                        ? $destinasi->destinasi_alamat
                                        : '-'; ?>
                                </p>


                            </div>

                        </div>





                        <div class="col-md-3 mb-3">

                            <div class="card p-3 text-center h-100">


                                <h6>
                                    <i class="fa fa-ticket text-success"></i>
                                    Tiket
                                </h6>


                                <hr>


                                <strong>
                                    <?= !empty($destinasi->harga_tiket)
                                        ? $destinasi->harga_tiket
                                        : 'Gratis'; ?>
                                </strong>


                            </div>

                        </div>





                        <div class="col-md-3 mb-3">

                            <div class="card p-3 text-center h-100">


                                <h6>
                                    <i class="fa fa-clock-o text-primary"></i>
                                    Jam
                                </h6>


                                <hr>


                                <strong>
                                    <?= !empty($destinasi->jam_operasional)
                                        ? $destinasi->jam_operasional
                                        : '-'; ?>
                                </strong>


                            </div>

                        </div>


                    </div>


                </div>

                <!-- =========================
FASILITAS DESTINASI
========================= -->

                <?php if (!empty($destinasi->fasilitas)): ?>
                    <div class="box-shadow-full mt-4">
                        <h3 class="title-left mb-4">Fasilitas Destinasi</h3>
                        <div class="row">
                            <?php
                            $fasilitas = explode(',', $destinasi->fasilitas);
                            foreach ($fasilitas as $f):
                            ?>
                                <div class="col-md-6 mb-3">
                                    <div class="card p-3 h-100">
                                        <i class="fa fa-check text-success mr-2"></i>
                                        <?= trim($f); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>


                <!-- =========================
GOOGLE MAPS DESTINASI
========================= -->

                <?php if (!empty($destinasi->maps)): ?>

                    <?php
                    $link_maps = $destinasi->maps;
                    if (strpos($destinasi->maps, '<iframe') !== false) {
                        preg_match('/src="([^"]+)"/', $destinasi->maps, $match);
                        $link_maps = isset($match[1]) ? $match[1] : '#';
                    }
                    ?>

                    <div class="box-shadow-full mt-4">
                        <h3 class="title-left mb-4">Lokasi Destinasi</h3>
                        <p>Klik tombol berikut untuk melihat lokasi <?= $destinasi->destinasi_nama; ?> melalui Google Maps.</p>

                        <a href="<?= $link_maps; ?>" target="_blank" class="btn btn-success">
                            <i class="fa fa-map-marker"></i> Buka Google Maps
                        </a>

                    </div>

                <?php endif; ?>


                <!-- =========================
HOTEL DESTINASI
========================= -->

                <?php if (!empty($hotel)): ?>

                    <div class="box-shadow-full mt-4">

                        <h3 class="title-left mb-4">
                            Hotel / Penginapan Sekitar Destinasi
                        </h3>

                        <?php foreach ($hotel as $h): ?>

                            <div class="card shadow-sm mb-3">

                                <div class="row no-gutters align-items-center">

                                    <div class="col-md-4">
                                        <img src="<?= !empty($h->gambar)
                                                        ? base_url('uploads/hotel/' . $h->gambar)
                                                        : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                            class="img-fluid rounded-left"
                                            style="height:180px;width:100%;object-fit:cover;">
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">

                                            <h5><?= $h->nama_hotel; ?></h5>

                                            <p class="mb-2">
                                                <i class="fa fa-star text-warning"></i>
                                                <?= !empty($h->rating) ? $h->rating : '-'; ?>
                                            </p>

                                            <p class="mb-2">
                                                <i class="fa fa-money text-success"></i>
                                                <?= !empty($h->harga_mulai) ? $h->harga_mulai : '-'; ?>
                                            </p>

                                            <p class="mb-2">
                                                <i class="fa fa-map-marker text-danger"></i>
                                                <?= word_limiter($h->alamat, 10); ?>
                                            </p>

                                            <a href="<?= base_url('hotel/detail/' . $h->hotel_id); ?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i> Lihat Detail
                                            </a>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>



                <!-- =========================
OLEH-OLEH DESTINASI
========================= -->

                <?php if (!empty($oleh_oleh)): ?>

                    <div class="box-shadow-full mt-4">

                        <h3 class="title-left mb-4">
                            Oleh-Oleh Khas Sekitar Destinasi
                        </h3>

                        <?php foreach ($oleh_oleh as $o): ?>

                            <div class="card shadow-sm mb-3">

                                <div class="row no-gutters align-items-center">

                                    <div class="col-md-4">

                                        <img src="<?= !empty($o->foto)
                                                        ? base_url('uploads/oleh_oleh/' . $o->foto)
                                                        : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                            class="img-fluid rounded-left"
                                            style="height:180px;width:100%;object-fit:cover;">

                                    </div>


                                    <div class="col-md-8">

                                        <div class="card-body">

                                            <h5>
                                                <?= $o->nama_produk; ?>
                                            </h5>


                                            <?php if (!empty($o->nama_toko)): ?>

                                                <p class="mb-2">
                                                    <i class="fa fa-shopping-bag text-primary"></i>
                                                    <?= $o->nama_toko; ?>
                                                </p>

                                            <?php endif; ?>


                                            <p class="mb-2">
                                                <i class="fa fa-money text-success"></i>
                                                <?= !empty($o->harga) ? $o->harga : '-'; ?>
                                            </p>


                                            <p class="mb-2">
                                                <i class="fa fa-map-marker text-danger"></i>
                                                <?= word_limiter($o->alamat, 10); ?>
                                            </p>



                                            <?php if (!empty($o->maps)): ?>

                                                <a href="<?= $o->maps; ?>"
                                                    target="_blank"
                                                    class="btn btn-success btn-sm">

                                                    <i class="fa fa-map-marker"></i>
                                                    Lokasi

                                                </a>

                                            <?php endif; ?>


                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>





                <!-- =========================
PERNAK-PERNIK DESTINASI
========================= -->

                <?php if (!empty($pernak_pernik)): ?>

                    <div class="box-shadow-full mt-4">

                        <h3 class="title-left mb-4">
                            Pernak-Pernik & Souvenir
                        </h3>


                        <?php foreach ($pernak_pernik as $p): ?>


                            <div class="card shadow-sm mb-3">


                                <div class="row no-gutters align-items-center">


                                    <div class="col-md-4">

                                        <img src="<?= !empty($p->foto)
                                                        ? base_url('uploads/pernak_pernik/' . $p->foto)
                                                        : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                            class="img-fluid rounded-left"
                                            style="height:180px;width:100%;object-fit:cover;">

                                    </div>



                                    <div class="col-md-8">

                                        <div class="card-body">


                                            <h5>
                                                <?= $p->nama_produk; ?>
                                            </h5>



                                            <?php if (!empty($p->nama_toko)): ?>

                                                <p class="mb-2">
                                                    <i class="fa fa-shopping-bag text-primary"></i>
                                                    <?= $p->nama_toko; ?>
                                                </p>

                                            <?php endif; ?>



                                            <p class="mb-2">
                                                <i class="fa fa-money text-success"></i>
                                                <?= !empty($p->harga) ? $p->harga : '-'; ?>
                                            </p>



                                            <p class="mb-2">
                                                <i class="fa fa-map-marker text-danger"></i>
                                                <?= word_limiter($p->alamat, 10); ?>
                                            </p>




                                            <?php if (!empty($p->maps)): ?>

                                                <a href="<?= $p->maps; ?>"
                                                    target="_blank"
                                                    class="btn btn-success btn-sm">

                                                    <i class="fa fa-map-marker"></i>
                                                    Lokasi

                                                </a>

                                            <?php endif; ?>


                                        </div>

                                    </div>


                                </div>

                            </div>


                        <?php endforeach; ?>


                    </div>


                <?php endif; ?>

                <!-- =========================
REKOMENDASI HOTEL TERDEKAT
========================= -->

                <?php if (!empty($hotel_terdekat)): ?>

                    <div class="box-shadow-full mt-4">

                        <h3 class="title-left mb-4">
                            Rekomendasi Hotel Lainnya
                        </h3>

                        <?php foreach ($hotel_terdekat as $ht): ?>

                            <div class="card shadow-sm mb-3">

                                <div class="row no-gutters align-items-center">

                                    <div class="col-md-4">

                                        <img src="<?= !empty($ht->gambar)
                                                        ? base_url('uploads/hotel/' . $ht->gambar)
                                                        : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                            class="img-fluid rounded-left"
                                            style="height:180px;width:100%;object-fit:cover;">

                                    </div>


                                    <div class="col-md-8">

                                        <div class="card-body">

                                            <h5>
                                                <?= $ht->nama_hotel; ?>
                                            </h5>


                                            <p class="mb-2">
                                                <i class="fa fa-star text-warning"></i>
                                                <?= !empty($ht->rating) ? $ht->rating : '-'; ?>
                                            </p>


                                            <p class="mb-2">
                                                <i class="fa fa-road text-info"></i>
                                                <?= isset($ht->jarak) ? number_format($ht->jarak, 2) : '0'; ?> KM
                                            </p>


                                            <p class="mb-2">
                                                <i class="fa fa-money text-success"></i>
                                                <?= !empty($ht->harga_mulai) ? $ht->harga_mulai : '-'; ?>
                                            </p>


                                            <p class="mb-2">
                                                <i class="fa fa-map-marker text-danger"></i>
                                                <?= word_limiter($ht->alamat, 10); ?>
                                            </p>


                                            <div class="mt-3">

                                                <a href="<?= base_url('hotel/detail/' . $ht->hotel_id); ?>" class="btn btn-primary btn-sm mr-2">
                                                    <i class="fa fa-eye"></i> Detail
                                                </a>


                                                <?php if (!empty($ht->maps)): ?>

                                                    <a href="<?= $ht->maps; ?>" target="_blank" class="btn btn-success btn-sm">
                                                        <i class="fa fa-map-marker"></i> Lokasi
                                                    </a>

                                                <?php endif; ?>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>

                <!-- =========================
REKOMENDASI OLEH-OLEH LAINNYA
========================= -->

                <?php if (!empty($oleh_terdekat)): ?>

                    <div class="box-shadow-full mt-4">

                        <h3 class="title-left mb-4">
                            Oleh-Oleh Lainnya
                        </h3>

                        <?php foreach ($oleh_terdekat as $ot): ?>

                            <div class="card shadow-sm mb-3">

                                <div class="row no-gutters align-items-center">

                                    <div class="col-md-4">

                                        <img src="<?= !empty($ot->foto)
                                                        ? base_url('uploads/oleh_oleh/' . $ot->foto)
                                                        : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                            class="img-fluid rounded-left"
                                            style="height:170px;width:100%;object-fit:cover;">

                                    </div>


                                    <div class="col-md-8">

                                        <div class="card-body">

                                            <h5 class="mb-3">
                                                <?= $ot->nama_produk; ?>
                                            </h5>


                                            <p class="mb-2">
                                                <i class="fa fa-shopping-bag text-primary"></i>
                                                <?= !empty($ot->nama_toko) ? $ot->nama_toko : '-'; ?>
                                            </p>


                                            <p class="mb-2">
                                                <i class="fa fa-road text-info"></i>
                                                <?= number_format($ot->jarak, 2); ?> KM
                                            </p>


                                            <p class="mb-3">
                                                <i class="fa fa-map-marker text-danger"></i>
                                                <?= word_limiter($ot->alamat, 10); ?>
                                            </p>


                                            <?php if (!empty($ot->maps)): ?>

                                                <a href="<?= $ot->maps; ?>"
                                                    target="_blank"
                                                    class="btn btn-success btn-sm">

                                                    <i class="fa fa-map-marker"></i>
                                                    Lihat Lokasi

                                                </a>

                                            <?php endif; ?>


                                        </div>

                                    </div>


                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>





                <!-- =========================
REKOMENDASI PERNAK-PERNIK LAINNYA
========================= -->

                <?php if (!empty($pernak_terdekat)): ?>

                    <div class="box-shadow-full mt-4">


                        <h3 class="title-left mb-4">
                            Pernak-Pernik Lainnya
                        </h3>



                        <?php foreach ($pernak_terdekat as $pt): ?>


                            <div class="card shadow-sm mb-3">


                                <div class="row no-gutters align-items-center">


                                    <div class="col-md-4">


                                        <img src="<?= !empty($pt->foto)
                                                        ? base_url('uploads/pernak_pernik/' . $pt->foto)
                                                        : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                            class="img-fluid rounded-left"
                                            style="height:170px;width:100%;object-fit:cover;">


                                    </div>



                                    <div class="col-md-8">


                                        <div class="card-body">


                                            <h5 class="mb-3">
                                                <?= $pt->nama_produk; ?>
                                            </h5>



                                            <p class="mb-2">
                                                <i class="fa fa-shopping-bag text-primary"></i>
                                                <?= !empty($pt->nama_toko) ? $pt->nama_toko : '-'; ?>
                                            </p>



                                            <p class="mb-2">
                                                <i class="fa fa-road text-info"></i>
                                                <?= number_format($pt->jarak, 2); ?> KM
                                            </p>



                                            <p class="mb-3">
                                                <i class="fa fa-map-marker text-danger"></i>
                                                <?= word_limiter($pt->alamat, 10); ?>
                                            </p>



                                            <?php if (!empty($pt->maps)): ?>


                                                <a href="<?= $pt->maps; ?>"
                                                    target="_blank"
                                                    class="btn btn-success btn-sm">

                                                    <i class="fa fa-map-marker"></i>
                                                    Lihat Lokasi

                                                </a>


                                            <?php endif; ?>


                                        </div>


                                    </div>


                                </div>


                            </div>


                        <?php endforeach; ?>


                    </div>


                <?php endif; ?>

            </div>
            <!-- END CONTENT UTAMA col-lg-8 -->


            <!-- =========================
            SIDEBAR KANAN
            ========================= -->

            <div class="col-lg-4">


                <!-- DESTINASI LAINNYA -->

                <?php if (!empty($destinasi_lainnya)): ?>

                    <div class="widget-sidebar">

                        <h5 class="sidebar-title">
                            Destinasi Lainnya
                        </h5>


                        <div class="sidebar-content">

                            <ul class="list-sidebar">

                                <?php foreach ($destinasi_lainnya as $dl): ?>

                                    <li>
                                        <a href="<?= base_url('home/detail_destinasi/' . $dl->destinasi_id); ?>">

                                            <i class="fa fa-map-marker text-primary"></i>

                                            <?= $dl->destinasi_nama; ?>

                                        </a>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    </div>

                <?php endif; ?>



                <!-- NAVIGASI -->

                <div class="widget-sidebar text-center">

                    <h5 class="sidebar-title">
                        Navigasi
                    </h5>


                    <div class="sidebar-content">


                        <a href="<?= base_url('home/destinasi_selengkapnya'); ?>"
                            class="btn btn-primary btn-lg btn-block mb-3">

                            <i class="fa fa-map-marker"></i>

                            Semua Destinasi

                        </a>



                        <a href="<?= base_url('galeri/semua'); ?>"
                            class="btn btn-info btn-lg btn-block mb-3">

                            <i class="fa fa-image"></i>

                            Galeri Destinasi

                        </a>


                        <a href="<?= base_url(); ?>"
                            class="btn btn-outline-secondary btn-lg btn-block">

                            <i class="fa fa-home"></i>

                            Kembali ke Beranda

                        </a>


                    </div>


                </div>


            </div>
            <!-- END SIDEBAR -->

        </div>
        <!-- END ROW -->

    </div>
    <!-- END CONTAINER -->

</section>