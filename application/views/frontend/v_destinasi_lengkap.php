<!-- =======================================================
     HALAMAN JELAJAHI DESTINASI
======================================================== -->

<style>
    .hero-destinasi {
        background: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .45)),
            url('<?= base_url('assets_frontend/img/hero-destinasi.jpg'); ?>');
        background-size: cover;
        background-position: center;
        padding: 130px 0;
        color: #fff;
    }

    .hero-destinasi h1 {
        font-size: 48px;
        font-weight: 700;
    }

    .hero-destinasi p {
        font-size: 18px;
        margin-top: 15px;
    }

    .search-box {
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        margin-top: -60px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .1);
        position: relative;
        z-index: 99;
    }

    .kategori-btn {
        margin: 5px;
        border-radius: 50px;
        padding: 8px 20px;
    }

    .section-title {
        font-size: 34px;
        font-weight: 700;
    }

    .section-subtitle {
        color: #777;
        margin-bottom: 40px;
    }

    .destinasi-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        transition: .3s;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        margin-bottom: 30px;
    }

    .destinasi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, .15);
    }

    .destinasi-img {
        height: 240px;
        object-fit: cover;
        width: 100%;
    }

    .badge-kategori {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #0d6efd;
        color: #fff;
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 12px;
    }

    .card-info i {
        width: 20px;
        color: #0d6efd;
    }

    .btn-detail {
        border-radius: 30px;
    }

    .pagination {
        justify-content: center;
    }
</style>

<!-- HERO -->
<section class="hero-destinasi">

    <div class="container text-center">

        <h1>
            Jelajahi Destinasi Wisata
        </h1>

        <p>
            Temukan keindahan alam, budaya, sejarah,
            dan wisata terbaik di Kabupaten Magelang.
        </p>

    </div>

</section>

<!-- SEARCH -->
<div class="container">

    <div class="search-box">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <form method="GET">

                    <div class="input-group">

                        <input
                            type="text"
                            class="form-control form-control-lg"
                            placeholder="Cari destinasi wisata..."
                            name="keyword"
                            value="<?= $this->input->get('keyword'); ?>">

                        <div class="input-group-append">

                            <button class="btn btn-primary btn-lg">

                                <i class="fa fa-search"></i>

                                Cari

                            </button>

                        </div>

                    </div>

                </form>

            </div>

            <div class="col-lg-4 text-right">

                <h5 class="mb-0">

                    <?= count($destinasi); ?>

                    Destinasi Ditemukan

                </h5>

            </div>

        </div>

    </div>

</div>

<!-- KATEGORI -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Jelajahi Berdasarkan Kategori

            </h2>

            <p class="section-subtitle">

                Pilih kategori wisata favorit Anda

            </p>

        </div>

        <div class="text-center mb-5">

            <a href="<?= base_url('home/destinasi_selengkapnya'); ?>"
                class="btn btn-primary kategori-btn">

                Semua

            </a>

            <?php foreach ($kategori as $k): ?>

                <a
                    href="<?= base_url('home/destinasi_selengkapnya?kategori=' . $k->kategori_id); ?>"
                    class="btn btn-outline-primary kategori-btn">

                    <?= $k->kategori_nama; ?>

                </a>

            <?php endforeach; ?>

        </div>

        <div class="row">

            <?php if (!empty($destinasi)) : ?>

                <?php foreach ($destinasi as $d) : ?>

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card destinasi-card h-100">

                            <!-- Gambar -->
                            <div class="position-relative">

                                <?php if (!empty($d->kategori_nama)) : ?>
                                    <span class="badge-kategori">
                                        <?= $d->kategori_nama; ?>
                                    </span>
                                <?php endif; ?>

                                <a href="<?= base_url('home/detail_destinasi/' . $d->destinasi_id); ?>">

                                    <img
                                        src="<?= !empty($d->destinasi_gambar)
                                                    ? base_url('uploads/destinasi/' . $d->destinasi_gambar)
                                                    : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                        class="destinasi-img"
                                        alt="<?= $d->destinasi_nama; ?>">

                                </a>

                            </div>

                            <!-- Isi Card -->
                            <div class="card-body d-flex flex-column">

                                <h4 class="font-weight-bold mb-3">

                                    <a href="<?= base_url('home/detail_destinasi/' . $d->destinasi_id); ?>"
                                        class="text-dark text-decoration-none">

                                        <?= $d->destinasi_nama; ?>

                                    </a>

                                </h4>

                                <!-- Alamat -->
                                <div class="card-info mb-2">

                                    <i class="fa fa-map-marker-alt"></i>

                                    <?= character_limiter((string)$d->destinasi_alamat, 50); ?>

                                </div>


                                <!-- Harga -->
                                <div class="card-info mb-2">

                                    <i class="fa fa-ticket-alt"></i>

                                    <?php

                                    $harga = trim($d->harga_tiket);

                                    if (
                                        empty($harga) ||
                                        strtolower($harga) == 'gratis' ||
                                        (float)$harga == 0
                                    ) {

                                        echo '<span class="text-success">
                Gratis
              </span>';
                                    } else {

                                        echo 'Rp ' . number_format(
                                            (float)$harga,
                                            0,
                                            ',',
                                            '.'
                                        );
                                    }

                                    ?>

                                </div>


                                <!-- Jam -->
                                <div class="card-info mb-4">

                                    <i class="fa fa-clock"></i>

                                    <?= !empty($d->jam_operasional) ? $d->jam_operasional : '-'; ?>

                                </div>

                                <!-- Tombol -->
                                <div class="mt-auto">

                                    <a href="<?= base_url('home/detail_destinasi/' . $d->destinasi_id); ?>"
                                        class="btn btn-primary btn-block btn-detail">

                                        Lihat Detail
                                        <i class="fa fa-arrow-right ml-2"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else : ?>

                <div class="col-lg-12">

                    <div class="alert alert-warning text-center p-5">

                        <h4 class="mb-3">

                            <i class="fa fa-map-marked-alt"></i>

                            Destinasi Tidak Ditemukan

                        </h4>

                        <p class="mb-0">

                            Maaf, belum ada destinasi wisata yang sesuai dengan pencarian atau kategori yang dipilih.

                        </p>

                    </div>

                </div>

            <?php endif; ?>

        </div>

        <!-- Pagination -->
        <?php if (isset($pagination)) : ?>

            <div class="row mt-5">

                <div class="col-lg-12">

                    <nav class="d-flex justify-content-center">

                        <?= $pagination; ?>

                    </nav>

                </div>

            </div>

        <?php endif; ?>

    </div>

</section>

<!-- CTA -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2 class="font-weight-bold">

                    Belum Menemukan Destinasi Favorit?

                </h2>

                <p class="text-muted mb-0">

                    Jelajahi lebih banyak destinasi wisata menarik di Kabupaten Magelang
                    dan temukan pengalaman liburan terbaik bersama keluarga maupun teman.

                </p>

            </div>

            <div class="col-lg-4 text-lg-right mt-4 mt-lg-0">

                <a href="<?= base_url(); ?>"
                    class="btn btn-primary btn-lg">

                    <i class="fa fa-home"></i>

                    Kembali ke Beranda

                </a>

            </div>

        </div>

    </div>

</section>

<script>
    $(function() {

        // Highlight tombol kategori aktif
        let url = new URL(window.location.href);
        let kategori = url.searchParams.get("kategori");

        $(".kategori-btn").removeClass("btn-primary")
            .addClass("btn-outline-primary");

        if (kategori == null) {

            $(".kategori-btn:first")
                .removeClass("btn-outline-primary")
                .addClass("btn-primary");

        } else {

            $(".kategori-btn").each(function() {

                if ($(this).attr("href").indexOf("kategori=" + kategori) !== -1) {

                    $(this)
                        .removeClass("btn-outline-primary")
                        .addClass("btn-primary");

                }

            });

        }

    });
</script>