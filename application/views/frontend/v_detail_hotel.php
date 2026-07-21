<!-- HERO -->

<section class="intro intro-single route bg-image"
    style="background-image:url('<?= !empty($hotel->gambar) ? base_url('uploads/hotel/' . $hotel->gambar) : base_url('assets_frontend/img/no-image.jpg'); ?>')">

    <div class="overlay-mf"></div>

    <div class="intro-content display-table">

        <div class="table-cell">

            <div class="container">

                <h2 class="intro-title mb-4 text-white">
                    <?= $hotel->nama_hotel; ?>
                </h2>

                <ol class="breadcrumb d-flex justify-content-center">

                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="<?= base_url('hotel'); ?>">
                            Hotel
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        <?= $hotel->nama_hotel; ?>
                    </li>

                </ol>

                <div class="mt-3">

                    <?php if (!empty($hotel->rating)) : ?>
                        <span class="badge badge-warning p-2">
                            ⭐ <?= $hotel->rating; ?>/5
                        </span>
                    <?php endif; ?>

                    <?php if (!empty($hotel->harga_mulai)) : ?>
                        <span class="badge badge-success p-2">
                            Mulai dari <?= $hotel->harga_mulai; ?>
                        </span>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- DETAIL HOTEL -->

<section class="sect-pt4">

    <div class="container">

        <div class="row">

            <!-- KONTEN -->

            <div class="col-lg-8">

                <div class="box-shadow-full">

                    <img src="<?= !empty($hotel->gambar)
                                    ? base_url('uploads/hotel/' . $hotel->gambar)
                                    : base_url('assets_frontend/img/no-image.jpg'); ?>"
                        class="img-fluid rounded mb-4 w-100">

                    <h3 class="title-left mb-4">
                        Tentang Hotel
                    </h3>

                    <p>
                        <?= $hotel->deskripsi; ?>
                    </p>

                </div>

                <!-- FASILITAS -->

                <div class="box-shadow-full">

                    <h3 class="title-left mb-4">
                        Fasilitas Hotel
                    </h3>

                    <?php if (!empty($hotel->fasilitas)) : ?>

                        <div class="fasilitas-wrap">

                            <?php foreach (explode(',', $hotel->fasilitas) as $item) : ?>

                                <span class="fasilitas-badge">
                                    <?= trim($item); ?>
                                </span>

                            <?php endforeach; ?>

                        </div>

                    <?php else : ?>

                        <p class="text-muted">
                            Fasilitas belum tersedia.
                        </p>

                    <?php endif; ?>

                </div>

                <!-- MAPS -->

                <?php if (!empty($hotel->maps)) : ?>

                    <?php
                    $link_maps = $hotel->maps;

                    if (strpos($hotel->maps, '<iframe') !== false) {
                        preg_match('/src="([^"]+)"/', $hotel->maps, $match);
                        $link_maps = isset($match[1]) ? $match[1] : '#';
                    }
                    ?>

                    <div class="widget-sidebar mt-4">

                        <h5 class="sidebar-title">
                            Lokasi Hotel
                        </h5>

                        <div class="sidebar-content text-center">

                            <p>
                                Klik tombol di bawah untuk melihat lokasi hotel di Google Maps.
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

            <!-- SIDEBAR -->

            <div class="col-lg-4">

                <!-- INFORMASI -->

                <div class="widget-sidebar">

                    <h5 class="sidebar-title">
                        Informasi Hotel
                    </h5>

                    <div class="sidebar-content">

                        <ul class="list-ico">

                            <li>
                                <span class="fa fa-map-marker"></span>
                                <?= $hotel->alamat; ?>
                            </li>

                            <li>
                                <span class="fa fa-phone"></span>
                                <?= $hotel->telepon; ?>
                            </li>

                            <li>
                                <span class="fa fa-envelope"></span>
                                <?= $hotel->email; ?>
                            </li>

                            <li>
                                <span class="fa fa-globe"></span>
                                <a href="<?= $hotel->website; ?>" target="_blank">
                                    Website Hotel
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>

                <!-- CHECK IN -->

                <div class="widget-sidebar">

                    <h5 class="sidebar-title">
                        Check In / Out
                    </h5>

                    <div class="sidebar-content">

                        <p>

                            <strong>Check In :</strong>
                            <?= $hotel->jam_checkin; ?>

                        </p>

                        <p>

                            <strong>Check Out :</strong>
                            <?= $hotel->jam_checkout; ?>

                        </p>

                    </div>

                </div>

                <!-- HARGA -->

                <div class="widget-sidebar text-center">

                    <h5 class="sidebar-title">
                        Harga Mulai
                    </h5>

                    <h2 class="text-primary">

                        <?= $hotel->harga_mulai; ?>

                    </h2>

                    <small>
                        per malam
                    </small>

                </div>

                <!-- HOTEL LAINNYA -->

                <div class="widget-sidebar">

                    <h5 class="sidebar-title">

                        Hotel Lainnya

                    </h5>

                    <div class="sidebar-content">

                        <ul class="list-sidebar">

                            <?php foreach ($related as $r) : ?>

                                <li>

                                    <a href="<?= base_url('hotel_front/detail/' . $r->hotel_id); ?>">

                                        <?= $r->nama_hotel; ?>

                                    </a>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>